<?php

namespace App\Http\Controllers;

use App\Invest;
use App\User;
use App\Deposit;
use App\Order;
use App\PTC;
use App\Withdraw;
use App\Settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $user = Auth::user()->usertype == 'admin';

       $deposit_notify = Deposit::whereStatus(0)->orderBy('updated_at')->get();
       $invest_notify = Invest::whereStatus(0)->get();
       $ads_notify = Order::whereStatus(0)->get();
       $withdraw_notify = Withdraw::whereStatus(0)->get();



        $earn = User::select('main_balance')->sum('main_balance');
        $deposit = User::select('deposit_balance')->sum('deposit_balance');
        $invest = Invest::select('amount')->sum('amount');
        $pending = Withdraw::whereStatus(0)->select('amount')->sum('amount');

        $count = (object) array(
            "total"=>User::all()->count(),
            "total"=>User::all()->count(),
            "active"=>User::whereActive(1)->count(),
            "unverified"=>User::whereActive(0)->count(),
        );

        return view('Admin.admindashboard', compact('earn','deposit','invest','count','deposit_notify','invest_notify','withdraw_notify','ads_notify','pending'));

    }

    public function userDeposits()
    {
        $deposits= Deposit::where('status', '>=', 1)->orderBy('updated_at','desc')->get();

        $settings = Settings::first();

        return view('Admin.deposit.index',compact('deposits','settings'));
    }


    public function localDeposits()
    {
        $deposits= Deposit::whereStatus(0)->orderBy('created_at','desc')->get();

        $settings = Settings::first();

        return view('Admin.deposit.local',compact('deposits','settings'));
    }


    public function localDepositsUpdate(Request $request,$id)
    {


        $deposit= Deposit::find($id);

        $user = $deposit->user;


        $user->deposit_balance = $user->deposit_balance +  $deposit->net_amount;

        $user->save();

        $deposit->status = 1;

        $deposit->save();



        session()->flash('message', 'User Deposit Request Has Been Successfully Approved');
        Session::flash('type', 'success');
        Session::flash('title', 'Deposit Approved');
        Session::flash('icon','success');

        return redirect()->back();


    }

    public function localDepositsFraud(Request $request,$id)
    {


        $deposit= Deposit::find($id);
        $deposit->status = 2;
        $deposit->save();



        session()->flash('message', 'User Deposit Has Been Successfully Set As Fraud');
        Session::flash('type', 'success');
        Session::flash('title', 'Deposit Marked As Fraud');
        Session::flash('icon','success');

        return redirect()->back();
    }

    public function userWithdraws()
    {
        $withdraws= Withdraw::where('status', '>=', 1)->orderBy('updated_at','desc')->get();

        $settings = Settings::first();

        return view('Admin.withdraws.index',compact('withdraws','settings'));
    }

    public function localWithdraws()
    {
        $withdraws= Withdraw::whereStatus(0)->orderBy('created_at','desc')->get();

        $settings = Settings::first();

        return view('Admin.withdraws.users-withdraws',compact('withdraws','settings'));
    }

    public function payment($id)
    {
        $withdraw= Withdraw::find($id);

        $withdraw->status = 1;

        $withdraw->save();

        session()->flash('message', 'User Withdraw Request Has Been Successfully Approved');
        Session::flash('type', 'success');
        Session::flash('title', 'Withdraw Approved');
        Session::flash('icon','success');

        return redirect()->back();
    }

    public function withdrawFraud($id)
    {
        $withdraw= Withdraw::find($id);


        $withdraw->status = 2;
        $withdraw->save();

        $user =  $withdraw->user;

        $user->main_balance = $user->main_balance + $withdraw->amount;

        $user->save();

        session()->flash('message', 'User Withdraw Has Been Successfully Refunded');
        Session::flash('type', 'success');
        Session::flash('title', 'Refund Successfully');
        Session::flash('icon','success');

        return redirect()->back();
    }

}
