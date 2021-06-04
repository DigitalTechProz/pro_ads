<?php

namespace App\Http\Controllers;

use App\Crypto;
use App\Deposit;
use App\digitech\CoinPayments;
use App\Gateway;
use App\Offline;
use App\Settings;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserDepositsController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();

        $deposits = Deposit::whereUser_id($user->id)->orderBy('updated_at', 'desc')->paginate(15);

        return view('User.deposit.index', compact('deposits'));


    }

    public function create()
    {
        $gateways = Gateway::whereStatus(1)->get();

        $local_gateways = Offline::whereStatus(1)->get();

        $user = Auth::user();

        return view('User.deposit.create', compact('local_gateways','user','gateways'));
    }

    public function paymentPreview(Request $request)
    {
        $this->validate($request, [

            'gateway' => 'required|numeric|max:200',
            'amount' => 'required|numeric',

        ]);

        $settings = Settings::first();
        $gateway = Offline::find($request->gateway);
        if ($gateway->mini_deposit > $request->amount) {

            session()->flash('message', 'You need at least  $ ' . $gateway->mini_deposit . ' to deposit. Please increase money first. ');
            Session::flash('type','warning');
            Session::flash('title','Amount Is Insuffient For Deposit');
            Session::flash('icon','warning');

            return redirect()->route('makedeposit');


        }

        $gateway = Offline::find($request->gateway);

        $percentage = $gateway->percent;

        $fixed = $gateway->fixed;

        $charge = (($percentage / 100) * $request->amount) + $fixed;

        $new_amount = $request->amount - $charge;

        $user = Auth::user();


        $deposit = (object)array(

            'amount' => $request->amount,
            'charge' => $charge,
            'net_amount' => $new_amount,
            'code' => uniqid(10),
        );

        $user->d_code = $deposit->code;
        $user->save;


        return view('User.deposit.preview', compact('gateway', 'user', 'deposit'));

    }

    public function offline(Request $request)
    {

        $this->validate($request, [

            'gateway' => 'required|numeric|max:30',
            'amount' => 'required|numeric',
            'reference' => 'required|max:50',
        ]);

        $user = Auth::user();
        $gateway = Offline::whereId($request->gateway)->first();

        $percentage = $gateway->percent;
        $fixed = $gateway->fixed;

        $charge = (($percentage / 100) * $request->amount) + $fixed;

        $new_amount = $request->amount - $charge;

        $deposit = Deposit::create([

            'transaction_id' => $request->reference,
            'user_id' => $user->id,
            'gateway_name' => $gateway->name,
            'amount' => $request->amount,
            'charge' => $charge,
            'net_amount' => $new_amount,
            'status' => 0,
            'details' => 'No Details are Provided',

        ]);


        session()->flash('message', 'After Charging Gateway Fee Your Total Deposit Amount $ ' . $new_amount . ' Has Been Successfully Requested. Your Funds will automatically be added to your balance Once we verify ');
        Session::flash('type','success');
        Session::flash('title','Deposit Request Created Successfully');
        Session::flash('icon','success');

        return redirect()->route('depositindex');

    }

    //**** Crypto Instanyt Deposits */

    public function cryptoConfirm(Request $request)
    {

        $gateway = Gateway::find(3);
        $user = User::findOrFail($request->nothing);
        $percentage = $gateway->percent;
        $fixed = $gateway->fixed;

        $charge = (($percentage / 100) * $request->amount) + $fixed;

        $new_amount = $request->amount - $charge;
        $publicKey=$gateway->val1;
        $privateKey=$gateway->val2;
        $cps = new CoinPayments();
        $cps->Setup($privateKey, $publicKey);
        $req = array(
            'amount' => $request->amount,
            'currency1' => 'USD',
            'currency2' => $request->currency,
            'buyer_email' => $user->email,
            'buyer_name' => $user->name,
            'item_name' => 'Instant Deposit',
            'custom' => $request->nothing,
            'item_number' => $request->code.$user->id,
            'address' => '',
            'ipn_url' => route('userDepositCrypto'),
        );

        $result = $cps->CreateTransaction($req);

        if ($result['error'] == 'ok') {

            $deposit = Crypto::create([

                'amount' => $request->amount,
                'currency1' => 'USD',
                'currency2' => $request->currency,
                'details' => 'Instant Deposit Via Crypto Gateways',
                'transaction_id' =>$request->code.$user->id,
                'user_id' => $user->id,
                'gateway_id' => $gateway->id,
                'charge' => $charge,
                'amount2'=>$result['result']['amount'],
                'net_amount' => $new_amount,
                'status' => 0,
                'payment' => 0,

            ]);

            return redirect($result['result']['status_url']);

        } else {

            print 'Error: '.$result['error']."\n";
        }
    }

    //***Confirm Payment */

    public function cryptoStatus(Request $request)
    {
        $gateway = Gateway::find(3);

        $settings = Settings::first();

        $cp_merchant_id = $gateway->account;
        $cp_ipn_secret = $gateway->val3;
        $cp_debug_email = $settings->contact_email;
        function errorAndDie($error_msg) {
            global $cp_debug_email;
            if (!empty($cp_debug_email)) {
                $report = 'Error: '.$error_msg."\n\n";
                $report .= "POST Data\n\n";
                foreach ($_POST as $k => $v) {
                    $report .= "|$k| = |$v|\n";
                }
                mail($cp_debug_email, 'CoinPayments IPN Error', $report);
            }
            die('IPN Error: '.$error_msg);
        }
        if (!isset($_POST['ipn_mode']) || $_POST['ipn_mode'] != 'hmac') {
            errorAndDie('IPN Mode is not HMAC');
        }
        if (!isset($_SERVER['HTTP_HMAC']) || empty($_SERVER['HTTP_HMAC'])) {
            errorAndDie('No HMAC signature sent.');
        }
        $request = file_get_contents('php://input');
        if ($request === FALSE || empty($request)) {
            errorAndDie('Error reading POST data');
        }
        if (!isset($_POST['merchant']) || $_POST['merchant'] != trim($cp_merchant_id)) {
            errorAndDie('No or incorrect Merchant ID passed');
        }
        $hmac = hash_hmac("sha512", $request, trim($cp_ipn_secret));
        if (!hash_equals($hmac, $_SERVER['HTTP_HMAC'])) {
            errorAndDie('HMAC signature does not match');
        }
        $txn_id = $_POST['txn_id'];
        $item_name = $_POST['item_name'];
        $item_number = $_POST['item_number'];
        $amount1 = floatval($_POST['amount1']);
        $amount2 = floatval($_POST['amount2']);
        $currency1 = $_POST['currency1'];
        $currency2 = $_POST['currency2'];
        $status = intval($_POST['status']);
        $status_text = $_POST['status_text'];
        $crypto = Crypto::whereTransaction_id($item_number)->first();
        $user = $crypto->user;
        $gateway = $crypto->gateway;
        $order_currency = $crypto->currency1;
        $order_total = $crypto->amount;
        if ($currency1 != $order_currency) {
            errorAndDie('Original currency mismatch!');
        }
        if ($amount1 < $order_total) {
            errorAndDie('Amount is less than order total!');
        }
        if ($status >= 100 || $status == 2) {

            if ($crypto->payment == 0 ){

                $crypto->status = $status;
                $crypto->payment = 1;
                $crypto->save();

                $deposit = Deposit::create([
                    'transaction_id' => $item_number,
                    'user_id' => $user->id,
                    'gateway_name' => $gateway->name,
                    'amount' => $request->amount,
                    'charge' => $crypto->charge,
                    'net_amount' => $crypto->charge,
                    'status' => 1,
                    'details' => 'Crypto Instant Deposit',
                ]);
                $user->deposit_balance = $user->deposit_balance + $crypto->amount;
                $user->save();
            }
        } else if ($status < 0) {
            $crypto->status = $status;
            $crypto->save();
        } else {
            $crypto->status = $status;
            $crypto->save();
        }
        die('IPN OK');

    }

    //*** Instant Payment Preview  */

    public function instantPreview(Request $request)
    {
        $this->validate($request, [

            'gateway' => 'required|numeric|max:200',
            'amount' => 'required|numeric',

        ]);

        $settings = Settings::first();
        $gateway = Gateway::find($request->gateway);
        if ($gateway->mini_deposit > $request->amount) {

            session()->flash('message', 'You need at least  $ ' . $gateway->mini_deposit . ' to deposit money. Please increase money first. ');
            Session::flash('type', 'error');
            Session::flash('title', 'Minimum Deposit');

            return redirect(route('makedeposit'));

        }



        $percentage = $gateway->percent;

        $fixed = $gateway->fixed;

        $charge = (($percentage / 100) * $request->amount) + $fixed;

        $new_amount = $request->amount - $charge;

        $user = Auth::user();


        $deposit = (object)array(

            'amount' => $request->amount,
            'charge' => $charge,
            'net_amount' => $new_amount,
            'code' => uniqid(10),
        );

        $dep = Deposit::create([
            'amount' => $request->amount,
            'details' => 'Waiting for payment',
            'transaction_id' =>$deposit->code,
            'user_id' => $user->id,
            'gateway_name' => $gateway->name,
            'charge' => $charge,
            'net_amount' => $new_amount,
            'status' => 0,
        ]);

        $user->d_code = $deposit->code;
        $user->save;


        return view('User.deposit.instant', compact('gateway', 'user', 'deposit'));

    }

}
