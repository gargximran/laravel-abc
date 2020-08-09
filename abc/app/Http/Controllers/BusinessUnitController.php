<?php

namespace App\Http\Controllers;

use App\BusinessUnit;
use Illuminate\Http\Request;

class BusinessUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business_units = BusinessUnit::all();
        return view('admin.business_unit.index', compact('business_units'));
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

        $newReview = new BusinessUnit();
        $newReview->company_name = $request->name;
        $newReview->description = $request->description;
        $newReview->star = $request->star;
        $newReview->link = $request->link;

        $newReview->save();
        return redirect()->route('business_unit_show');
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
    public function edit(BusinessUnit $id)
    {

        return view('admin.business_unit.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BuyerReview  $buyerReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,BusinessUnit $id)
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
        return redirect()->route('business_unit_show');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BuyerReview  $buyerReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessUnit $id)
    {
        $id->delete();
        return redirect()->route('business_unit_show');

   }
}
