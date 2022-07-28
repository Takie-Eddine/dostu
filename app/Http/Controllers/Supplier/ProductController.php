<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Attribute as Attribute;
use App\Models\Category;
use App\Models\Option;
use App\Models\Product;
use App\Models\Tag;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $products = Product::all()->where('company_id',auth()->user()->company_id);

        return view('supplier.product.index',compact('products'));
    }

    public function create(){

        $data=[];

        $data['categories'] = Category::all();
        $data['options'] = Option::all();
        $data['attribute'] = Attribute::all();
        $data['tags'] = Tag::all();
        return view('supplier.product.create',$data);
    }

    public function store(){



    }

    public function edit(){

    }


    public function update(){

    }
}
