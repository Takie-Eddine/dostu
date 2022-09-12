<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index(){

        $subscription = Subscription::where('client_id',auth('client')->user()->id)->get();
        //return $subscription[0]->clients;

        return view('client.setting.subscription.index');
    }
}
