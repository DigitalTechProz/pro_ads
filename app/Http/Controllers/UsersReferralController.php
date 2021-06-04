<?php

namespace App\Http\Controllers;

use App\Referral;
use App\Reflink;
use App\ReferralLink;
use App\ReferralRelationship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsersReferralController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $code= $user->reflink->link;

        $link = url('register') . '?ref=' . $code;

        $reflink = Reflink::where('user_id',$user->id)->first();

        $referrals = Referral::where('reflink_id','=',$reflink->id)->get();


        return view('User.myreferral',compact('referrals','link'));
    }

    public function newReferal()
    {
        $user = Auth::user();

        $code= $user->reflink->link;

        $link = url('register') . '?ref=' . $code;

        $reflink = Reflink::where('user_id',$user->id)->first();

        $referrals = Referral::whereReflink_id($reflink->id)->get();

        return view('User.newReferral',compact('referrals','link','user'));
    }
}
