<?php

namespace App\Http\Controllers\Backend\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\About\Vision;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class VisionController extends Controller
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
        $visions = Vision::orderBy('id', 'asc')->get();

        if (count($visions) == NULL) {
            $request->validate(
                [
                    'vision' => 'required',

                    'mission' => 'required',

                    'values' => 'required',

                    'image' => 'required'
                ]
            );

            $vision = new Vision();

            $vision->vision     = $request->vision;
            $vision->mission    = $request->mission;
            $vision->value     = $request->value;

            if ($request->image) {
                $image  = $request->file('image');
                $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/vision/' . $img);
                Image::make($image)->save($location);
                $vision->image = $img;
            }
            $vision->save();

            //write success message
            $request->session()->flash('create', ' Vision created Successfully');

            return back();
        } else {
            //write unsuccess message
            $request->session()->flash('createFailed', 'Vision already added');

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
    public function edit(Vision $vision)
    {
        return view('backend.pages.about.editVision', compact('vision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vision $vision)
    {
        $request->validate(
            [
                'vision' => 'required',

                'mission' => 'required',
                'values' => 'required',

                'image' => 'required',
            ]
        );

        $vision->vision     = $request->vision;
        $vision->mission    = $request->mission;
        $vision->value      = $request->value;

        if ($request->image) {
            if (File::exists('images/vision/' . $vision->image)) {
                File::delete('images/vision/' . $vision->image);
            }

            $image  = $request->file('image');
            $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/vision/' . $img);
            Image::make($image)->save($location);
            $vision->image = $img;
        }
        $vision->save();

        //write success message
        $request->session()->flash('update', ' Vision updated Successfully');

        return redirect()->route('aboutpage.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Vision $vision)
    {
        if (!is_null($vision)) {
            if (File::exists('images/vision/' . $vision->image)) {
                File::delete('images/vision/' . $vision->image);
            }
            $vision->delete();
        }
        //write success message
        $request->session()->flash('delete', ' vision deleted Successfully');

        return redirect()->route('aboutpage.show');
    }
}
