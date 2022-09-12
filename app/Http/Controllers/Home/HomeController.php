<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Home\ClientRequest;
use App\Http\Requests\Home\StoreRequest;
use App\Http\Requests\Home\VerifyRequest;
use App\Models\Card;
use App\Models\Client;
use App\Models\Plan;
use App\Models\Store;
use App\Models\Subscription;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    public function signup(){

        return view('signup.signup');
    }


    public function details(VerifyRequest $request){

            $plansAnuuals = Plan::typeA()->get();
            $plansMonthlys = Plan::typeM()->get();
            $client = $request;

            //return $plansAnuuals;

            return view('signup.details',compact('client','plansAnuuals','plansMonthlys'));
    }


    public function storeClient(ClientRequest $request){

            //return $request;

        try {

            DB::beginTransaction();

            $fileName = "";
            $fileName1 = "";

            if ($request->has('image')) {
                $fileName1 = uploadImage('clients', $request->image);
            }

            $client = Client::create([

                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'mobile' => $request->mobile,
                'email' => $request->email,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'plans_id' => $request->planse,
                'image' => $fileName1,
                'status' => 1,

            ]);

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


            $card = Card::create([
                'client_id' => $client->id,
                'addCard' => $request->addCard,
                'card_name' => $request->card_name,
                'card_exp' => $request->card_exp,
                'cvv' => $request->cvv,

            ]);


            $subscription = Subscription::create([
                'client_id'=>$client->id,
                'plan_id'=>$request->plans,
                'started_date'=>Carbon::now(),
                'ended_date'=>null,

            ]);

            if($request->plan == 1){

                $subscription->update([
                    'ended_date'=>Carbon::now()->addYear(),
                ]);

            }else{

                $subscription->update([
                    'ended_date'=>Carbon::now()->addMonth(),
                ]);

            }



            $client->stores()->syncWithoutDetaching($store);

            return redirect()->route('client.login')->with(['success' => 'please login']);
            DB::commit();

        } catch (Exception $ex) {
            DB::rollback();
            return redirect()->view('signup.signup')->with(['error' => ' there is ap roblem']);
        }
    }




    public function testpost(Request $request){

        return $request;

    }

}
