<?php

namespace App\Http\Controllers\Backend\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\About\AboutBanner;
use App\Models\Backend\About\AbcInfo;
use App\Models\Backend\About\Client;
use App\Models\Backend\About\Team;
use App\Models\Backend\About\Vision;
use App\Models\Backend\About\Relation;
use App\Models\Backend\About\Industry;

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
        $clients    = Client::orderBy('id', 'asc')->get();
        $teams      = Team::orderBy('id', 'asc')->get();
        $visions    = Vision::orderBy('id', 'asc')->get();
        $relations   = Relation::orderBy('id', 'asc')->get();
        $industries   = Industry::orderBy('id', 'asc')->get();

        return view('backend.pages.about.manage', compact(
            'banners', 'abcinfos', 'clients', 'teams', 'visions', 'relations', 'industries'
        ));
    }

}