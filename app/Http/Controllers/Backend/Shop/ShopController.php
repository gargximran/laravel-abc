<?php

namespace App\Http\Controllers\Backend\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Shop\Shop;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopbanners = Shop::orderBy('id', 'asc')->get();
        return view('backend.pages.shop.manage', compact('shopbanners'));
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
        $shops = Shop::orderBy('id', 'asc')->get();

        if (count($shops) == NULL) {
            $request->validate(
            [
                'title' => 'required',
                'image' => 'required'
            ]);

            $shopbanner = new Shop();

            $shopbanner->title = $request->title;

            if( $request->image ){
                $image = $request->file('image');
                $img = rand(0,10) .'.'. $image->getClientOriginalExtension();
                $location = public_path('images/banner/' . $img);
                Image::make($image)->save($location);
                $shopbanner->image = $img;
            }
            $shopbanner->save();

            //write success message
            $request->session()->flash('message', ' Shop banner added Successfully');

            return back();
        }
        else {
            //write unsuccess message
            $request->session()->flash('createFailed', 'Shop banner already added');

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shopbanner)
    {
        $request->validate(
            [
                'title' => 'required',
            ]);

            $shopbanner->title = $request->title;

            if( $request->image ){
                if (File::exists('images/banner/' . $shopbanner->image)) {
                    File::delete('images/banner/' . $shopbanner->image);
                }
                $image = $request->file('image');
                $img = rand(0,10) .'.'. $image->getClientOriginalExtension();
                $location = public_path('images/banner/' . $img);
                Image::make($image)->save($location);
                $shopbanner->image = $img;
            }
            $shopbanner->save();

            //write success message
            $request->session()->flash('update', ' Shop banner updated Successfully');

            return redirect()->route('shopbanner.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Shop $shopbanner)
    {
        if( !is_null($shopbanner) ){
            if (File::exists('images/banner/' . $shopbanner->image)) {
                File::delete('images/banner/' . $shopbanner->image);
            }
            $shopbanner->delete();
            //write success message
            $request->session()->flash('delete', ' Shop banner deleted Successfully');

            return redirect()->route('shopbanner.show');
        }
    }
}