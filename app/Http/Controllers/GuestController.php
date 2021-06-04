<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Notifications\AccountActiveSuccess;
use App\Page;
use App\Settings;
use App\Testimonial;
use App\User;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GuestController extends Controller
{
    //


    public function index()
    {

        $deposits= Deposit::orderBy('created_at','desc')->take(5)->get();
        $settings = Settings::first();
        $testimonials=Testimonial::whereStatus(1)->inRandomOrder()->take(3)->get();

        $withdraws = Withdraw::orderBy('created_at','desc')->take(5)->get();

        $user = User::count();
        $pay = Withdraw::select('amount')->sum('amount');
        $dep = Deposit::select('amount')->sum('amount');
        //$day = now()->diffInDays($settings->start_date);

        $total = (object) array(
            "user"=>$user,
            //"day"=>$day,
            "pay"=>$pay,
            "dep"=>$dep,
        );

        return view('welcome',compact('deposits','total','settings','testimonials'));
    }
    public function verifyLogout()
    {

        session()->flash('message', 'Your account has been successfully created but not active yet. You have to active your account for use our service. Please check your email for verification code.');
        Session::flash('type','info');
        Session::flash('title','Account Created, Please Check Your Email');
        Session::flash('icon','info');

        Auth::logout();

        return redirect()->route('login');
    }

    public function pageView($slug)
    {

        $page = Page::where('slug',$slug)->first();

        return view('singlepage',compact('page'));
    }
    public function banned()
    {

        session()->flash('message', 'Your account have been Banned.');
        Session::flash('type','warning');
        Session::flash('title','Banned');
        Session::flash('icon','warning');

        Auth::logout();

        return redirect()->route('login');
    }

    public function emailverify($token)
    {

        $user = User::where('token',$token)->first();

        $user->token = null;
        $user->active = 1;
        $user->save();

        $user->notify(new AccountActiveSuccess($user));

        session()->flash('message', 'Your Email Address Has Been Successfully Verified,You can Login To your Account');
        Session::flash('type','success');
        Session::flash('title','Email Has Been Verified');
        Session::flash('icon','success');


        return redirect()->route('login');
    }

}
