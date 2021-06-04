<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\User;


class UserProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
         return view('User/profile');

    }
/**
 * Update User Profile
 */
    public function profileUpdate(Request $request)
    {
        //Save Profile Update to Database//
        $user = Auth::user();
        if (Auth::user()->email === $request['email']) {

            $this->validate($request, [

                'name'=> 'required',
                'email' => 'required|email'


            ]);

        } else {

            $this->validate($request, [

                'name'=> 'required',
                'email' => 'required|email|unique:users',
                'country' => 'required|max:60',
                'address'=> 'required|max:250',
                'bitcoinaddress' => 'required|max:250'

            ]);

        }

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->country = $request['country'];
        $user->address = $request['address'];
        $user->bitcoinaddress = $request['bitcoinaddress'];
        $user->save();


        session()->flash('message', 'Your Profile Has Been Successfully Updated.');
        Session::flash('type','success');
        Session::flash('title','Profile Has Been Updated');
        Session::flash('icon','success');

        return back();

     }

 }
