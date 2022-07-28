<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        return view('supplier.product.index');
    }

    public function create(){

        return view('suuplier.product.create');
    }

    public function store(){



    }

    public function edit(){

    }


    public function update(){

    }
}
