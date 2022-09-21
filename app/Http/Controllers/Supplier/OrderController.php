<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\OrderRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){



        $orders = Order::whereHas('products' , function ($q) {
            $q->whereHas('products',function($qq){
                    $qq->where('company_id',auth()->user()->companies->id);
            });
        })->get();
        return view('supplier.order.index',compact('orders'));
    }


    public function edit($id){


    }


    public function update(OrderRequest $request,$id){


    }


    public function view($id){

    }
}
