<?php

namespace App\Http\Controllers\Backend\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\About\AbcInfo;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class AbcInfoController extends Controller
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
        $abcinfo = AbcInfo::orderBy('id', 'asc')->get();

        if (count($abcinfo) == NULL) {
            $request->validate(
                [
                    'a' => 'required',

                    'b' => 'required',

                    'c' => 'required',

                    'year' => 'required',

                    'image' => 'required'
                ]
            );

            $abcinfo = new AbcInfo();

            $abcinfo->a     = $request->a;
            $abcinfo->b     = $request->b;
            $abcinfo->c     = $request->c;
            $abcinfo->year  = $request->year;

            if ($request->image) {
                $image  = $request->file('image');
                $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/abcinfo/' . $img);
                Image::make($image)->save($location);
                $abcinfo->image = $img;
            }
            $abcinfo->save();

            //write success message
            $request->session()->flash('create', ' Abc information added Successfully');

            return back();
        } else {
            //write unsuccess message
            $request->session()->flash('createFailed', 'Abc information already added');

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
    public function edit(AbcInfo $abcinfo)
    {
        return view('backend.pages.about.editAbcInfo', compact('abcinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AbcInfo $abcinfo)
    {
        $request->validate(
            [
                'a' => 'required',

                'b' => 'required',
                'c' => 'required',

                'year' => 'required',

                'image' => 'required',
            ]
        );

        $abcinfo->a     = $request->a;
        $abcinfo->b     = $request->b;
        $abcinfo->c     = $request->c;
        $abcinfo->year  = $request->year;

        if ($request->image) {
            if (File::exists('images/abcinfo/' . $abcinfo->image)) {
                File::delete('images/abcinfo/' . $abcinfo->image);
            }

            $image  = $request->file('image');
            $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/abcinfo/' . $img);
            Image::make($image)->save($location);
            $abcinfo->image = $img;
        }
        $abcinfo->save();

        //write success message
        $request->session()->flash('update', ' Abc information updated Successfully');

        return redirect()->route('aboutpage.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, AbcInfo $abcinfo)
    {
        if (!is_null($abcinfo)) {
            if (File::exists('images/abcinfo/' . $abcinfo->image)) {
                File::delete('images/abcinfo/' . $abcinfo->image);
            }
            $abcinfo->delete();
        }
        //write success message
        $request->session()->flash('delete', '  Abc information deleted Successfully');
        return redirect()->route('aboutpage.show');
    }
}
