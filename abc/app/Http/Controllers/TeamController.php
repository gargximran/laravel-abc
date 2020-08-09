<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Image;
use File;
use Str;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $allMembers = Team::all();
        return view('admin.team.index', compact('allMembers'));
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
            'image' => "bail|required|image",
            "name" => 'bail|required',
            "role" => 'bail|required',
            "description" => 'bail|required'
       
        ]);

        $newMember =  new Team();
        $newMember->name = $request->name;
        $newMember->role = $request->role;
        $newMember->desctiption = $request->description;
        $newMember->social_fb_link = $request->facebook;
        $newMember->social_tw_link = $request->twitter;
        $newMember->social_in_link = $request->linkedin;
        $newMember->social_mail_link = $request->mail;
        $newMember->social_tm_link = $request->tumblr;
        
        $imageName = Str::random(12).".png";

        Image::make($request->image)->encode('png', 100)->save(public_path('images/team_member/'.$imageName));

        $newMember->image = $imageName;

        $newMember->save()
        ;


        return redirect()->route('team_view');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $id)
    {
        return view('admin.team.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $id)
    {
        $id->name = $request->name;
        $id->role = $request->role;
        $id->desctiption = $request->description;
        $id->social_fb_link = $request->facebook;
        $id->social_tw_link = $request->twitter;
        $id->social_in_link = $request->linkedin;
        $id->social_mail_link = $request->mail;
        $id->social_tm_link = $request->tumblr;
        
        if($request->image){
            if(File::exists(public_path('images/team_member/'.$id->image))){
                File::delete(public_path('images/team_member/'.$id->image));
            }

            $imageName = Str::random(12).".png";

            Image::make($request->image)->encode('png', 100)->save(public_path('images/team_member/'.$imageName));

            $id->image = $imageName;
        }
        

        $id->save();


        return redirect()->route('team_view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $id)
    {
        if(File::exists(public_path('images/team_member/'.$id->image))){
            File::delete(public_path('images/team_member/'.$id->image));
        }

        $id->delete();


        return redirect()->route('team_view');
    }
}
