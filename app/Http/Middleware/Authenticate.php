<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }


        if (! $request->expectsJson()) {

            if(Request::is(app()->getLocale().'/supplier*')){
                return route('supplier.login');
            }

            if(Request::is(app()->getLocale().'/client*')){
                return route('client.login');
            }

            else{
                return route('signup.signup');
            }


        }

    }
}
