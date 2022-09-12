<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Order;
use App\Models\StoreProduct;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $data['products'] = StoreProduct::all();
        //$data['orders'] = Order::all();
        $data['complaints'] = Complaint::where('store_id',auth()->user()->stores[0]->id)->latest()->take(4)->get();
        $data[''] = '' ;
        return view('client.client',$data);

    }
}
