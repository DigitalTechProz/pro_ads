<?php

namespace App\Http\Controllers;

use App\DailyEarningsLog;
use App\DailyRewardsLog;
use App\Invest;
use App\Membership;
use App\Order;
use App\Referral;
use App\Scheme;
use App\Settings;
use App\Testimonial;
use App\User;
use App\UserLog;
use App\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user = Auth::user();

        $settings = Settings::first();
        $time = date('M j, Y  H:i:s', strtotime($user->bonus));
        $rewards = json_encode($time);

        $referral_notify = Referral::where('reflink_id','=',$user->id)->get();
        $withdraw_approved_notify = Withdraw::whereUser_id($user->id)->whereStatus(1)->get();


        $Withdrawal = Withdraw::whereUser_id($user->id)->whereStatus(1)->select('amount')->sum('amount');
        $pending = Withdraw::whereUser_id($user->id)->whereStatus(0)->select('amount')->sum('amount');
        $Invest = Invest::whereUser_id($user->id)->whereStatus(1)->select('amount')->sum('amount');


        return view('/User.userdashboard',compact('user','Withdrawal','Invest','referral_notify','rewards','settings','pending','withdraw_approved_notify'));

    }
    public function earnHistory()
    {
        $user = Auth::user();

        $earnings = UserLog::whereUser_id($user->id)->orderBy('created_at', 'desc')->paginate(20);


        return view('User.history.earning', compact('earnings'));
    }

    public function dailyearningsHistory()
    {
        $user = Auth::user();
        $daily_earnings = DailyRewardsLog::whereUser_id($user->id)->orderBy('created_at','desc')->paginate(10);

        return view('User.history.dailyearnings',compact('daily_earnings'));
    }

    public function daily()
    {
        $user = Auth::user();

        $now = Carbon::now();
        $settings = Settings::first();
        $user->bonus < $now;

        $user->bonus = $now->addHours(24);
        $user->save();
        $user->main_balance = $user->main_balance + $settings->daily_rewards;
        $user->save();

        session()->flash('message', "You have successfully Claimed your $ ".$settings->daily_rewards." daily rewards.");
        Session::flash('type', 'success');
        Session::flash('title', 'Claimed Successful');
        Session::flash('icon','success');


        return redirect()->route('userdashboard');
    }

    public function uPlan()
    {

        $uPlans = Scheme::whereStatus(1)->get();
        $settings = Settings::first();
        $memberships = Membership::all();

        return view('User.advert.index', compact('uPlans', 'memberships','settings'));
    }

    public function pShow($id)
    {

        $log = Order::findOrFail($id);
        return view('User.viewads.preads', compact('log'));

    }

    public function uPlanActive(Request $request, $id)
    {

        $user = Auth::user();

        $uPlan = Scheme::find($id);

        if ($uPlan->type == 1) {

            $this->validate($request, [
                'name' => 'required|min:1|max:199',
                'url' => 'required|url',
                'membership' => 'required|min:1',
            ]);
            $balance = $user->deposit_balance;

            if ($uPlan->price > $balance) {

                session()->flash('message', "You don't have sufficient balance. Please deposit money first or earn money");
                Session::flash('type', 'error');
                Session::flash('title', 'Insufficient Balance');
                Session::flash('icon','error');

                return redirect()->back();
            }

            $user->deposit_balance = $user->deposit_balance - $uPlan->price;

            $user->save();

            $order = new Order();
            $order->scheme_id = $uPlan->id;
            $order->user_id = $user->id;
            $order->status = 0;
            $order->totalHit = 0;
            $order->url = $request->url;
            $order->title = $request->name;
            $order->membership_id = $request->membership;
            $order->type = 1;
            $order->save();

            session()->flash('message', 'Your Website Ads Request Has Been Successfully Submitted.');
            Session::flash('type', 'success');
            Session::flash('title', 'Request Successful');
            Session::flash('icon','success');

            return redirect()->route('uPlanLog');

        } else {

            $this->validate($request, [
                'name' => 'required|min:1|max:199',
                'code' => 'required|min:1|max:4000',
            ]);
            $balance = $user->deposit_balance;

            if ($uPlan->price > $balance) {

                session()->flash('message', "You don't have sufficient balance. Please deposit money first or earn money");
                Session::flash('type', 'error');
                Session::flash('title', 'Insufficient Balance');
                Session::flash('icon','error');

                return redirect()->route('uPlanLog');
            }
        }

    }

    public function uPlanLog()
    {
        $user = Auth::user();

        $logs = Order::whereUser_id($user->id)->get();

        return view('User.advert.log', compact('logs'));
    }

    public function review()
    {
        $user = Auth::user();

        $review = Testimonial::whereUser_id($user->id)->get();

        return view('User.testimonial', compact('review'));
    }

    public function reviewPost(Request $request)
    {
        $this->validate($request, [

            'title' => 'required|min:20|max:100',
            'comment' => 'required|min:50|max:500',

        ]);

        $user = Auth::user();

        $testionial = Testimonial::create([

            'title' => $request->title,
            'comment' => $request->comment,
            'user_id' => $user->id,
            'status' => 0,

        ]);

        session()->flash('message', 'Your Review Has Been Successfully Submitted.');
        Session::flash('type', 'success');
        Session::flash('title', 'Review Successful');
        Session::flash('icon','success');

        return redirect()->route('userdashboard');


    }

}
