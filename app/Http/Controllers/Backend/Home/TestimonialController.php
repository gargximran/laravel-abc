<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Home\Testimonial;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image; 
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
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
                'name' => 'required'
            ],
            [
                'designation' => 'required'
            ],
            [
                'comments' => 'required'
            ],
            [
                'image' => 'required'
            ]
        );

        $testimonial = new Testimonial();

        $testimonial->name          = $request->name;
        $testimonial->slug          = Str::slug($request->name);
        $testimonial->designation   = $request->designation;
        $testimonial->comments      = $request->comments;

        if( $request->image ){
            $image  = $request->file('image');
            $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/testimonial/' . $img);
            Image::make($image)->save($location);
            $testimonial->image = $img;
        }
        $testimonial->save();

        //write success message
        $request->session()->flash('message', ' Testimonial added Successfully');  

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
    public function edit(Testimonial $testimonial)
    {
        return view('backend.pages.home.editTestimonial' , compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate(
            [
                'name' => 'required'
            ],
            [
                'designation' => 'required'
            ],
            [
                'comments' => 'required'
            ],
            [
                'image' => 'required'
            ]
        );

        $testimonial->name          = $request->name;
        $testimonial->slug          = Str::slug($request->name);
        $testimonial->designation   = $request->designation;
        $testimonial->comments      = $request->comments;

        if( $request->image ){
            if( File::exists('images/testimonial' . $testimonial->image) ){
                File::delete('images/testimonial' . $testimonial->image);
            }

            $image  = $request->file('image');
            $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/testimonial/' . $img);
            Image::make($image)->save($location);
            $testimonial->image = $img;
        }
        $testimonial->save();

        //write success message
        $request->session()->flash('update', ' Testimonial updated Successfully');  

        return redirect()->route('homepage.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Testimonial $testimonial)
    {
        if( !is_null($testimonial) ){
            if( File::exists('images/testimonial/' . $testimonial->image) ){
                File::delete('images/testimonial/' . $testimonial->image);
            }
            $testimonial->delete();
        }
        //write success message
        $request->session()->flash('delete', '  Testimonial deleted Successfully'); 
        return redirect()->route('homepage.show');
    }
}