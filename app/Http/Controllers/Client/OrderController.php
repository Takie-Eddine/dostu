<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\OrderRequest;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderItem;
use App\Models\StoreProduct;
use App\Models\StoreProductTranslation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function index(){

        $data['orders'] = Order::all()->where('store_id',auth('client')->user()->stores[0]->id);

        return view('client.order.index' ,$data);
    }



    public function create(){

        return view('client.order.create');

    }


    public function store(OrderRequest $request){

        try{
            DB::beginTransaction();

            $order = Order::create([
                'store_id' => auth()->user()->stores[0]->id,
                'payment_method' => 'cash',
            ]);



            foreach ($request->products as $product) {
                $product_id = StoreProductTranslation::where('name',$product['product_name'])->first();

                if (!$product_id) {
                    return redirect()->back()->with(['error' => 'This product does not exist be sure about product name']);
                }
                OrderItem::create([
                    'order_id'=> $order->id,
                    'store_product_id'=>$product_id->store_product_id,
                    'product_name' => $product['product_name'],
                    'price' => $product['price'],
                    'qty' => $product['qty'],
                ]);
            }

            OrderAddress::create([
                'order_id'=> $order->id,
                'first_name'=> $request->first_name ,
                'last_name' => $request->last_name ,
                'phone_number' => $request->phone_mobile ,
                'email' => $request->email ,
                'city' => $request->city ,
                'country' => $request->country ,
                'postal_code' => $request->postal_code ,
                'address' => $request->address ,
                'type' => $request->type ,
            ]);

            DB::commit();

            return redirect()->back()->with(['success' => 'The order is added with succsess']);

        }catch(Exception $ex){

            DB::rollback();

        }

    }


    public function view($id){


    }


    public function edit($id){


    }



    public function update(OrderRequest $request,$id){


    }


    public function delete($id){

    }
}
