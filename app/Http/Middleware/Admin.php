<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::check()){
            if (Auth::user()->usertype == 'admin'){
                return $next($request);
            }

            session()->flash('message', 'You are not authorised to access the Admin Panel');
            Session::flash('type','warning');
            Session::flash('title','Unauthorized Access Denied');
            Session::flash('icon','warning');

            return redirect()->route('userdashboard');
        }
        return abort(404);
    }
}
