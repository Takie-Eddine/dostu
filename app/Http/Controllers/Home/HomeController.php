<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\VerifyRequest;
use App\Models\Client;
use Exception;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function signup(){

        return view('signup.signup');
    }


    public function details(VerifyRequest $request){

        try{
            $client = $request;

            return view('signup.details',compact('client'));

        }catch(Exception $ex){
            return redirect()->route('signup.signup')->with(['error' => 'there is a problem']);
        }

    }


    public function store(Request $request){

        return $request;

    }

}
