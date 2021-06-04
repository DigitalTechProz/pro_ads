<?php

namespace App\Http\Controllers;

use App\InterestLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserEarningsController extends Controller
{
    //

    public function __construct()
    {

        $this->middleware('auth');

    }

    public function interestHistory(){

        $user = Auth::user();
        $logs = InterestLog::whereUser_id($user->id)->latest()->get();
    

        return view('User/invest.log',compact('logs'));
    }
}
