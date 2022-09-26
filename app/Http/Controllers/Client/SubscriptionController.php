<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\Subscription;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(){

        $data['subscription'] = Subscription::where('client_id',auth('client')->user()->id)->first();
        $data['popular'] = Plan::where('popular',1)->first();

        //return  $data['subscription'];
        $data['plan'] = auth('client')->user()->subscriptions->first();


        return view('client.setting.subscription.index',$data);
    }



    public function upgrade($id){

        $data['plansanual'] = Plan::where('type',1)->get();
        $data['plansmonth'] = Plan::where('type',0)->get();
        $data['subscriptions'] = Subscription::find($id);

        if (!$data['subscriptions']) {
            return redirect()->route('client.setting.subscription')->with(['error'=>'This subscription does not exist']);
        }

        //return $data['subscriptions'];
        return view('client.setting.subscription.upgrade',$data);

    }


    public function cancel($id){
        $subscription = Subscription::find($id);
        if (!$subscription) {
            return redirect()->route('client.setting.subscription')->with(['error'=>'This subscription does not exist']);
        }

        $subscription->update([
            'plan_id'=> 2,
            'started_date'=>Carbon::now(),
            'ended_date'=>Carbon::now()->addMonth(),
        ]);

        return redirect()->route('client.setting.subscription')->with(['error'=>'You have cancled your plan so you are on basic plan']);

    }


    public function update($id){
        $plan = Plan::find($id);
        $subscription = Subscription::where('client_id',auth('client')->user()->id);

        if (!$subscription) {
            return redirect()->back()->with(['error'=>'This plan does not exist']);
        }

        if ($plan->type == 0) {
            $subscription->update([
                'plan_id' =>$id,
                'started_date'=>Carbon::now(),
                'ended_date'=>Carbon::now()->addMonth(),
            ]);
        }
        if($plan->type == 1){
            $subscription->update([
                'plan_id' =>$id,
                'started_date'=>Carbon::now(),
                'ended_date'=>Carbon::now()->addYear(),
            ]);
        }

        return redirect()->back()->with(['success' => 'Upgrade with success']);

    }
}
