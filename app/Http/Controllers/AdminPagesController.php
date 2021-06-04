<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    //
    public function index()
    {

        $pages = Page::all();

        return view('Admin.page.index', compact('pages'));

    }

    public function create()
    {
        //

    }

    public function store(Request $request)
    {
        //

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

        $page = Page::find($id);

        return view('Admin.page.editpage', compact('page'));
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

            'title'=> 'required|min:5|max:100',
            'status' => 'required|boolean',
            'body' => 'required|min:200|max:50000',

        ]);

        $page= Page::find($id);
        $page->title = $request->title;
        $page->content = $request->body;
        $page->status = $request->status;
        $page->slug = str_slug($request->title);
        $page->save();


        $request->session()->flash('success', 'The Website Page Has Been Successfully Edited.');
        

        return redirect()->route('pageindex');

    }
    public function publish($id)
    {
        //
        $page = Page::find($id);

        $page->status = 1;

        $page->save();

        session()->flash('success', 'This Page Has Been Successfully Published.');
        
        return redirect()->route('pageindex');

    }
    public function unPublish($id)
    {
        //
        $page = Page::find($id);

        $page->status = 0;

        $page->save();

        session()->flash('success', 'This Page Has Been Successfully Un-Published.');
       

        return redirect()->route('pageindex');

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
    }



}
