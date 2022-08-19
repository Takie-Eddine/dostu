<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\ProfileRequest;
use App\Models\Country;
use App\Models\Supplier;
use App\Models\SupplierCompany;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function profile(){

        //$data='';
        $data = auth()->user()->companies()->get();

        //return $data;

            return view('supplier.profile.profile',compact('data'));

    }


    public function store(ProfileRequest $request){

        //return $request;

        try{

            DB::beginTransaction();
            $fileName = "";
            if ($request->has('logo')) {

                $fileName = uploadImage('profile', $request->logo);

            }
            $company = SupplierCompany::create($request->except('_token','logo'));

            $company->logo = $fileName ;
            $company->save();


            $supplier = Supplier::find(auth('supplier')->user()->id);

            $supplier ->update(['company_id' => $company->id]);


            return redirect()->route('supplier.profile.profile')->with(['success' => 'added with success']);

            DB::commit();
        }catch(Exception $ex){

            DB::rollback();
            return redirect()->route('supplier.profile.profile')->with(['error' => 'there is a problem']);
        }


    }


}
