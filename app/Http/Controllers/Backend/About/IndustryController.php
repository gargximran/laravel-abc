<?php

namespace App\Http\Controllers\Backend\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\About\Industry;

class IndustryController extends Controller
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
        $request->validate(
            [
                'industry' => 'required'
            ],
        );

        $industry = new Industry();

        $industry->information = $request->industry;
        $industry->save();

        //write success message
        $request->session()->flash('create', ' Industry added Successfully');  

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
    public function edit(Industry $industry)
    {
        return view('backend.pages.about.editIndustry', compact('industry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Industry $industry)
    {
        $request->validate(
            [
                'industry' => 'required'
            ],
        );

        $industry->information = $request->industry;
        $industry->save();

        //write success message
        $request->session()->flash('update', ' Industry updated Successfully');  

        return redirect()->route('aboutpage.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Industry $industry)
    {
        if( !is_null($industry) ){
            $industry->delete();
        }
        //write success message
        $request->session()->flash('delete', ' Industry deleted Successfully');  

        return redirect()->route('aboutpage.show');
    }
}
