<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ComplaintsController extends Controller
{
    public function index(){
        return view('supplier.complaints.index');

    }

    public function respond($id){

        return view('supplier.complaints.respond');
    }
}
