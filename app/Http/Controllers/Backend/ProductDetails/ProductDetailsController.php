<?php

namespace App\Http\Controllers\Backend\ProductDetails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\ProductDetails\ProductDetail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ProductDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productdetails = ProductDetail::orderBy('id','desc')->get();
        return view('backend.pages.productdetail.manage', compact('productdetails'));
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
        $productdetails = ProductDetail::orderBy('id', 'asc')->get();

        if (count($productdetails) == NULL) {
            $request->validate(
            [
                'image' => 'required'
            ]);
            
            $productdetail = new ProductDetail();

            
            if( $request->image ){
                $image = $request->file('image');
                $img = rand(0,10) .'.'. $image->getClientOriginalExtension();
                $location = public_path('images/banner/' . $img);
                Image::make($image)->save($location);
                $productdetail->image = $img;
            }
            $productdetail->save();

            //write success message
            $request->session()->flash('message', ' Product details banner added Successfully');

            return back();
        }
        else {
            //write unsuccess message
            $request->session()->flash('createFailed', 'Product details banner already added');

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
    public function update(Request $request, ProductDetail $productdetails)
    {
        

            
        if( $request->image ){
            if (File::exists('images/banner/' . $productdetails->image)) {
                File::delete('images/banner/' . $productdetails->image);
            }
            $image = $request->file('image');
            $img = rand(0,10) .'.'. $image->getClientOriginalExtension();
            $location = public_path('images/banner/' . $img);
            Image::make($image)->save($location);
            $productdetails->image = $img;
        }
        $productdetails->save();

        //write success message
        $request->session()->flash('update', ' Product details banner updated Successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ProductDetail $productdetails)
    {
        if( !is_null($productdetails) ){
            if (File::exists('images/banner/' . $productdetails->image)) {
                File::delete('images/banner/' . $productdetails->image);
            }
            $productdetails->delete();
        }
        //write success message
        $request->session()->flash('delete', ' Product details banner deleted Successfully');

        return redirect()->route('productdetails.show');
    }
}
