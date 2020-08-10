<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Fav;
use Illuminate\Support\Str;
use Image; 
use File;

class FavController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favs = Fav::orderBy('id','asc')->get();
        return view('backend.pages.fav.manage', compact('favs'));
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
        $favs = fav::orderBy('id','asc')->get();

        if( count($favs) == NULL ){ 
            $request->validate(
                [
                    'name' => 'required'
                ],
                [
                    'image' => 'required'
                ]
            );

            $fav = new fav();

            $fav->name = $request->name;
            $fav->slug = Str::slug($request->name);

            if( $request->image ){
                $image  = $request->file('image');
                $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/fav/' . $img);
                Image::make($image)->save($location);
                $fav->image = $img;
            }
            $fav->save();

            //write success message
            $request->session()->flash('message', ' fav icon added Successfully');  

            return back();
        }
        else{
            //write unsuccess message
            $request->session()->flash('createFailed', 'fav icon already added');  

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
    public function edit(Fav $fav)
    {
        return view('backend.pages.fav.edit', compact('fav'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fav $fav)
    {
        $request->validate(
            [
                'name' => 'required'
            ],
            [
                'image' => 'required'
            ]
        );

        $fav->name = $request->name;
        $fav->slug = Str::slug($request->name);

        if( $request->image ){
            if( File::exists('images/fav/' . $fav->image) ){
                File::delete('images/fav/' . $fav->image);
            }

            $image  = $request->file('image');
            $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/fav/' . $img);
            Image::make($image)->save($location);
            $fav->image = $img;
        }
        $fav->save();

        //write success message
        $request->session()->flash('update', ' fav icon updated Successfully'); 
        return redirect()->route('fav');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Fav $fav)
    {
        if( !is_null($fav) ){
            if( File::exists('images/fav/' . $fav->image) ){
                File::delete('images/fav/' . $fav->image);
            }
            $fav->delete();
        }
        //write success message
        $request->session()->flash('delete', '  fav deleted Successfully'); 
        return redirect()->route('fav');
    }
}
