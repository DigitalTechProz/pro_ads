<?php

namespace App\Http\Controllers;

use App\Interest;
use App\InterestLog;
use App\Invest;
use App\Referral;
use App\Reflink;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('admin');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users =User::all();
        $search= $request->input('search');

        $users = User::latest()->search($search)->paginate(5);

        return view('Admin.users.registered-users',compact('users','search'));


    }
    public function verified(Request $request)
    {
        //
        $search= $request->input('search');

        $users = User::whereActive(1)->latest()->search($search)->paginate(5);

        return view('admin.users.active',compact('users','search'));


    }
    public function banned(Request $request)
    {

        $search= $request->input('search');
        $users = User::whereBan(1)->latest()->search($search)->paginate(10);
        return view('Admin.users.banned',compact('users','search'));

    }
    public function unverified(Request $request)
    {

        $search= $request->input('search');
        $users = User::whereActive(0)->latest()->search($search)->paginate(10);
        return view('Admin.users.unverified',compact('users','search'));

    }

    public function show($id)
    {
        $user = User::find($id);

        return view('Admin.users.show',compact('user'));
    }

    public function details($id)
    {

        $investment = Invest::find($id);
        $interest = Interest::whereInvest_id($investment->id)->first();
        $current = new Carbon($investment->start_time);
        $amount = $investment->amount;
        $percentage =  $investment->plan->percentage;
        $profit = (($percentage / 100) * $amount);

        return view('Admin.users.preview',compact('investment','interest','profit'));

    }
}
