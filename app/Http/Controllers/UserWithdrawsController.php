<?php

namespace App\Http\Controllers;

use App\Gateway;
use App\Offline;
use App\Settings;
use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserWithdrawsController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('auth');

    }
    public function index()
    {

        return view('User.withdraw.index');
    }

    public function withdraw(){

        $gateways = Offline::all();
        $user = Auth::user();
        $settings = Settings::first();

        return view('User/withdraw.makewithdrawal',compact('gateways','user','settings'));
    }

    public function history()
    {
        $user = Auth::user();

        $withdraws = Withdraw::whereUser_id($user->id)->orderBy('created_at', 'desc')->paginate(20);

        return view('User.withdraw.history',compact('withdraws'));

    }

    public function postWithdrawal(Request $request)
    {
        $this->validate($request, [
            'gateway'=> 'required|numeric',
            'amount' => 'required|numeric',
            'account' => 'required',
        ]);

        $user = Auth::user();

        $settings = Settings::first();

        if ($user->main_balance < $request->amount){

            session()->flash('message', "You don't have enough funds to withdraw. You have only $ ".$user->main_balance." to withdraw. Please earn some money first. ");
            Session::flash('type', 'error');
            Session::flash('title', 'Insufficient Funds');
            Session::flash('icon','error');

            return redirect(route('makewithdrawal'));

        }
        $gateway= Offline::whereId($request->gateway)->first();
        if ($gateway->mini_withdraw > $request->amount){

            session()->flash('message', 'You need at least  $ '.$gateway->mini_withdraw.' to withdraw money. Please earn some money first. ');
            Session::flash('type', 'error');
            Session::flash('title', 'Insufficient Funds');
            Session::flash('icon','error');

            return redirect(route('makewithdrawal'));
        }

        $percentage =  $gateway->withdraw_percent;
        $fixed =  $gateway->withdraw_fixed;
        $charge = (($percentage / 100) * $request->amount) + $fixed;
        $new_amount = $request->amount - $charge;

            $withdraw= Withdraw::create([

                'transaction_id' => uniqid(6).$user->id.uniqid(6),
                'user_id'=> $user->id,
                'gateway_name'=> $gateway->name,
                'amount'=> $request->amount,
                'charge'=> $charge,
                'net_amount'=> $new_amount,
                'status'=> 0,
                'account'=> $request->account,

            ]);

            $user->main_balance = $user->main_balance - $request->amount;
            $user->save();

            session()->flash('message', 'After Charging Gateway Fee Your Total Withdraw Amount $ '.$new_amount.' Has Been Successfully Requested. Fund is automatically send to your account Once we verify ');
            Session::flash('type','success');
            Session::flash('title','Withdrawal Request Created Succesfully');
            Session::flash('icon','success');

            return redirect(route('user.withdraw.history'));
        }


}
