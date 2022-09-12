<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Product;
use App\Models\StoreProduct;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index(){

        $data['products'] = Product::active()->where('company_id',auth()->user()->companies->id)->get();
        $data['product_approved'] = Product::active()->where('approved',1)->where('company_id',auth()->user()->companies->id)->get();
        $data['product_pending'] = Product::active()->where('approved',0)->where('company_id',auth()->user()->companies->id)->get();
        $data['product_rejected'] = Product::active()->where('approved',3)->where('company_id',auth()->user()->companies->id)->get();
        $data['top_products'] = Product::active()->where('company_id',auth()->user()->companies->id)->latest()->take(7)->get();
        //return $data['product_approved'];
        $data['complaints'] = Complaint::where('company_id',auth()->user()->companies->id)->latest()->take(4)->get();
        $data['clients'] = StoreProduct::whereHas('products',function($q){
            $q->where('company_id',auth()->user()->companies->id);
        })->get();



        return view('supplier.supplier',$data);
    }
}
