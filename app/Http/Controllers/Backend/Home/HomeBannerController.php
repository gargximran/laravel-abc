<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\Home\HomeBanner;
use Illuminate\Support\Facades\File; 
use Intervention\Image\Facades\Image; 

class HomeBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homebanners = HomeBanner::orderBy('id','asc')->get();
        return view('backend.pages.home.manage', compact('homebanners'));
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
                'title' => 'required',
            
                'image' => 'required'
            ]
        );

        $homebanner = new homebanner();

        $homebanner->title = $request->title;
        $homebanner->description = $request->description;
        $homebanner->link = $request->link;
        $homebanner->slug = Str::slug($request->title);

        if( $request->image ){
            $image  = $request->file('image');
            $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/banner/' . $img);
            Image::make($image)->save($location);
            $homebanner->image = $img;
        }
        $homebanner->save();

        //write success message
        $request->session()->flash('create', ' Home banner added Successfully');  

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
    public function edit(HomeBanner $homebanner)
    {
        return view('backend.pages.home.editHomeBanner', compact('homebanner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeBanner $homebanner)
    {
        $request->validate(
            [
                'title' => 'required',
                'description' => 'required'
            ]
        );

        $homebanner->title = $request->title;
        $homebanner->description = $request->description;
        $homebanner->link = $request->link;
        $homebanner->slug = Str::slug($request->title);

        if( $request->image ){
            if( File::exists('images/banner/' . $homebanner->image) ){
                File::delete('images/banner/' . $homebanner->image);
            }
            $image  = $request->file('image');
            $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/banner/' . $img);
            Image::make($image)->save($location);
            $homebanner->image = $img;
        }
        $homebanner->save();

        //write success message
        $request->session()->flash('update', ' Home banner updated Successfully');  

        return redirect()->route('homepage.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, HomeBanner $homebanner)
    {
        if( !is_null($homebanner) ){
            if( File::exists('images/banner/' . $homebanner->image) ){
                File::delete('images/banner/' . $homebanner->image);
            }
            $homebanner->delete();
        }
        //write success message
        $request->session()->flash('delete', '  homebanner deleted Successfully'); 
        return redirect()->route('homepage.show');
    }
}