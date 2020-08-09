<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //index page show
    public function index(){
        return view('frontend.pages.index');
    }

    //about page show
    public function about(){
        return view('frontend.pages.about');
    }

    //shop page show
    public function shop(){
        return view('frontend.pages.shop');
    }
}
