<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ClientRequest;
use App\Http\Requests\Client\PasswordRequest;
use App\Models\Client;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function account(){

        $client = Client::find(auth()->user()->id);

        return view('Client.setting.profile.view',compact('client'));
    }



    public function updateaccount(ClientRequest $request, $id){

        //return $request;

        $client = Client::find($id);

        if (!$client) {
            return redirect()->back()-> with(['error' => 'this user does not exist']);
        }


            $fileName = '';

            if ($request->has('image')) {
                $fileName = uploadImage('suppliers', $request->image);

                $client->update([
                    'first_name'=>$request->first_name,
                    'last_name' =>$request->last_name,
                    'email'=>$request->email,
                    'mobile'=>$request->mobile,
                    'image'=>$fileName,
                ]);
            }


            $client->update($request->except('_token', 'id','role_id','image'));



        return redirect()->route('client.setting.profile')->with(['success' => 'updated with success']);
    }



    public function security(){

        $client = Client::find(auth()->user()->id);

        return view('client.setting.profile.security',compact('client'));

    }

    public function updatesecurity(PasswordRequest $request , $id){

        $client = Client::find($id);

        if (!$client) {
            return redirect()->back()-> with(['error' => 'this user does not exist']);
        }

        if ($request->password != null) {

            $client->update([
                'password'=>bcrypt($request->password),
            ]);

            return redirect()->route('client.settings.account.security')->with(['success' => 'updated with success']);
        }


        return redirect()->route('client.setting.profile');


    }
}
