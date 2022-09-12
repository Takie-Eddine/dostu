<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Role;
use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{

    public function index(){



        $clients = Client::whereHas('stores' ,function($q){
            $q->where('store_id',auth('client')->user()->id);

        })->where('id', '<>', auth()->id())->get();

        //return $clients ;


        return view('client.user.index',compact('clients'));
    }


    public function create(){

        $roles = Role::whereNull('permissions')->get();
        return view('client.user.create',compact('roles'));

    }

    public function store(Request $request){

        //return $request;

        try{
            DB::beginTransaction();
                $client = Client::create([
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                    'role_id' => $request->role_id,
                ]);

                $client->stores()->syncWithoutDetaching(auth('client')->user()->stores->first->id);

            DB::commit();

            return redirect()->route('client.user.index')->with(['success' => 'added with success']);


        }catch(Exception $ex){
            DB::rollback();
            return redirect()->route('client.user.index')->with(['error' => 'there is a problem']);
        }


        // $user = new Client();
        // $user->first_name = $request->first_name;
        // $user->last_name = $request->last_name;
        // $user->email = $request->email;
        // $user->password = bcrypt($request->password);   // the best place on model
        // $user->role_id = $request->role_id;
        //$user->stores()->syncWithoutDetaching(auth('client')->user()->stores->first->id);



        // if($user->save())
        //     return redirect()->route('client.user.index')->with(['success' => 'added with success']);
        // else
        //     return redirect()->route('client.user.index')->with(['error' => 'there is a problem']);

    }


    public function edit($id){

        $client = Client::find($id);
        $roles = Role::whereNull('permissions')->get();

        if (!$client) {
            return redirect()->back()-> with(['error' => 'this user does not exist']);
        }

        return view('client.user.edit',compact('client','roles'));

    }



    public function update(Request $request,$id){

        //return $request;


    }


    public function view($id){

        $client = Client::find($id);
        //$roles = Role::whereNull('permissions')->get();

        if (!$client) {
            return redirect()->back()-> with(['error' => 'this user does not exist']);
        }

        return view('client.user.view',compact('client'));

    }


    public function delete($id){

        $client = Client::find($id);
        if(!$client){

            return redirect()->route('client.user.index')->with(['error' => 'this user does not exist']);
        }


        $client -> delete();

        return redirect()->back()->with(['success' => 'delete with success']);

    }

}
