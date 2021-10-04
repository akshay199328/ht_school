<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('email') && ($request->path() == 'auth/login')){

            if(!empty(session::get('otp_verified')) && (session::get('otp_verified') == 1))
            {
                return redirect('dashboard');
            }
            else
            {
                // echo "<pre>";print_r(session::all());exit;
                if(session::get('user_type') == 'Admin' && empty(session::get('otp_verified')))
                {
                    return back();
                }
                else
                {
                    return redirect('logout');
                }
            }
        }

        if(session()->has('email') && ($request->path() == 'auth/admin_login')){
            return back();
        }
        return $next($request)->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
                              ->header('Pragma','no-cache')
                              ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
    }
}
