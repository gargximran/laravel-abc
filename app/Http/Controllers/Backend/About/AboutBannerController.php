<?php

namespace App\Http\Controllers\Backend\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\About\AboutBanner;

class AboutBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => 'required'
        ]);

        $about = new AboutBanner();

        $about->title = $request->title;
        $about->save();

        //write success message
        $request->session()->flash('create', ' Banner title added Successfully');  

        return back();
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
    public function edit(AboutBanner $aboutbanner)
    {
        return view('backend.pages.about.editAboutBanner', compact('aboutbanner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutBanner $aboutbanner)
    {
        if( !is_null($aboutbanner) ){
            $request->validate([
                    'title' => 'required'
                ]);

            $aboutbanner->title = $request->title;
            $aboutbanner->save();

            //write success message
            $request->session()->flash('update', ' Banner title updated Successfully');

            return redirect()->route('aboutpage.show');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, AboutBanner $aboutbanner)
    {
        if( !is_null($aboutbanner) ){
            $aboutbanner->delete();
        }
        //write success message
        $request->session()->flash('delete', ' Banner title deleted Successfully');

        return redirect()->route('aboutpage.show');
    }
}