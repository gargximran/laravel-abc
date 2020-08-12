<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Logo;
use App\Models\Backend\Home\HomeBanner;
use App\Models\Backend\Home\HomeDisplay;
use App\Models\Backend\Home\Testimonial;
use App\Models\Backend\About\AboutBanner;
use App\Models\Backend\About\AbcInfo;
use App\Models\Backend\About\Client;
use App\Models\Backend\About\Team;
use App\Models\Backend\About\Vision;
use App\Models\Backend\About\Relation;
use App\Models\Backend\About\Industry;

class FrontendController extends Controller
{
    //index page show
    public function index(){
        $homebanners = HomeBanner::orderBy('id','asc')->get();
        $homedisplays = HomeDisplay::orderBy('id','asc')->get();
        $testimonials = Testimonial::orderBy('id','asc')->get();
        return view('frontend.pages.index',compact(
            'homebanners', 'testimonials', 'homedisplays'
        ));
    }

    //about page show
    public function about(){
        $banners    = AboutBanner::orderBy('id', 'asc')->get();
        $abcinfos   = AbcInfo::orderBy('id', 'asc')->get();
        $clients    = Client::orderBy('id', 'asc')->get();
        $teams      = Team::orderBy('id', 'asc')->get();
        $visions    = Vision::orderBy('id', 'asc')->get();
        $relations   = Relation::orderBy('id', 'asc')->get();
        $industries   = Industry::orderBy('id', 'asc')->get();
        return view('frontend.pages.about',compact(
            'banners', 'abcinfos', 'clients', 'teams', 'visions', 'relations', 'industries'
        ));
    }

    //shop page show
    public function shop(){
        return view('frontend.pages.shop');
    }

    //contact page show
    public function contact(){
        return view('frontend.pages.contact');
    }

    //gallery page show
    public function gallery(){
        return view('frontend.pages.gallery');
    }
}
