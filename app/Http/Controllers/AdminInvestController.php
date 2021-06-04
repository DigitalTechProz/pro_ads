<?php

namespace App\Http\Controllers;

use App\Invest;
use App\Plan;
use App\Style;
use App\Settings;
use App\User;
use App\Interest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminInvestController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $plans = Plan::all();
        return view('Admin.plan.index',compact('plans'));
    }

    public function create()
    {
        $styles = Style::all();
        return view('Admin.plan.create',compact('styles'));

    }

    public function store(Request $request)
    {

        $this->validate($request, [

            'name'=> 'required|max:100',
            'style_id' => 'required|numeric|min:1|max:200',
            'minimum' => 'required|numeric',
            'maximum' => 'required|numeric',
            'percentage'=> 'required|numeric',
            'repeat' => 'required|numeric',
            'start_duration' => 'required|numeric',
            'status' => 'required|boolean',

        ]);

        $plan = new Plan;

        $plan->name = $request->name;
        $plan->style_id = $request->style_id;
        $plan->minimum = $request->minimum;
        $plan->maximum = $request->maximum;
        $plan->percentage = $request->percentage;
        $plan->repeat = $request->repeat;
        $plan->start_duration = $request->start_duration;
        $plan->status = $request->status;
        $plan->save();

        session()->flash('message', 'The Invest Plan Has Been Successfully Created.');
        Session::flash('icon','success');
        Session::flash('title','Investment Plan Created');
        Session::flash('type','success');

        return redirect()->route('createinvestplan');

    }
    public function edit(Request $request,$id)
    {

        $plan = Plan::findOrfail($id);

        $styles = Style::all();

        return view('Admin.plan.editplan', compact('plan','styles'));
    }


    public function update(Request $request,$id)
    {
        $this->validate($request, [

            'name'=> 'required|max:100',
            'style_id' => 'required|numeric|min:1|max:200',
            'minimum' => 'required|numeric',
            'maximum' => 'required|numeric',
            'percentage'=> 'required|numeric',
            'repeat' => 'required|numeric',
            'start_duration' => 'required|numeric',
            'status' => 'required|boolean',

        ]);

        $plan = Plan::find($id);

        $plan->name = $request->name;
        $plan->style_id = $request->style_id;
        $plan->minimum = $request->minimum;
        $plan->maximum = $request->maximum;
        $plan->percentage = $request->percentage;
        $plan->repeat = $request->repeat;
        $plan->start_duration = $request->start_duration;
        $plan->status = $request->status;
        $plan->update();


        session()->flash('message', 'The Invest Plan Has Been Successfully Updated.');
        Session::flash('icon','success');
        Session::flash('title','Investment Plan Updated');
        Session::flash('type','success');

        return redirect()->route('createinvestplan');

    }

    public function investrequest()
    {

        $investments = Invest::whereStatus(0)->latest()->paginate(10);
        return view('Admin.invest.index', compact('investments'));

    }

    public function localinvestrequest()
    {
        $investments = Invest::whereStatus(0)->latest()->get();

        return view('Admin.invest.localinvest',compact('investments'));

    }
    public function localInvestsUpdate(Request $request,$id)
    {


        $investment= Invest::find($id);
        $settings = Settings::first();
        $user = $investment->user;


        $investment->status = 1;
        $user->save();
        $investment->save();

        session()->flash('message', 'User Investment Request Has Been Successfully Approved');
        Session::flash('type','success');
        Session::flash('title','Investment Request Aproved');
        Session::flash('icon','success');

        return redirect()->back();


    }
}
