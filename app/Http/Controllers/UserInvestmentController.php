<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Interest;
use App\InterestLog;
use App\Invest;
use App\Plan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Nullable;

class UserInvestmentController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('auth');

    }
    public function index(){

        $invests = Plan::whereStatus(1)->get();

        return view('User/invest.index', compact('invests'));
    }
    public function investHistory(){

        // Add instances of investment history. when the user has succesfully made an investment//
        $user = Auth::user();
        $investments = Invest::whereUser_id($user->id)->latest()->paginate(20);

        return view('User/invest.history',compact('investments'));
    }

    public function submit(Request $request){

        $this->validate($request, [

            'amount'=> 'required|numeric',
            'plan_id' => 'required|numeric',

        ]);


        $plan = Plan::find($request->plan_id);

        $minimum = $plan->minimum;

        $maximum = $plan->maximum;

        $amount = $request->amount;

        $user = Auth::user();

        if ($amount < $minimum){

            session()->flash('message', "Your Investment Amount is too low for Invest. You need at least $".$minimum." for Invest in this plan. So Deposit Money First or Try to Income by Refer.");
            Session::flash('type', 'error');
            Session::flash('title', 'Insufficient Balance');
            Session::flash('icon','error');

            return redirect()->route('index');
        }
        elseif ($amount > $maximum){


            session()->flash('message', "Your Investment Amount is too high for Invest. You can invest $".$maximum." for Invest in this plan. So Decrease your Money First or Invest another plan.");
            Session::flash('type', 'error');
            Session::flash('title', 'Amount High');
            Session::flash('icon','error');

            return redirect()->route('index');

        }
        elseif ($amount > $user->deposit_balance ){

            session()->flash('message', "You want to invest $".$amount.". But You have only $".$user->deposit_balance." in your deposit balance. So Deposit money first or try transfer your all money to deposit balance using fund transfer.");
            Session::flash('type', 'error');
            Session::flash('title', 'Insufficient Funds');
            Session::flash('icon','error');

            return redirect()->route('index');

        }

        $plan = Plan::find($request->plan_id);

        $minimum = $plan->minimum;

        $maximum = $plan->maximum;

        $amount = $request->amount;

        $user = Auth::user()->user;

        $percentage =  $plan->percentage;

        $profit = (($percentage / 100) * $amount);
        if ($plan->repeat == 0){
            $return= $profit;
        }
        else
        {
            $return= ($profit / $plan->repeat);
        }
        $invest = (object) array(
            "profit"=>$profit,
            "amount"=>$amount,
            "return"=>$return,
            "total"=>$user + $amount,
            "id" => $request->plan_id,
        );

        return view('User.invest.preview',compact('invest','plan'));

    }

    public function confirm(Request $request)
    {
        $this->validate($request, [

            'amount' => 'required|numeric',
            'plan_id' => 'required|numeric',

        ]);



        $plan = Plan::find($request->plan_id);

        $user = Auth::user();

        $user->deposit_balance = $user->deposit_balance - $request->amount;

        $user->save();

        $delay = $plan->start_duration;

        $today = Carbon:: now();

        $investment = new Invest();
        $investment->plan_id = $request->plan_id;
        $investment->user_id = $user->id;
        $investment->reference_id = Str::uuid(40);
        $investment->amount = $request->amount;
        $investment->start_time = $today->addHours($delay);
        $investment->status = 0;

        $investment->save();

        $interest = new Interest();
        $interest->invest_id = Str::uuid(40);
        $interest->user_id = $user->id;
        $interest->reference_id = Str::uuid(40);
        $interest->start_time = $today->addHours($delay);
        $interest->status = 0;

        $interest->save();

        session()->flash('message', 'Your investment of $' . $investment->amount . ' Has been succfuly created ');
        Session::flash('type','success');
        Session::flash('title','Investment Request Created Successfully!');
        Session::flash('icon','success');

        return redirect('invest.history');

    }


}
