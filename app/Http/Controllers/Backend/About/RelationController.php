<?php

namespace App\Http\Controllers\Backend\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use App\Models\Backend\About\Relation;

class RelationController extends Controller
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
        $relations = Relation::orderBy('id','asc')->get();

        if( count($relations) == NULL ){ 
            $request->validate(
                [
                    'comments' => 'required'
                ],
                [
                    'image' => 'required'
                ]
            );

            $relation = new Relation();

            $relation->comments = $request->comments;

            if( $request->image ){
                $image  = $request->file('image');
                $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/relation/' . $img);
                Image::make($image)->save($location);
                $relation->image = $img;
            }
            $relation->save();

            //write success message
            $request->session()->flash('create', ' Relation added Successfully');  

            return back();
        }
        else{
            //write unsuccess message
            $request->session()->flash('createFailed', 'Relation already added');  

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
    public function edit(Relation $relation)
    {
        return view('backend.pages.about.editRelation', compact('relation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Relation $relation)
    {
        $request->validate(
            [
                'comments' => 'required'
            ],
            [
                'image' => 'required'
            ]
        );

        $relation->comments = $request->comments;

        if( $request->image ){
            if( File::exists('images/relation/' . $relation->image) ){
                File::delete('images/relation/' . $relation->image);
            }
            $image  = $request->file('image');
            $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/relation/' . $img);
            Image::make($image)->save($location);
            $relation->image = $img;
        }
        $relation->save();

        //write success message
        $request->session()->flash('update', ' Relation updated Successfully');  

        return redirect()->route('aboutpage.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Relation $relation)
    {
        if( !is_null($relation) ){
            if( File::exists('images/relation/' . $relation->image) ){
                File::delete('images/relation/' . $relation->image);
            }
            $relation->delete();
        }
        //write success message
        $request->session()->flash('delete', ' Relation deleted Successfully');  

        return redirect()->route('aboutpage.show');
    }
}