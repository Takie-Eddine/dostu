<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\ImportList;
use App\Models\Product;
use App\Models\ProductStore;
use App\Models\ProductVariant;
use App\Models\ProductVariantClient;
use App\Models\StoreProduct;
use App\Models\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function shop(){


        $products = Product::active()->withAvg('reviews','rating')->approved()->get();
        //return $products;
        $categories = Category::parent()->select('id', 'slug')->with(['childrens' => function ($q) {
            $q->select('id', 'parent_id', 'slug');
            $q->with(['childrens' => function ($qq) {
                $qq->select('id', 'parent_id', 'slug');
                $qq->with(['childrens' => function ($qqq) {
                    $qqq->select('id', 'parent_id', 'slug');
                }]);
            }]);
        }])->active()->get();;

        //return $products;
        return view('client.product.index',compact('products','categories'));
    }

    public function details($slug){




        $data=[];
        $data['product'] = Product::where('slug',$slug) -> first();

        $viewed = $data['product']->viewed +1 ;
        $data['product']->viewed = $viewed;
        $data['product']->save();

        if (!$data['product']){
            return redirect()->route('client.product.index')->with(['error' => 'this product does not exist ']);
        }

        $product_id = $data['product'] -> id ;
        $product_categories_ids =  $data['product'] -> categories ->pluck('id');

        /*$data['product_attributes'] =  Attribute::whereHas('options' , function ($q) use($product_id){
            $q -> whereHas('products',function ($qq) use($product_id){
                $qq -> where('product_id',$product_id);
            });
        })->get();*/

        $data['related_products'] = Product::whereHas('categories',function ($cat) use($product_categories_ids){
            $cat-> whereIn('categories.id',$product_categories_ids);
        }) -> limit(20) -> latest() -> withAvg('reviews','rating') -> get();

        return view('client.product.statistics',$data);
    }





    public function importlist(){



        $products = ImportList::all()->where('store_id',auth('client') -> user() ->stores[0]->id);
        //return $products[2] -> products;

        return view('client.product.importlist',compact('products'));
    }




    public function addimportlist($id){

        try{
            $product = Product::find($id);

            if (!$product) {
                return redirect()->route('client.product.index')->with(['error' => 'this product does not exist ']);
            }

            $product_imported = ImportList::where('product_id',$id)->where('store_id',auth('client') -> user()->stores[0]->id)->get();

            if(count($product_imported)>0){

                return redirect()->route('client.product.index')->with(['error' => 'this product is already  exist ']);
            }

            $product = ImportList::create([
                'product_id' => $product->id,
                'store_id' => auth('client') -> user() ->stores[0]->id,
            ]);

            return redirect()->route('client.product.index')->with(['success' => 'added successfuly ']);

        }catch(Exception $ex){
            return redirect()->route('client.product.index')->with(['error' => 'there is a problem']);
        }

    }


    public function destroy($id){

        $product = ImportList::where('product_id',$id)->where('store_id',auth('client') -> user()->stores[0]->id)->first();

        //return $product ;

        if(!$product){
            return redirect()->route('client.product.importlist')->with(['error' => 'this product does not  exist ']);
        }

        $product->delete();

        return redirect()->route('client.product.importlist')->with(['success' => 'removed successfuly']);
    }

    public function listproduct(){

        $products = StoreProduct::all()->where('store_id',auth('client')-> user() -> stores[0]->id);

        return view('client.product.list',compact('products'));
    }


    // public function addtostore($id){

    //     try{
    //         $product = Product::find($id);

    //         if (!$product) {
    //             return redirect()->route('client.product.index')->with(['error' => 'this product does not exist ']);
    //         }

    //         $product_list = ProductStore::where('product_id',$id)->where('store_id',auth('client') -> user()->stores[0]->id)->get();

    //         if(count($product_list)>0){

    //             return redirect()->route('client.product.index')->with(['error' => 'this product is already  exist ']);
    //         }


    //         $product = ProductStore::create([
    //             'product_id'=>$id,
    //             'store_id'=>auth('client') -> user() ->stores[0]->id,
    //         ]);

    //         return redirect()->route('client.product.index')->with(['success' => 'added successfuly ']);

    //     }catch(Exception $ex){
    //         return redirect()->route('client.product.index')->with(['error' => 'there is a problem']);
    //     }


    // }


    public function edit($slug){

        $data=[];
        $data['product'] = Product::where('slug',$slug) -> first();
        if (!$data['product']){

            return redirect()->route('client.product.index')->with(['error' => 'this product does not exist ']);
        }

        $product_id = $data['product'] -> id ;
        $product_categories_ids =  $data['product'] -> categories ->pluck('id');

        $data['product_attributes'] =  Attribute::whereHas('options' , function ($q) use($product_id){
            $q -> whereHas('products',function ($qq) use($product_id){
                $qq -> where('product_id',$product_id);
            });
        })->get();

        $data['related_products'] = Product::whereHas('categories',function ($cat) use($product_categories_ids){
            $cat-> whereIn('categories.id',$product_categories_ids);
        }) -> limit(20) -> latest() -> get();

        $data['tags'] = Tag::all();
        $data['categories'] = Category::all();

        return view('client.product.edit',$data);
    }



    public function push(Request $request){

        //return $request;

        // try{

            DB::beginTransaction();
            $product = StoreProduct::create([
                'product_id'=>$request->product_id,
                'store_id'=>auth('client') -> user() ->stores[0]->id,
                'slug'=>Product::where('id',$request->product_id)->first()->slug,
                'in_stock'=>1,
                'is_active'=>1,
            ]);

            $product->name = $request->name;
            $product->description = $request->description;
            $product->save();


            DB::commit();


        // }catch(Exception $ex){
        //     DB::rollback();
        // }

    }

    public function editVariant($id){

        $product = Product::find($id);

        //return $product->options[0];

        $product_variants = ProductVariant::where('product_id',$id)->get();
        $product_variant_clients = ProductVariantClient::where('product_id',$id)->get()->toArray();
        //return $product_variant_clients;
        //return $product_variants->vriants;

        // $attributes = Attribute::whereHas('options' , function ($q) use($id){
        //     $q -> whereHas('products',function ($qq) use($id){
        //         $qq->whereHas('options',function($qqq) use($id){
        //             $qqq -> where('product_id',$id);
        //         });

        //     });
        // })->get();


        if (!$product_variant_clients) {
            return redirect()->back()->with(['error' => 'this product does not have varinats ']);
        }
        if(!$product && !$product_variants){

            return redirect()->route('client.product.index')->with(['error' => 'this product does not exist ']);
        }
        return view('client.product.editvariants',compact('product','product_variants'));
    }



    public function saveVariant(Request $request){

        try{

            $product = ProductVariantClient::select('product_variant_id')->where('product_id',$request->product_id)->get();

            //return $product;

            if ($product->isEmpty()) {
                $products = ProductVariant::where('product_id',$request->product_id)->get();

                foreach ($products as $value) {
                    $p = ProductVariantClient::create([
                        'product_variant_id'=>$value->id,
                        'product_id'=>$value->product_id,
                        'store_id'=>auth('client') -> user() ->stores[0]->id,
                        'vriants'=>json_encode($value->vriants),
                        'price'=>$value->price,
                        'selling_price'=>$value->selling_price,
                        'global_price'=>$value->global_price,
                        'qty'=>$value->qty,
                        'sku'=>$value->sku,
                        'photo'=>$value->photo
                    ]);
                }
            }
            for ($i=0; $i <count($request->id) ; $i++) {
                ProductVariantClient::where('product_variant_id',$request->id[$i]) ->update([
                    'sku'=>$request->sku[$i],
                    'selling_price' =>$request->selling_price[$i],
                    'global_price'=>$request->global_price[$i],
                ]);
            }
            $prod1 = Product::find($request->product_id);
            return redirect()->route('client.product.edit',$prod1->slug)->with(['success' => 'update with success']);

        }catch(Exception $ex){

        }

        return $request;

    }




    public function getcategory($id){
        $categories = Category::all();

        $category = Category::find($id);
        if(!$category){

            return redirect()->route('client.product.index')->with(['error' => 'this category does not exist ']);
        }

        $products = Product::whereHas('categories',function($q) use($id){
            $q->where('id',$id);
        })-> withAvg('reviews','rating')->get();

        return view('client.product.index')->with('products',$products)->with('categories',$categories) ;
    }




    public function getbyrate($id){

        $categories = Category::all();
        $product = Product::withAvg('reviews','rating')->get();

        if($id == 1){

            $products = Product::whereHas('reviews',function($q) use($id){
                $q->where('rating',$id);
            })->withAvg('reviews','rating')->get();
            //return $products;

            return view('client.product.index',compact('categories'))->with('products',$products) ;

        }


        if($id == 2){

            $products = Product::whereHas('reviews',function($q) use($id){
                $q->where('rating',$id);
            })->withAvg('reviews','rating')->get();

            //return $products;
            return view('client.product.index',compact('categories'))->with('products',$products) ;

        }


        if($id == 3){
            $products = Product::whereHas('reviews',function($q) use($id){
                $q->where('rating',$id);
            })->withAvg('reviews','rating')->get();
            //return $products;

            return view('client.product.index',compact('categories'))->with('products',$products) ;
        }


        if($id == 4){
            $products = Product::whereHas('reviews',function($q) use($id){
                $q->where('rating',$id);
            })->withAvg('reviews','rating')->get();
            //return $products;
            return view('client.product.index',compact('categories'))->with('products',$products) ;
        }
        if ($id == 5) {
            $products = Product::whereHas('reviews',function($q) use($id){
                $q->where('rating',$id);
            })->withAvg('reviews','rating')->get();
            //return $products;
            return view('client.product.index',compact('categories'))->with('products',$products) ;
        }
        else{
            return redirect()->route('client.product.index')->with(['error' => 'this rating does not exist ']);
        }

    }




}
