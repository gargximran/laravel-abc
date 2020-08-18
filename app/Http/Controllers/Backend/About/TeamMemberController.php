<?php

namespace App\Http\Controllers\Backend\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\About\Team;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class TeamMemberController extends Controller
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
                'name' => 'required',
            
                'designation' => 'required',
            
                'description' => 'required',
            
                'image' => 'required'
            ]
        );

        $team = new Team();

        $team->name             = $request->name;
        $team->designation      = $request->designation;
        $team->description      = $request->description;

        if ($request->image) {
            $image  = $request->file('image');
            $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/team/' . $img);
            Image::make($image)->save($location);
            $team->image = $img;
        }

        $team->save();

        //write success message
        $request->session()->flash('create', ' Team added Successfully');

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
    public function edit(Team $team)
    {
        return view('backend.pages.about.editTeam', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $request->validate(
            [
                'name' => 'required',

                'designation' => 'required',

                'description' => 'required',

            ]
        );

        $team->name             = $request->name;
        $team->designation      = $request->designation;
        $team->description      = $request->description;

        if ($request->image) {
            if (File::exists('images/team/' . $team->image)) {
                File::delete('images/team/' . $team->image);
            }
            $image  = $request->file('image');
            $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/team/' . $img);
            Image::make($image)->save($location);
            $team->image = $img;
        }

        $team->save();

        //write success message
        $request->session()->flash('update', ' Team updated Successfully');

        return redirect()->route('aboutpage.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Team $team)
    {
        if (!is_null($team)) {
            if (File::exists('images/team/' . $team->image)) {
                File::delete('images/team/' . $team->image);
            }
            $team->delete();
        }
        //write success message
        $request->session()->flash('delete', ' Team deleted Successfully');

        return redirect()->route('aboutpage.show');
    }
}
