<?php

namespace App\Http\Controllers;

use App\Advert;
use App\User;
use App\Link;
use App\PTC;
use App\Referral;
use App\Settings;
use App\Share;
use App\UserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserAdvertsController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('auth');

    }
    public function shareLinks()
    {

        $user = Auth::user();
        $settings = Settings::first();

        $ad_limit = $user->membership->ad_limit;

        $membership = $user->membership->id;

        $ad = Share::whereUser_id($user->id)->where('date','=',date('Y-m-d'))->count();

        if ($ad == 0)
        {
            $ptcse = Link::whereMembership_id($membership)->take($ad_limit)->whereStatus(1)->count();

            if ($ptcse == 0){

                session()->flash('message', 'Sorry there are currently no cash links for you. Please wait or upgrade your membership, ');
                Session::flash('type', 'error');
                Session::flash('title', 'Error');
                Session::flash('icon','error');

                return redirect()->route('userMemberships');

            }
            else {

                $ptcs = Link::whereMembership_id($membership)->take($ad_limit)->whereStatus(1)->get();

                foreach ($ptcs as $ptc)
                {
                    $info =([

                        'user_id'=> $user->id,
                        'date'=> date('Y-m-d'),
                        'link_id'=> $ptc->id,

                    ]);

                    Share::create($info);
                }

                $adverts = Share::whereUser_id($user->id)->where('date','=',date('Y-m-d'))->paginate(10);

                return view('User.viewads.share',compact('adverts','settings'));

            }

        }else{

            $adverts = Share::whereUser_id($user->id)->where('date','=',date('Y-m-d'))->paginate(10);
            return view('User.viewads.share',compact('adverts','settings'));
        }

    }
    public function save_share($id) {

        $user = Auth::user();
        $advert= Share::findOrFail($id);
        if ($advert->status == 1){

            session()->flash('message', 'This Ad has already been  Viewed.');
            Session::flash('type', 'warning');
            Session::flash('title', 'Un-Successful');
            Session::flash('icon','warning');

            return redirect()->route('userLink.share');
        }
        $advert->status = 1;
        $advert->save();
        $user = $user->main_balance;
        $rewards = $advert->link->rewards;
        $user->main_balance = $user->main_balance + $rewards;
        $user->save();
        $log = UserLog::create([
            'user_id' => $user->id,
            'reference' => uniqid(12),
            'type' => 1,
            'for' => 'Cash Links',
            'from' => 'Self',
            'details'=>'You Have Received Rewards for Cash Link View',
            'amount'=>$rewards,
        ]);
        $upliner = Referral::whereUser_id($user->id)->count();
        if ($upliner == 1){
            $settings = Settings::first();
            $referral = Referral::whereUser_id($user->id)->first();
            $upliner = $referral->reflink->user;
            $percentage = $settings->referral_advert;
            $commission = (($percentage / 100) * $rewards);
            $upliner->referral_balance = $upliner->referral_balance + $commission;
            $upliner->save();
            $referral->total = $referral->total + $commission;
            $referral->today = $referral->today + $commission;
            $referral->save();
            $log = UserLog::create([
                'user_id' => $referral->reflink->user->id,
                'reference' => uniqid(12),
                'for' => 'Referral',
                'type' => 2,
                'from' => $user->name,
                'details'=>'You Have Received Referral Bonus for Cash Link View',
                'amount'=>$commission,
            ]);
        }

        session()->flash('message', 'This Ad Has Been Successfully Viewed.');
        Session::flash('type', 'success');
        Session::flash('title', 'You have Earned Rewards');
        Session::flash('icon','success');

        $digitech = "success";

        return response()->json(array('digitech'=>$digitech), 200);

    }



    public function cashLinks()
    {

        $user = Auth::user();

        $settings = Settings::first();

        $ad_limit = $user->membership->ad_limit;

        $membership = $user->membership->id;

        $ad = Advert::whereUser_id($user->id)->where('date','=',date('Y-m-d'))->count();

        if ($ad == 0)
        {
            $ptcse = PTC::whereMembership_id($membership)->take($ad_limit)->whereStatus(1)->count();

            if ($ptcse == 0){

                session()->flash('message', 'Sorry there are currently no cash links for you. Please wait or upgrade your membership, ');
                Session::flash('type', 'error');
                Session::flash('title', 'Error');
                Session::flash('icon','error');

                return redirect()->route('userMemberships');

            }
            else {

                $ptcs = PTC::whereMembership_id($membership)->take($ad_limit)->whereStatus(1)->get();

                foreach ($ptcs as $ptc)
                {
                    $info =([

                        'user_id'=> $user->id,
                        'date'=> date('Y-m-d'),
                        'ptc_id'=> $ptc->id,

                    ]);

                    $advert = Advert::create($info);

                    $advert->status = 0;
                    $advert->save();
                }

                $adverts = Advert::whereUser_id($user->id)->where('date','=',date('Y-m-d'))->paginate(10);

                return view('User.viewads.index',compact('adverts','settings','user'));

            }

        }else{

            $adverts = Advert::whereUser_id($user->id)->where('date','=',date('Y-m-d'))->paginate(10);

            return view('User.viewads.index',compact('adverts','settings','user'));
        }

    }

    public function cashLinkConfirm($id)
    {
        $user = Auth::user();
        $advert= Advert::findOrFail($id);

        if ($advert->status == 1){

            session()->flash('message', 'This Ad Has Been Already Successfully Viewed.');
            Session::flash('type', 'warning');
            Session::flash('title', 'Un-Successful');
            Session::flash('icon','warning');

            return redirect()->route('userCash.links');

        }

        if ($advert->ptc->type == 2){

            $advert->ptc->order->totalhit =  $advert->ptc->order->totalhit +1;
            $advert->ptc->order->save();
        }
        $advert->status = 1;
        $advert->save();

        $advert->ptc->count = $advert->ptc->count + 1;
        $advert->ptc->save();

        $rewards = $advert->ptc->rewards;

        $user->main_balance = $user->main_balance + $rewards;
        $user->save();

        $log = UserLog::create([
            'user_id' => $user->id,
            'reference' => uniqid(12),
            'type' => 1,
            'for' => 'Cash Links',
            'from' => 'Self',
            'details'=>'You Have Received Rewards for Cash Link View',
            'amount'=>$rewards,
        ]);
        $upliner = Referral::whereUser_id($user->id)->count();
        if ($upliner == 1){
            $settings = Settings::first();
            $referral = Referral::whereUser_id($user->id)->first();
            $upliner = $referral->reflink->user;
            $percentage = $settings->referral_advert;
            $commission = (($percentage / 100) * $rewards);
            $upliner->referral_balance = $upliner->referral_balance + $commission;
            $upliner->save();
            $referral->total = $referral->total + $commission;
            $referral->today = $referral->today + $commission;
            $referral->save();
            $log = UserLog::create([
                'user_id' => $referral->reflink->user->id,
                'reference' => uniqid(12),
                'for' => 'Referral',
                'type' => 2,
                'from' => $user->name,
                'details'=>'You Have Received Referral Bonus for Cash Link View',
                'amount'=>$commission,
            ]);
        }

        session()->flash('message', 'This Ad Has Been Successfully Viewed.');
        Session::flash('type', 'success');
        Session::flash('title', 'Earn Successful');
        return redirect()->route('userCash.links');
    }
    public function cashLinkShow($id)
    {

        $advert= Advert::findOrFail($id);

        if ($advert->ptc->status == 0){

            $advert->status = 1;
            $advert->save();

            session()->flash('message', 'This Ad Has Been Inactive. You will not get any Rewards.');
            Session::flash('type', 'warning');
            Session::flash('title', 'Un-Successful');
            Session::flash('icon','warning');

            return redirect()->route('userCash.links');
        }

        if ($advert->ptc->hit == $advert->ptc->count){

            $advert->ptc->status = 2;
            $advert->ptc->save();

            if ($advert->ptc->type == 2){

                $advert->ptc->order->status = 2;
                $advert->ptc->order->save();
            }

            $advert->status = 1;
            $advert->save();

            session()->flash('message', 'This Ad Has Been Expired or Traffic Limit Reached. You will not get any Rewards.');
            Session::flash('type', 'warning');
            Session::flash('title', 'Un-Successful');
            Session::flash('icon','warning');

            return redirect()->route('userCash.links');
        }


        return view('User.viewads.showads', compact('advert'));

    }
}
