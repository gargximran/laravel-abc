<?php

namespace App\Http\Controllers\Backend\Gallery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Models\Backend\Gallery\Gallery;

class GalleryController extends Controller
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
                'caption' => 'required'
            ],
            [
                'image' => 'required'
            ]
        );

        $gallery = new Gallery();

        $gallery->caption = $request->caption;

        if( $request->image ){
            $image = $request->file('image');
            $img = rand(0,1000) .'.'. $image->getClientOriginalExtension();
            $location = public_path('images/gallery/'. $img);
            Image::make($image)->save($location);
            $gallery->image = $img;
        }
        $gallery->save();

        //success message
        $request->session()->flash('create', 'Gallery added successfully');
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
    public function edit(Gallery $gallery)
    {
        return view('backend.pages.gallery.editGallery', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate(
            [
                'caption' => 'required'
            ],
            [
                'image' => 'required'
            ]
        );

        $gallery->caption = $request->caption;

        if( $request->image ){
            if( File::exists('images/gallery/' . $gallery->image) ){
                File::delete('images/gallery/' . $gallery->image );
            }
            $image = $request->file('image');
            $img = rand(0,1000) .'.'. $image->getClientOriginalExtension();
            $location = public_path('images/gallery/'. $img);
            Image::make($image)->save($location);
            $gallery->image = $img;
        }
        $gallery->save();

        //success message
        $request->session()->flash('update', 'Gallery updated successfully');
        return redirect()->route('gallerypage.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Gallery $gallery)
    {
        if( !is_null($gallery) ){
            if( File::exists('images/gallery/' . $gallery->image) ){
                File::delete('images/gallery/' . $gallery->image );
            }
            $gallery->delete();
        }
        //success message
        $request->session()->flash('delete', 'Gallery deleted successfully');
        return redirect()->route('gallerypage.show');
    }
}