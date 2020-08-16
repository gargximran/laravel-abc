<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        //
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
    public function edit(User $user)
    {
        return view('backend.pages.profile.editProfile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate(
            [
                'name' => 'required'
            ],
            [
                'email' => 'required'
            ]
        );

        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->phone        = $request->phone;
        $user->address      = $request->address;

        if( $request->image ){
            if( File::exists('images/profile/' . $user->image) ){
                File::delete('images/profile/' . $user->image);
            }
            $image  = $request->file('image');
            $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/profile/' . $img);
            Image::make($image)->save($location);
            $user->image = $img;
        }
        $user->save();

        //write success message
        $request->session()->flash('update', ' Profile updated Successfully');  

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $request->validate(
            [
                'password' => 'required',
            ]
        );

        if(Hash::check($request->password, $user->password) ){
            if( File::exists('images/profile/'. $user->image ) ){
                File::delete('images/profile/'. $user->image ) ;
            }
            $user->delete();
            return redirect()->route('register')->with('deleteSuccess', 'Account deleted Successfully. register new admin from here');
        }
        else{
            $request->session()->flash('deleteFailed', 'Please enter correct password to delete your account');
            return back();
        }

    }



    /**
     * update password route
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request, User $user)
    {
        $request->validate(
            [
                'oldpassword' => 'required',
            ],
            [
                'newpassword' => 'required',
            ],
            [
                'cnewpassword' => 'required',
			]        
		);


        if(Hash::check($request->oldpassword, $user->password) ){

            if( $request->newpassword == $request->cnewpassword ){
                $user->password         = Hash::make($request->cnewpassword);
                $user->save();
                $request->session()->flash('passupdatesuccess', 'Password updated');
                return back();
                exit();
            }
            else{
                $request->session()->flash('updatePassNotMatch', 'New Password and confirm new password are not matched');
                return back();
                exit();
            }

        }
        else{
            $request->session()->flash('oldpassnotmatch', 'Old password not matched please try again');
            return back();
        }


    }
}