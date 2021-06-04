<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Membership;
use App\PTC;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminPTCController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $advertisements= PTC::whereType(1)->paginate(10);

        return view('Admin.PTC.index', compact('advertisements'));


    }
    public function preview($id)
    {

        $log = PTC::findOrFail($id);

        return view('Admin.PTC.preview', compact('log'));


    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $memberships= Membership::all();

        return view('Admin.PTC.create', compact('memberships'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //-

        $this->validate($request, [

            'title'=> 'required|max:15',
            'details' => 'required|max:100',
            'duration' => 'required|numeric',
            'membership_id' => 'required',
            'ad_link' => 'required|url',
            'rewards' => 'required|numeric',
            'hit' => 'required|numeric'

        ]);
        $ptc = PTC::create([

            'title' => $request->title,
            'details' => $request->details,
            'duration' => $request->duration,
            'rewards' => $request->rewards,
            'ad_link' => $request->ad_link,
            'hit' => $request->hit,
            'type' =>1,
            'count' =>0,
            'membership_id' => $request->membership_id,
        ]);





        session()->flash('message', 'The Paid To Click Has Been Successfully Created.');
        Session::flash('type', 'success');
        Session::flash('title', 'Created Successful');
        Session::flash('icon','success');

        return redirect()->route('admin.ptcs.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $advertisement = PTC::find($id);
        $memberships= Membership::all();

        return view('Admin.PTC.edit', compact('advertisement','memberships'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [

            'title'=> 'required|max:15',
            'details' => 'required|max:100',
            'duration' => 'required|numeric',
            'membership_id' => 'required',
            'ad_link' => 'required|url',
            'rewards' => 'required|numeric',
             'hit' => 'required|numeric',
            'status' => 'required|boolean',

        ]);


        PTC::find($id)->update([

            'title' => $request->title,
            'details' => $request->details,
            'duration' => $request->duration,
            'rewards' => $request->rewards,
            'ad_link' => $request->ad_link,
            'hit' => $request->hit,
            'status' => $request->status,
            'membership_id' => $request->membership_id,

        ]);

        session()->flash('message', 'The Paid To Click Has Been Successfully Updated.');
        Session::flash('type', 'success');
        Session::flash('title', 'Updated Successful');
        Session::flash('icon','success');

        return redirect()->route('admin.ptcs.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $advertisement = PTC::find($id);

        $advert = Advert::wherePtc_id($advertisement->id);
        $advert->delete();
        $advertisement->delete();

        session()->flash('message', 'The PTC Advertisements Has Been Successfully Deleted.');
        Session::flash('type', 'success');
        Session::flash('title', 'Deleted Successful');
        Session::flash('icon','success');

        return redirect()->route('admin.ptcs.index');

    }
}
