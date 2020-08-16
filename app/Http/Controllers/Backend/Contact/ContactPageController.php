<?php

namespace App\Http\Controllers\Backend\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Contact\Map;
use App\Models\Backend\Contact\ContactInfo;
use App\Models\Backend\Contact\ContactStuff;

class ContactPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maps = Map::orderBy('id', 'asc')->get();
        $contactinfos = ContactInfo::orderBy('id','asc')->get();
        $contactstuffs = ContactStuff::orderBy('id','asc')->get();
        return view('backend.pages.contact.manage', compact(
            'maps', 'contactinfos', 'contactstuffs'
        ));
    }


}