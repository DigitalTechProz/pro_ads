<?php

namespace App\Http\Controllers;

use App\Style;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminStyleController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $styles = Style::all();

        return view('Admin.style.index',compact('styles'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'name'=> 'required|max:100',
            'compound' => 'required|min:1',
        ]);

        $style = Style::create([

            'name'=> $request->name,
            'compound' => $request->compound,

        ]);
        session()->flash('success','The ROI style have been succefuly created!');
        Session::flash('type','success');
        Session::flash('title','ROI Style has been created');
        Session::flash('icon','success');

        return redirect()->route('styleindex');

    }
}
