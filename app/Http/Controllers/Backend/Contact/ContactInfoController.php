<?php

namespace App\Http\Controllers\Backend\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Contact\ContactInfo;

class ContactInfoController extends Controller
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
        $contactinfos = ContactInfo::orderBy('id','asc')->get();

        if( count($contactinfos) == NULL ){ 
            $request->validate(
                [
                    'address' => 'required'
                ],
                [
                    'headoffice' => 'required'
                ],
                [
                    'phone' => 'required'
                ],
                [
                    'email' => 'required'
                ],
            );

            $contactinfo = new ContactInfo();

            $contactinfo->address       = $request->address;
            $contactinfo->headoffice    = $request->headoffice;
            $contactinfo->phone         = $request->phone;
            $contactinfo->email         = $request->email;
            $contactinfo->save();

            //write success message
            $request->session()->flash('create', ' Contact Information added Successfully');  

            return back();
        }
        else{
            //write unsuccess message
            $request->session()->flash('createFailed', 'Contact Information already added');  

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
    public function edit(ContactInfo $contactinfo)
    {
        return view('backend.pages.contact.editContactInfo', compact('contactinfo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactInfo $contactinfo)
    {
        $request->validate(
            [
                'address' => 'required'
            ],
            [
                'headoffice' => 'required'
            ],
            [
                'phone' => 'required'
            ],
            [
                'email' => 'required'
            ],
        );

        $contactinfo->address       = $request->address;
        $contactinfo->headoffice    = $request->headoffice;
        $contactinfo->phone         = $request->phone;
        $contactinfo->email         = $request->email;
        $contactinfo->save();

        //write success message
        $request->session()->flash('update', ' Contact Information updated Successfully');  

        return redirect()->route('contactpage.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ContactInfo $contactinfo)
    {
        if( !is_null($contactinfo) ){
            $contactinfo->delete();
        }
        //write success message
        $request->session()->flash('delete', ' Contact Information deleted Successfully');  

        return redirect()->route('contactpage.show');
    }
}
