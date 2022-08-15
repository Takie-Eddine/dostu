<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\ProductRequest ;

use App\Models\Attribute as Attribute;
use App\Models\Category;
use App\Models\Media;
use App\Models\Option;
use App\Models\Product;
use App\Models\Tag;
use Exception;
use Illuminate\Contracts\Cache\Store;
use Intervention\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {



        $products = Product::all()->where('company_id', auth()->user()->company_id);

        return view('supplier.product.index', compact('products'));
    }

    public function create()
    {

        $data = [];

        $data['categories'] = Category::active()->get();
        $data['options'] = Option::all();
        $data['attributes'] = Attribute::all();
        $data['tags'] = Tag::all();
        return view('supplier.product.create', $data);
    }

    public function store(ProductRequest $request)
    {

        // foreach ($request->options as $option) {
        //     return $option;
        // }

        try {


            DB::beginTransaction();

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            if (!$request->has('in_stock'))
                $request->request->add(['in_stock' => 0]);
            else
                $request->request->add(['in_stock' => 1]);

            $var = auth()->user()->company_id;

            $product = Product::create([
                'slug' => $request->slug,
                'company_id' => auth()->user()->company_id,
                'in_stock' => $request->in_stock,
                'is_active' => $request->is_active,
                'price' => $request->price,
                'selling_price' => $request->selling_price,
                'sku' => $request->sku,
                'qty' => $request->qty,
            ]);

            $product->name = $request->name;
            $product->description = $request->description;
            //$product->title = $request->title;
            $product->save();



            $product->categories()->syncWithoutDetaching($request->categories);
            $product->tags()->syncWithoutDetaching($request->tags);
            $product->options()->syncWithoutDetaching($request->options);






            if ($request->photo && count($request->photo) > 0) {



                foreach ($request->photo as $photo) {


                    $file_name = uploadImage('products', $photo);

                    Media::create([

                        'product_id' => $product->id,
                        'photo' => $file_name,
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('supplier.product.index')->with(['success' => 'added with success']);
        } catch (Exception $ex) {
            DB::rollback();
            return redirect()->route('supplier.product.create')->with(['error' => 'there is a problem']);
        }
    }

    public function edit()
    {
    }


    public function update()
    {
    }


    public function view()
    {
    }
}
