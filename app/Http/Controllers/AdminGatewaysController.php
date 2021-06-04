<?php

namespace App\Http\Controllers;

use App\Gateway;
use App\Offline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminGatewaysController extends Controller
{
    // Instant Gateway

    public function index()
    {

        $gateways = Gateway::whereNotNull('name')->get();

        return view('Admin.gateways.index',compact('gateways'));

    }

    // Edit Instant Gateway //
    public function edit($id)
    {

        $gateway= Gateway::find($id);
        return view('Admin.gateways.edit', compact('gateway'));

    }

    //Update Instant Gateway //
    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [

            'name'=> 'required|string',
            'account' => 'required|string',
            'fixed' => 'required|numeric',
            'percent' => 'required|numeric',
            'withdraw_fixed'=> 'required|numeric',
            'withdraw_percent'=> 'required|numeric',
            'mini_deposit'=> 'required|numeric',
            'mini_withdraw'=> 'required|numeric',
            'mode' => 'required|numeric|min:0|max:1',
            'status' => 'required|boolean',

        ]);

        $gateway= Gateway::find($id);

        if ($gateway->id == 3){
            $this->validate($request, [
                'val3' => 'required|max:100'
            ]);
            $gateway->val3 = $request->val3;
            $gateway->details = 'Crypto Currency Instant';
        }

        $gateway->name = $request->name;

        $gateway->account = $request->account;

        $gateway->fixed = $request->fixed;

        $gateway->percent = $request->percent;

        $gateway->withdraw_fixed = $request->withdraw_fixed;
        $gateway->withdraw_percent = $request->withdraw_percent;
        $gateway->mini_deposit = $request->mini_deposit;
        $gateway->mini_withdraw = $request->mini_withdraw;

        $gateway->mode = $request->mode;
        $gateway->val1 = $request->val1;

        $gateway->val2 = $request->val2;

        $gateway->status = $request->status;



        $gateway->save();

        session()->flash('message', 'The Gateway Has Been Successfully Edited.');
        Session::flash('type', 'success');
        Session::flash('title', 'Edited Successful');
        Session::flash('icon','success');


        return redirect()->route('Admin.gateways.index');



    }

    // create Instant Gateway //

    public function createInstant()
    {


        return view('Admin.gateways.create');


    }



    // Store Instant Gateway //
    public function storeInstant(Request $request)
    {
        $this->validate($request, [

            'name'=> 'required|string',
            'account' => 'required|string',
            'fixed' => 'required|numeric',
            'percent' => 'required|numeric',
            'withdraw_fixed'=> 'required|numeric',
            'withdraw_percent'=> 'required|numeric',
            'mini_deposit'=> 'required|numeric',
            'mini_withdraw'=> 'required|numeric',
            'mode' => 'required|numeric|min:0|max:1',
            'status' => 'required|boolean',

        ]);

        $gateway= new Gateway();

        $gateway->name = $request->name;

        $gateway->account = $request->account;

        $gateway->fixed = $request->fixed;

        $gateway->percent = $request->percent;

        $gateway->withdraw_fixed = $request->withdraw_fixed;
        $gateway->withdraw_percent = $request->withdraw_percent;
        $gateway->mini_deposit = $request->mini_deposit;
        $gateway->mini_withdraw = $request->mini_withdraw;

        $gateway->mode = $request->mode;
        $gateway->val1 = $request->val1;

        $gateway->val2 = $request->val2;

        $gateway->status = $request->status;


        $gateway->save();

        session()->flash('message', 'The Gateway Has Been Successfully created.');
        Session::flash('type', 'success');
        Session::flash('title', 'Successful');
        Session::flash('icon','success');


        return redirect()->route('admin.gateways.index');


    }

    // Destroy Instant Gateway //
    public function destroy($id)
    {
        //

        $gateway = Gateway::find($id);

        session()->flash('message', $gateway->name. " Can not be delete. This Gateway is required for system. You can only Edit this gateway or If you don't need this gateway then go to settings->gateway option to turn off this gateway. ");
        Session::flash('type', 'warning');
        Session::flash('title', "Can't Be Deleted");
        Session::flash('icon','warning');

        return redirect()->route('admin.gateways.index');


    }

    // Local Gateway //

    public function localindex()
    {
        $gateways = Offline::all();

        return view('Admin.local.index',compact('gateways'));

    }
    public function localcreate()
    {


        return view('Admin.local.create');


    }

    public function store(Request $request)
    {

        $this->validate($request, [

            'name'=> 'required|max:100',
            'status' => 'required|boolean',
            'account' => 'required|max:250',
            'fixed' => 'required|numeric',
            'percent'=> 'required|numeric',
            'withdraw_fixed' => 'required|numeric',
            'withdraw_percent' => 'required|numeric',
            'mini_deposit' => 'required|numeric',
            'mini_withdraw' => 'required|numeric',
            'details' => 'required|max:1000',
        ]);

        $gateway = new Offline();

        $gateway->name = $request->name;
        $gateway->status = $request->status;
        $gateway->account = $request->account;
        $gateway->fixed = $request->fixed;
        $gateway->percent = $request->percent;
        $gateway->withdraw_fixed = $request->withdraw_fixed;
        $gateway->withdraw_percent = $request->withdraw_percent;
        $gateway->mini_deposit = $request->mini_deposit;
        $gateway->mini_withdraw = $request->mini_withdraw;
        $gateway->details = $request->details;
        $gateway->save();

        session()->flash('success', 'The Local Gateway Has Been Successfully Created.');

        return redirect()->route('creategateway');

    }


}
