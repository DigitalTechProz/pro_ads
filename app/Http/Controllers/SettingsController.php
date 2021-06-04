<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller
{
    //
    public function __construct()
    {

        $this->middleware('admin');


    }

    public function index()
    {
        $settings = Settings::first();

        return view('Admin.settings.index',compact('settings'));


    }

    public function generalSettings(Request $request)
    {


        $this->validate($request, [

            'site_name'=> 'required',
            'site_title' => 'required',
            'company_name' => 'required',
            'contact_email' => 'required|email',
            'app_contact' => 'required|email',
            'address' => 'required',
            'disqus' => 'required',
            'chat_code' => 'required',
            'start_date' => 'required',
            'minimum_deposit' => 'required',
            'minimum_withdraw' => 'required',
            'self_transfer' => 'required|min:0',
            'other_transfer' => 'required|min:0',
            'referral_signup' => 'required|min:0',
            'referral_deposit' => 'required|min:0',
            'latest_deposit' => 'required|boolean',
            'minimum_transfer' => 'required|min:0',
            'payment_proof' => 'required|boolean',
            'referral_invest'=> 'required|min:0',
            'transfer' => 'required|boolean',
            'invest' => 'required|boolean',
            'live_chat' => 'required|boolean',
            'link_share' => 'required|min:0',
            'summary' => 'required|boolean',
        ]);


        $settings = new Settings();

        $settings->site_name = $request->site_name;
        $settings->site_title = $request->site_title;
        $settings->company_name = $request->company_name;
        $settings->contact_email = $request->contact_email;
        $settings->app_contact = $request->app_contact;
        $settings->address = $request->address;
        $settings->disqus = $request->disqus;
        $settings->chat_code = $request->chat_code;
        $settings->start_date = $request->start_date;
        $settings->minimum_deposit = $request->minimum_deposit;
        $settings->minimum_withdraw = $request->minimum_withdraw;
        $settings->self_transfer = $request->self_transfer;
        $settings->other_transfer = $request->other_transfer;
        $settings->referral_signup = $request->referral_signup;
        $settings->referral_deposit = $request->referral_deposit;
        $settings->latest_deposit = $request->latest_deposit;
        $settings->minimum_transfer = $request->minimum_transfer;
        $settings->payment_proof = $request->payment_proof;
        $settings->referral_invest = $request->referral_invest;
        $settings->transfer = $request->transfer;
        $settings->invest = $request->invest;
        $settings->live_chat = $request->live_chat;
        $settings->link_share = $request->link_share;
        $settings->summary = $request->summary;
        $settings->save();


        session()->flash('message', 'Website Settings Has been Successfully Changed.');
        Session::flash('icon','success');
        Session::flash('title','Website Settings Updated');
        Session::flash('type','success');

        return redirect()->route('websitesettings');


    }

}
