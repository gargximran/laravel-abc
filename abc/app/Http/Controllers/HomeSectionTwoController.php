<?php

namespace App\Http\Controllers;

use App\HomeSectionTwo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HomeSectionTwoController extends Controller
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
            "title_for_card_one" => 'bail|required',
            "subtitle_for_card_one" => 'bail|required',
            "title_for_card_two" => 'bail|required',
            "subtitle_for_card_two" => 'bail|required',
            "title_for_card_three" => 'bail|required',
            "subtitle_for_card_three" => 'bail|required',
            "title_for_card_four" => 'bail|required',
            "subtitle_for_card_four" => 'bail|required'
        ]);

        $section = HomeSectionTwo::first();
        $section->first_card_title = $request->title_for_card_one;
        $section->first_card_subtitle = $request->subtitle_for_card_one;
        $section->second_card_title = $request->title_for_card_two;
        $section->second_card_subtitle = $request->subtitle_for_card_two;
        $section->third_card_title = $request->title_for_card_three;
        $section->third_card_subtitle = $request->subtitle_for_card_three;
        $section->forth_card_title = $request->title_for_card_four;
        $section->forth_card_subtitle = $request->subtitle_for_card_four;

        // if have to change first image 
        if($request->image_for_card_one){
            if(File::exists(public_path('images/website/'.$section->first_card_image))){
                File::delete(public_path('images/website/'.$section->first_card_image));
            }

            $image1Name = Str::random().uniqid().'.png';
            Image::make($request->image_for_card_one)->encode('png', 100)->save(public_path('images/website/'.$image1Name));

            $section->first_card_image = $image1Name;
        }

        //if have to change 2nd image
        if($request->image_for_card_two){
            if(File::exists(public_path('images/website/'.$section->second_card_image))){
                File::delete(public_path('images/website/'.$section->second_card_image));
            }

            $image2Name = Str::random().uniqid().'.png';
            Image::make($request->image_for_card_two)->encode('png', 100)->save(public_path('images/website/'.$image2Name));

            $section->second_card_image = $image2Name;
        }

        //if have to change 3rd image
        if($request->image_for_card_three){
            if(File::exists(public_path('images/website/'.$section->third_card_image))){
                File::delete(public_path('images/website/'.$section->third_card_image));
            }

            $image3Name = Str::random().uniqid().'.png';
            Image::make($request->image_for_card_three)->encode('png', 100)->save(public_path('images/website/'.$image3Name));

            $section->third_card_image = $image3Name;
        }


        if($section->save()){
            return redirect()->route('admin.main');
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomeSectionTwo  $homeSectionTwo
     * @return \Illuminate\Http\Response
     */
    public function show(HomeSectionTwo $homeSectionTwo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeSectionTwo  $homeSectionTwo
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeSectionTwo $homeSectionTwo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeSectionTwo  $homeSectionTwo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeSectionTwo $homeSectionTwo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeSectionTwo  $homeSectionTwo
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeSectionTwo $homeSectionTwo)
    {
        //
    }
}
