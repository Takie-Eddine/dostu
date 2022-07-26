<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop(){

        return view('client.product.index');
    }

    public function details(){

        return view('client.product.details');
    }

    public function wishlist(){
        return view('client.product.wishlist');
    }

    public function checkout(){
        return view('client.product.checkout');
    }
}
