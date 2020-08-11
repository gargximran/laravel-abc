<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Home\HomeDisplay;
use Image;
use File;
use Illuminate\Support\Str;

class HomeDisplayController extends Controller
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
        
        $homedisplay = HomeDisplay::orderBy('id','asc')->get();
        if( count($homedisplay) == NULL ){
            $request->validate(
                [
                    'titleOne' => 'required'
                ],
                [
                    'descriptionOne' => 'required'
                ],
                [
                    'imageOne' => 'required'
                ],
                [
                    'titleTwo' => 'required'
                ],
                [
                    'descriptionTwo' => 'required'
                ],
                [
                    'imageTwo' => 'required'
                ],
                [
                    'titleThree' => 'required'
                ],
                [
                    'descriptionThree' => 'required'
                ],
                [
                    'imageThree' => 'required'
                ],
                [
                    'title' => 'required'
                ],
                [
                    'description' => 'required'
                ]
            );
            $homedisplay = new HomeDisplay();

            //display one
            $homedisplay->titleOne = $request->titleOne;
            $homedisplay->descriptionOne = $request->descriptionOne;
            if( $request->imageOne ){
                $image  = $request->file('imageOne');
                $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/homedisplay/' . $img);
                Image::make($image)->save($location);
                $homedisplay->imageOne = $img;
            }

            //display two
            $homedisplay->titleTwo = $request->titleTwo;
            $homedisplay->descriptionTwo = $request->descriptionTwo;
            if( $request->imageTwo ){
                $image  = $request->file('imageTwo');
                $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/homedisplay/' . $img);
                Image::make($image)->save($location);
                $homedisplay->imageTwo = $img;
            }

            //display three
            $homedisplay->titleThree = $request->titleThree;
            $homedisplay->descriptionThree = $request->descriptionThree;
            if( $request->imageThree ){
                $image  = $request->file('imageThree');
                $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/homedisplay/' . $img);
                Image::make($image)->save($location);
                $homedisplay->imageThree = $img;
            }

            //right item
            $homedisplay->title = $request->title;
            $homedisplay->slug = Str::slug($request->title);
            $homedisplay->description = $request->description;
            if( $request->image ){
                $image  = $request->file('image');
                $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/homedisplay/' . $img);
                Image::make($image)->save($location);
                $homedisplay->image = $img;
            }
            $homedisplay->save();

            //write success message
            $request->session()->flash('message', ' Display added Successfully');  

            return back();
        }
        else{
            //write unsuccess message
            $request->session()->flash('createFailed', 'homedisplay already added');  

            return back();
        }
           
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
    public function edit(HomeDisplay $homedisplay)
    {
        return view('backend.pages.home.editHomeDisplay', compact('homedisplay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeDisplay $homedisplay)
    {
        $request->validate(
            [
                'titleOne' => 'required'
            ],
            [
                'descriptionOne' => 'required'
            ],
            [
                'imageOne' => 'required'
            ],
            [
                'titleTwo' => 'required'
            ],
            [
                'descriptionTwo' => 'required'
            ],
            [
                'imageTwo' => 'required'
            ],
            [
                'titleThree' => 'required'
            ],
            [
                'descriptionThree' => 'required'
            ],
            [
                'imageThree' => 'required'
            ],
            [
                'title' => 'required'
            ],
            [
                'description' => 'required'
            ]
        );

        //display one
        $homedisplay->titleOne = $request->titleOne;
        $homedisplay->descriptionOne = $request->descriptionOne;
        if( $request->imageOne ){
            if( File::exists('images/homedisplay/' . $homedisplay->imageOne) ){
                File::delete('images/homedisplay/' . $homedisplay->imageOne);
            }

            $image  = $request->file('imageOne');
            $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/homedisplay/' . $img);
            Image::make($image)->save($location);
            $homedisplay->imageOne = $img;
        }

        //display two
        $homedisplay->titleTwo = $request->titleTwo;
        $homedisplay->descriptionTwo = $request->descriptionTwo;
        if( $request->imageTwo ){
            if( File::exists('images/homedisplay/' . $homedisplay->imageTwo) ){
                File::delete('images/homedisplay/' . $homedisplay->imageTwo);
            }
            $image  = $request->file('imageTwo');
            $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/homedisplay/' . $img);
            Image::make($image)->save($location);
            $homedisplay->imageTwo = $img;
        }

        //display three
        $homedisplay->titleThree = $request->titleThree;
        $homedisplay->descriptionThree = $request->descriptionThree;
        if( $request->imageThree ){
            if( File::exists('images/homedisplay/' . $homedisplay->imageThree) ){
                File::delete('images/homedisplay/' . $homedisplay->imageThree);
            }
            $image  = $request->file('imageThree');
            $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/homedisplay/' . $img);
            Image::make($image)->save($location);
            $homedisplay->imageThree = $img;
        }

        //right item
        $homedisplay->title = $request->title;
        $homedisplay->slug = Str::slug($request->title);
        $homedisplay->description = $request->description;
        if( $request->image ){
            if( File::exists('images/homedisplay/' . $homedisplay->image) ){
                File::delete('images/homedisplay/' . $homedisplay->image);
            }
            $image  = $request->file('image');
            $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/homedisplay/' . $img);
            Image::make($image)->save($location);
            $homedisplay->image = $img;
        }
        $homedisplay->save();

        //write success message
        $request->session()->flash('message', ' Display updated Successfully');  

        return redirect()->route('homepage.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, HomeDisplay $homedisplay)
    {
        if( !is_null($homedisplay) ){
            if( File::exists('images/homedisplay/' . $homedisplay->imageOne) ){
                File::delete('images/homedisplay/' . $homedisplay->imageOne);
            }
            if( File::exists('images/homedisplay/' . $homedisplay->imageTwo) ){
                File::delete('images/homedisplay/' . $homedisplay->imageTwo);
            }
            if( File::exists('images/homedisplay/' . $homedisplay->imageThree) ){
                File::delete('images/homedisplay/' . $homedisplay->imageThree);
            }
            if( File::exists('images/homedisplay/' . $homedisplay->image) ){
                File::delete('images/homedisplay/' . $homedisplay->image);
            }
            $homedisplay->delete();
        }
        //write success message
        $request->session()->flash('delete', '  Home Display deleted Successfully'); 
        return redirect()->route('homepage.show');
    }
}
