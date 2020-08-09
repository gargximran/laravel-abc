<?php

namespace App\Http\Controllers;

use App\HomeSlider;
use Illuminate\Http\Request;
use Image;
use File;
use Str;
class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliderContents= HomeSlider::all();
         return view('admin.home_slider.index', compact('sliderContents'));
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
            "name" => "bail|required",
    
            "description" => "bail|required",
            "status" => "required",
            "image" => 'bail|required|image'

        ]);

        $imageName = Str::random(14).".png";

        Image::make($request->image)->encode('png', 100)->save(public_path('images/slider_image/').$imageName);

        $newSlide = new HomeSlider();
        $newSlide->title = $request->name;
        $newSlide->red_text = $request->red_text;
        $newSlide->description = $request->description;
        $newSlide->image = $imageName;
        $newSlide->status = $request->status;

        $newSlide->save();

        return redirect()->route('home_slider_show');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function show(HomeSlider $homeSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeSlider $id)
    {
        return view('admin.home_slider.edit', compact('id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeSlider $id)
    {

        $request->validate([
            "name" => "bail|required",
    
            "description" => "bail|required",
            "status" => "required"
           

        ]);
        if($request->image){
            if(File::exists(public_path('images/slider_image/'.$id->image))){
                File::delete(public_path('images/slider_image/'.$id->image));
            }


            $imageName = Str::random(14).".png";

            Image::make($request->image)->encode('png', 100)->save(public_path('images/slider_image/').$imageName);

            $id->image = $imageName;
        }
        

     
        $id->title = $request->name;
        $id->red_text = $request->red_text;
        $id->description = $request->description;
        
        $id->status = $request->status;

        $id->save();

        return redirect()->route('home_slider_show');


        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeSlider $id)
    {
        if(File::exists(public_path('images/slider_image/'.$id->image))){
            File::delete(public_path('images/slider_image/'.$id->image));
        }

        $id->delete();
        return redirect()->route('home_slider_show');

    }
}
