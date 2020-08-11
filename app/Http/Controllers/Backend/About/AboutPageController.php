<?php

namespace App\Http\Controllers\Backend\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\About\AboutBanner;
use App\Models\Backend\About\AbcInfo;
use App\Models\Backend\About\Client;

class AboutPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners    = AboutBanner::orderBy('id', 'asc')->get();
        $abcinfos   = AbcInfo::orderBy('id', 'asc')->get();
        $clients   = Client::orderBy('id', 'asc')->get();
        return view('backend.pages.about.manage', compact(
            'banners', 'abcinfos', 'clients'
        ));
    }

}
