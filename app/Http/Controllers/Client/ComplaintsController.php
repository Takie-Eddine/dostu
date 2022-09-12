<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ComplaintRequest;
use App\Models\Admin;
use App\Models\Complaint;
use App\Models\Product;
use App\Models\ProductTranslation;
use Illuminate\Http\Request;

class ComplaintsController extends Controller
{
    public function index(){

        // $complaints = Complaint::whereHas('product',function ($product) {
        //     $product->whereHas('companies',function($company){
        //         $company->where('company_id',auth()->user()->company_id);
        //     });
        // })->whereNull('company_id')->get();

        $complaints = Complaint::where('store_id',auth()->user()->stores[0]->id)->get();

        //return $complaints;

        return view('client.complaints.index',compact('complaints'));

    }

    // public function respond($id){

    //     $complaint = Complaint::find($id);

    //     if(!$complaint){

    //         return redirect()->route('client.complaint.index')->with(['error' => 'this user does not exist']);

    //     }

    //     return view('client.complaints.respond',compact('complaint'));
    // }


    // public function create(ComplaintRequest $request){

    //     //return $request;

    //     $complaintresponse = Complaint::create([

    //         'title'=>$request->title,
    //         'body' =>$request->body,
    //         'store_id' =>$request->store_id,
    //         'product_id' =>$request->product_id,
    //         'company_id' =>auth()->user()->company_id,
    //     ]);


    //     return redirect()->route('client.complaint.index')->with(['success' => 'sent with success']);

    // }


    public function view($id){

        $complaint = Complaint::find($id);

        if(!$complaint){

            return redirect()->route('client.complaint.index')->with(['error' => 'this user does not exist']);

        }

        return view('client.complaints.view',compact('complaint'));
    }



    public function newcomplaint(){

        $admin = Admin::first();

        //return $admin;

        return view('client.complaints.create',compact('admin'));
    }



    public function send(Request $request){

        //return $request;


        $product_id = null;
        $admin_id = null;
        $company_id = null;
        if ($request->product_name) {
            $product_id = ProductTranslation::where('name',$request->product_name)->first()->product_id;
            $company_id = Product::find($product_id)->company_id;

        }else{
            $admin_id = $request->admin_id;
        }




        $complaintresponse = Complaint::create([

            'title'=>$request->title,
            'body' =>$request->body,
            'product_id' =>$product_id,
            'admin_id'=>$admin_id,
            'store_id' => auth()->user()->stores[0]->id,
            'company_id' => $company_id,
        ]);


        return redirect()->route('client.complaint.index')->with(['success' => 'sent with success']);
    }

}
