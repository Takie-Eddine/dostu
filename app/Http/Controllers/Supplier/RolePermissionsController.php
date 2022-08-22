<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RolePermissionsController extends Controller
{
    public function role(){

        return view('supplier.role.role');

    }


    public function permission(){

        return view('supplier.role.permission');
    }




}
