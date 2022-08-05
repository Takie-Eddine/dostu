<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop(){


        $products = Product::active()->approved()->get();

        return view('client.product.index',compact('products'));
    }

    public function details($slug){

        $data=[];
        $data['product'] = Product::where('slug',$slug) -> first();
        if (!$data['product']){
        }

        // $product_id = $data['product'] -> id ;
        // $product_categories_ids =  $data['product'] -> categories ->pluck('id');

        // $data['product_attributes'] =  Attribute::whereHas('options' , function ($q) use($product_id){
        //     $q -> whereHas('product',function ($qq) use($product_id){
        //         $qq -> where('product_id',$product_id);
        //     });
        // })->get();

        // $data['related_products'] = Product::whereHas('categories',function ($cat) use($product_categories_ids){
        //     $cat-> whereIn('categories.id',$product_categories_ids);
        // }) -> limit(20) -> latest() -> get();

        return view('client.product.details',$data);
    }





    public function wishlist(){
        return view('client.product.wishlist');
    }

    public function checkout(){
        return view('client.product.checkout');
    }
}
