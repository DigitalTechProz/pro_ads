<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Notifications\UserLoginNotify;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/userdashboard';
    protected function redirectTo()
    {
        $user = Auth::user();

        if(Auth::user()->usertype == 'admin')
        {
            return 'admindashboard';
        }
        else{

            if($user->active == 0)

            return '/verify/logout';

            if($user->ban == 0){

                $user->notify(new UserLoginNotify($user));

             }

            return 'userdashboard';
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
