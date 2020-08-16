<?php

namespace App\Http\Controllers\Backend\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Contact\ContactStuff;
use Illuminate\Support\Facades\File; 
use Intervention\Image\Facades\Image; 

class ContactStuffController extends Controller
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
        $contactstuffs = ContactStuff::orderBy('id','asc')->get();

        if( count($contactstuffs) == NULL ){ 

            $contactstuff = new ContactStuff();

            $contactstuff->nameOne          = $request->nameOne;
            $contactstuff->designationOne   = $request->designationOne;
            $contactstuff->phoneOne         = $request->phoneOne;
            $contactstuff->emailOne         = $request->emailOne;

            if( $request->imageOne ){
                $image  = $request->file('imageOne');
                $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/contactstuff/' . $img);
                Image::make($image)->save($location);
                $contactstuff->imageOne = $img;
            }

            $contactstuff->nameTwo          = $request->nameTwo;
            $contactstuff->designationTwo   = $request->designationTwo;
            $contactstuff->phoneTwo         = $request->phoneTwo;
            $contactstuff->emailTwo         = $request->emailTwo;

            if( $request->imageTwo ){
                $image  = $request->file('imageTwo');
                $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/contactstuff/' . $img);
                Image::make($image)->save($location);
                $contactstuff->imageTwo = $img;
            }

            $contactstuff->save();

            //write success message
            $request->session()->flash('create', ' Contact Stuff Information added Successfully');  

            return back();
        }
        else{
            //write unsuccess message
            $request->session()->flash('createFailed', 'Contact Stuff Information already added');  

            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactStuff $contactstuff)
    {
        return view('backend.pages.contact.editContactStuff', compact('contactstuff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactStuff $contactstuff)
    {

        $contactstuff->nameOne          = $request->nameOne;
        $contactstuff->designationOne   = $request->designationOne;
        $contactstuff->phoneOne         = $request->phoneOne;
        $contactstuff->emailOne         = $request->emailOne;

        if( $request->imageOne ){
            if( File::exists('images/contactstuff/' . $contactstuff->imageOne) ){
                File::delete('images/contactstuff/' . $contactstuff->imageOne);
            }
            $image  = $request->file('imageOne');
            $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/contactstuff/' . $img);
            Image::make($image)->save($location);
            $contactstuff->imageOne = $img;
        }

        $contactstuff->nameTwo          = $request->nameTwo;
        $contactstuff->designationTwo   = $request->designationTwo;
        $contactstuff->phoneTwo         = $request->phoneTwo;
        $contactstuff->emailTwo         = $request->emailTwo;

        if( $request->imageTwo ){
            if( File::exists('images/contactstuff/' . $contactstuff->imageTwo) ){
                File::delete('images/contactstuff/' . $contactstuff->imageTwo);
            }
            $image  = $request->file('imageTwo');
            $img    = rand(0,100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/contactstuff/' . $img);
            Image::make($image)->save($location);
            $contactstuff->imageTwo = $img;
        }

        $contactstuff->save();

        //write success message
        $request->session()->flash('update', ' Contact Stuff Information updated Successfully');  

        return redirect()->route('contactpage.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,ContactStuff $contactstuff)
    {
        if( !is_null($contactstuff) ){
            if( File::exists('images/contactstuff/' . $contactstuff->imageOne) ){
                File::delete('images/contactstuff/' . $contactstuff->imageOne);
            }
            if( File::exists('images/contactstuff/' . $contactstuff->imageTwo) ){
                File::delete('images/contactstuff/' . $contactstuff->imageTwo);
            }
            $contactstuff->delete();
        }
        //write success message
        $request->session()->flash('delete', ' Contact Stuff Information deleted Successfully');  

        return redirect()->route('contactpage.show');
    }
}
