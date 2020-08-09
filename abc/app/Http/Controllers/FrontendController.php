<?php

namespace App\Http\Controllers;

use App\BusinessUnit;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\ClientReview;
use App\Gallery;
use App\HomeSlider;
use App\Subcategory;
use App\Team;


class FrontendController extends Controller
{
    public function index(){
        $clientReviews = ClientReview::all();
        $sliders = HomeSlider::where('status', 1)->get();
        return view('frontend.main.mainContent',compact('sliders', 'clientReviews'));
    }
    public function allproduct(){
        $allproduct=Product::where('status','active')->paginate(16);
        $categories=Category::where('status','active')->get();
        return view('frontend.shop.shop',['allproduct'=>$allproduct,'categories'=>$categories]);
    }
    public function singleproduct($slug){
         $lastedproducts=Product::where('status','active')->orderby('id','DESC')->limit(4)->get();
        $singleProduct=Product::where('slug',$slug)->first();
       
        return view('frontend.shop.singleproduct',['singleProduct'=>$singleProduct,'lastedproducts'=>$lastedproducts]);
    }
    public function categoryProduct($slug){
        $categoryProduct=Product::where('cat_slug',$slug)->paginate(16);
        $categories=Category::where('status','active')->get();
        return view('frontend.shop.categoryproduct',['categoryProduct'=>$categoryProduct,'categories'=>$categories]);
    }
    public function cus_login(){
        return view('frontend.customer.login_register');
    }
    public function about_us(){
        $allTeamMember = Team::all();
        $buyerReviews = BusinessUnit::all();
        return view('frontend.abc.about_us', compact('allTeamMember', 'buyerReviews'));
    }
    public function gallery(){

        $galaryContent = Gallery::where('status', 1)->get();
        $count = floor(Gallery::count() / 3) ;
        return view('frontend.gallery', compact('galaryContent', 'count'));
    }
    public function contact(){
        return view('frontend.contact');
    }
}
