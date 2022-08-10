<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop(){


        $products = Product::active()->withAvg('reviews','rating')->approved()->get();

        //return $products;
        return view('client.product.index',compact('products'));
    }

    public function details($slug){

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
        }) -> limit(20) -> latest() -> withAvg('reviews','rating') -> get();

        return view('client.product.statistics',$data);
    }





    public function wishlist(){
        return view('client.product.wishlist');
    }

    public function checkout(){
        return view('client.product.checkout');
    }


    public function addtostore(){

    }


    public function edit($slug){

        $data=[];
        $data['product'] = Product::where('slug',$slug) -> first();
        if (!$data['product']){

            return redirect()->route('client.product.statistics')->with(['error' => 'this product does not exist ']);
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

        return view('client.product.edit',$data);
    }



    public function push(Request $request){

        return $request->description;

    }

    public function editVariant($id){

        $product = Product::find($id);

        if(!$product){
            return redirect()->route('client.product.statistics')->with(['error' => 'this product does not exist ']);
        }
        return view('client.product.editvariants',compact('product'));
    }






}
