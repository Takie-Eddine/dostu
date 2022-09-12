<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreRequest;
use App\Models\Store;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function index(){

        $store = auth()->user()->stores->first();
        //return $data ;


        return view('client.store.index',compact('store'));



    }

    public function edit($id){

        $store = Store::find($id);
        if (!$store) {
            return redirect()->route('client.store.store')->with(['error'=>'This store does not exist']);
        }

        return view('client.store.edit',compact('store'));

    }


    public function update(StoreRequest $request ,$id){

        //return $request;
        //try{
            DB::beginTransaction();
            $store = Store::find($id);

            //$fileName = '';

            if (!$store) {
                return redirect()->route('client.store.store')->with(['error'=>'This store does not exist']);
            }

            // if ($request->has('store_logo')) {
            //     $fileName = uploadImage('clients', $request->store_logo);
            // }



            $store->update([
                'store_name' => $request->store_name,
                'store_email' => $request->store_email,
                'store_mobile' => $request->store_mobile,
                'address' => $request->address,
                'country' => $request->country,
                'city' => $request->city,
                'state' => $request->state,
                'pincode' => $request->pincode
            ]);

            DB::commit();
            return Redirect()->route('client.store.store')->with(['success'=>'The store updated with success']);
        //}catch(Exception $ex){
          //  DB::rollback();
            //return redirect()->back()->with(['error'=>'There is a problem']);
        //}



    }



    public function delete($id){
        $store = Store::find($id);
        if (!$store) {
            return redirect()->route('client.store.store')->with(['error'=>'This store does not exist']);
        }

        $store->delete();
        auth('client')->logout();
        return redirect()->route('client.login')->with(['error'=>'You deleted your store please contact us for more information']);;

    }



}
