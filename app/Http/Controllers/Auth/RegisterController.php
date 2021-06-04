<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserReferred;
use App\User;
use App\Http\Controllers\Controller;
use App\Reflink;
use App\Settings;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/verify/logout';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $settings = Settings::first();

        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'usertype' => $data['usertype'],
            'password' => Hash::make($data['password']),
            'active'=>0,
            'token'=> Str::uuid(40),
            'bonus' => Carbon::now(),
            //'main_balance'=>$settings->signup_bonus,

        ]);

        Reflink::create([

            'user_id'=> $user->id,
            'link'=> $data['email'],

        ]);

        $user->sendVerificationEmail();

        event(new UserReferred(request()->cookie('ref'), $user));

        session()->flash('message', 'Dear user your account create successful but not active. To active your account please check your email for verify code.');
        Session::flash('type','success');
        Session::Flash('title','Account Created Successfully, Check Verification Email');
        Session::flash('icon','success');

        return $user;
    }


}
