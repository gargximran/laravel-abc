<?php

namespace App\Http\Controllers\Backend\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Contact\Map;

class MapController extends Controller
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
        $maps = Map::orderBy('id','asc')->get();

        if( count($maps) == NULL ){ 
            $request->validate(
                [
                    'link' => 'required'
                ],
            );

            $map = new Map();

            $map->link = $request->link;
            $map->save();

            //write success message
            $request->session()->flash('create', ' Map added Successfully');  

            return back();
        }
        else{
            //write unsuccess message
            $request->session()->flash('createFailed', 'Map already added');  

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
    public function edit(Map $map)
    {
        return view('backend.pages.contact.editMap', compact('map'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Map $map)
    {
        if( !is_null($map) ){
            $request->validate(
                [
                    'link' => 'required'
                ],
            );

            $map->link = $request->link;
            $map->save();

            //write success message
            $request->session()->flash('update', ' Map updated Successfully');  

            return redirect()->route('contactpage.show');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Map $map)
    {
        if( !is_null($map) ){
            $map->delete();

            //write success message
            $request->session()->flash('delete', ' Map deleted Successfully');  

            return redirect()->route('contactpage.show');
        }
    }
}
