<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\AddStoreRequest;
use App\Http\Requests\Client\DefaultRequest;
use App\Http\Requests\Client\StoreRequest;
use App\Models\Store;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function index(){

        $stores = auth()->user()->stores;

        return view('client.setting.store.index',compact('stores'));
    }


    public function create(StoreRequest $request){
        //return $request;
        try{

            DB::beginTransaction();
            if ($request->has('store_logo')) {
                $fileName = uploadImage('clients', $request->store_logo);
            }

            $store = Store::create([
                'store_name' => $request->store_name,
                'store_email' => $request->store_email,
                'store_mobile' => $request->store_mobile,
                'store_logo' =>$fileName,
                'address' => $request->address,
                'country' => $request->country,
                'city' => $request->city,
                'state' => $request->state,
                'pincode' => $request->pincode,
            ]);

            auth()->user()->stores()->syncWithoutDetaching($store);
            DB::commit();

            return redirect()->route('client.setting.store')->with(['success' => 'The store created with success']);
        }catch(Exception $ex){
            DB::rollback();
            return redirect()->route('client.setting.store')->with(['error' => 'The is a problem']);
        }

    }


    public function defaultstore(DefaultRequest $request){

        try{
            if (count($request->default)>1) {
                return redirect()->back()->with(['error'=> 'You can only choose one default store']);
            }
            DB::beginTransaction();
            foreach (auth()->user()->stores as $value) {
                $value->default = 0 ;
                $value->save();
            }
            Store::where('id',$request->default)->update([
                'default'=>1,
            ]);
            DB::commit();
            return redirect()->back()->with(['success'=> 'updated with success']);

        }catch(Exception $ex){
            DB::rollback();
            return redirect()->back()->with(['error'=> 'There is aproblem ']);
        }

    }
}
