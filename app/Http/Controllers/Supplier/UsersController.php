<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\SupplierRequest;
use App\Models\Role;
use App\Models\Supplier;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){

        $suppliers = Supplier::latest()->where('company_id', auth('supplier')->user()->company_id)->where('id', '<>', auth()->id())->get();



        return view('supplier.user.index',compact('suppliers'));
    }


    public function create(){

        $roles = Role::get();
        return view('supplier.user.create',compact('roles'));
    }


    public function store(SupplierRequest $request) {

        $user = new Supplier();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);   // the best place on model
        $user->role_id = $request->role_id;
        $user->company_id = auth('supplier')->user()->company_id;

       // save the new user data
        if($user->save())
            return redirect()->route('supplier.user.index')->with(['success' => 'added with success']);
        else
            return redirect()->route('supplier.user.index')->with(['success' => 'there is a problem']);

    }










}
