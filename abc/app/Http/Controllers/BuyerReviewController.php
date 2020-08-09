<?php

namespace App\Http\Controllers;

use App\BuyerReview;
use Illuminate\Http\Request;

class BuyerReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = BuyerReview::all();
        return view('admin.buyer_review.index', compact('reviews'));
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
            "description" => "bail|required",
            "star" => "bail|required"
        ]);

        $newReview = new BuyerReview();
        $newReview->company_name = $request->name;
        $newReview->description = $request->description;
        $newReview->star = $request->star;
        $newReview->link = $request->link;

        $newReview->save();
        return redirect()->route('review_show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BuyerReview  $buyerReview
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BuyerReview  $buyerReview
     * @return \Illuminate\Http\Response
     */
    public function edit(BuyerReview $id)
    {

        return view('admin.buyer_review.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BuyerReview  $buyerReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BuyerReview $id)
    {
        $request->validate([
            "name" => "bail|required",
            "description" => "bail|required",
            "star" => "bail|required"
        ]);
        $id->company_name = $request->name;
        $id->description = $request->description;
        $id->star = $request->star;
        $id->link = $request->link;

        $id->save();
        return redirect()->route('review_show');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BuyerReview  $buyerReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuyerReview $id)
    {
        $id->delete();
        return redirect()->route('review_show');

   }
}
