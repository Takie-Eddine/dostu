<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view('client.order.order');
    }



    public function create(){

        return view('client.order.create');

    }


    public function store(OrderRequest $request){


        $order = Order::create([
            'store_id' => null,
            'payment_method' => 'cash',
        ]);



    }


    public function view($id){


    }


    public function edit($id){


    }



    public function update(OrderRequest $request,$id){


    }
}
