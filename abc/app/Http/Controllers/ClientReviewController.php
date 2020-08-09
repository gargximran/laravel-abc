<?php

namespace App\Http\Controllers;

use App\ClientReview;
use Illuminate\Http\Request;
use Image;
use File;
use Str;
class ClientReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientReviews = ClientReview::all();
        return view('admin.client_review.index', compact('clientReviews'));
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
            "name" => "bail|required",          
            "review" => "required",

        ]);


        $newReview = new ClientReview();
        $newReview->name = $request->name;
        $newReview->review = $request->review;
        $newReview->company_name = $request->company_name;
        $newReview->position = $request->position;


        if($request->image){
            $imageName = Str::random(14).'.png';
            Image::make($request->image)->encode('png', 100)->save(public_path('images/client_image/'.$imageName));
            $newReview->image = $imageName;
        }
        $newReview->position = $request->position;

        $newReview->save();

        return redirect()->route('client_review');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClientReview  $clientReview
     * @return \Illuminate\Http\Response
     */
    public function show(ClientReview $clientReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClientReview  $clientReview
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientReview $id)
    {
        return view('admin.client_review.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClientReview  $clientReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClientReview $id)
    {
        $request->validate([
            "name" => "bail|required",          
            "review" => "required",

        ]);

     
        $id->name = $request->name;
        $id->review = $request->review;
        $id->company_name = $request->company_name;
        $id->position = $request->position;


        if($request->image){
            if(File::exists(public_path('images\\client_image\\'.$id->image))){
                File::delete(public_path('images\\client_image\\'.$id->image));
            }
            $imageName = Str::random(14).'.png';
            Image::make($request->image)->encode('png', 100)->save(public_path('images/client_image/'.$imageName));
            $id->image = $imageName;
        }
        $id->position = $request->position;

        $id->save();

        return redirect()->route('client_review');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClientReview  $clientReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientReview $id)
    {
        if(File::exists(public_path('images\\client_image\\'.$id->image))){
            File::delete(public_path('images\\client_image\\'.$id->image));
        }
        $id->delete();

        return redirect()->route('client_review');
    }
}
