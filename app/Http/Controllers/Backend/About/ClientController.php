<?php

namespace App\Http\Controllers\Backend\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Backend\About\Client;

class ClientController extends Controller
{

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
                'cName' => 'required'
            ],
            [
                'comments' => 'required'
            ],
        );

        $client = new Client();

        $client->cName       = $request->cName;
        $client->comments    = $request->comments;
        $client->link        = $request->link;
        $client->save();

        //write success message
        $request->session()->flash('create', ' Client added Successfully');  

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
    public function edit(Client $client)
    {
        return view('backend.pages.about.editClient', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate(
            [
                'cName' => 'required'
            ],
            [
                'comments' => 'required'
            ],
        );

        $client->cName       = $request->cName;
        $client->comments    = $request->comments;
        $client->link        = $request->link;
        $client->save();

        //write success message
        $request->session()->flash('update', ' Client updated Successfully');  

        return redirect()->route('aboutpage.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Client $client)
    {
        if( !is_null($client) ){
            $client->delete();
        };
        //write success message
        $request->session()->flash('delete', ' Client deleted Successfully');  

        return redirect()->route('aboutpage.show');
    }
}