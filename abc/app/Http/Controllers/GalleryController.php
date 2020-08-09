<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Image;
use Str;
use File;


class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleryItems = Gallery::all();
    
        return view('admin.gallery.index', compact('galleryItems'));
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
            'image' => "bail|required|image|mimes:jpg,png,jpeg,svg",
            'caption' =>"bail|required",
            'status' => 'bail|required'
        ],[
            'image.required' => 'Required',
            'image.image' => 'Only Image file allow',
            'image.mimes' => 'Format: jpg, png, jpeg, svg'
        ]);
        $ImageName = Str::random(12).'.png';

    

        $image = Image::make($request->image);
        $image->encode('png', 100);
        
        $image->save(public_path('images\\gallery\\'.$ImageName));

        $gallery = new Gallery();
        $gallery->image = $ImageName;
        $gallery->caption = $request->caption;
        $gallery->status = $request->status;
         
        $gallery->save();
        return redirect()->route('gallary_view');

        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $gallery)
    {
        $gallery = Gallery::find($gallery->id);
        return view('admin.gallery.edit', compact('gallery'));
        
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'caption' => 'bail|required',
            'status' => 'bail|required'
        ],[
            'caption.required' => 'Required',
            'status.required' => 'Required'
        ]);


            $gallery = Gallery::find($id);
        if($request->image){
            if(File::exists(public_path('images\\gallery\\'.$gallery->image))){
                File::delete(public_path('images\\gallery\\'.$gallery->image));
            }
            $ImageName = Str::random(12).'.png';
            $image = Image::make($request->image);
            $image->encode('png', 100);
            
            $image->save(public_path('images\\gallery\\'.$ImageName));

            $gallery->image = $ImageName;
            $gallery->caption = $request->caption;
            $gallery->status = $request->status;
            $gallery->save();
            return redirect()->route('gallary_view');
        }else{
            $gallery->caption = $request->caption;
            $gallery->status = $request->status;
            $gallery->save();
            return redirect()->route('gallary_view');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $id)
    {

        if(File::exists(public_path('images\\gallery\\'.$id->image))){
            File::delete(public_path('images\\gallery\\'.$id->image));
        }
        $id->delete();

        return redirect()->route('gallary_view');
    }
}
