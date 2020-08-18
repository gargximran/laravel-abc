<?php

namespace App\Http\Controllers\Frontend;

use App\Cart;
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
use App\Models\Backend\Product;
use App\Models\Backend\Contact\Map;
use App\Models\Backend\Contact\ContactInfo;
use App\Models\Backend\Contact\ContactStuff;
use App\MOdels\Backend\Gallery\Gallery;

class FrontendController extends Controller
{
    //index page show
    public function index(){
        $homebanners = HomeBanner::orderBy('id','asc')->get();
        $homedisplays = HomeDisplay::orderBy('id','asc')->get();
        $testimonials = Testimonial::orderBy('id','asc')->get();
        $contactinfos = ContactInfo::orderBy('id','asc')->get();
        $exclusiveProducts = Product::where('status' ,1)->where('exclusive', 1)->where('quantity', '!=', 0)->get();
        return view('frontend.pages.index',compact(
            'homebanners', 'testimonials', 'homedisplays','exclusiveProducts', 'contactinfos'
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
        $products = Product::orderBy('id', 'desc')->where('quantity',"!=", 0)->where('status', 1)->paginate(20);
   
        
        return view('frontend.pages.shop', compact('products'));
    }

    //contact page show
    public function contact(){
        $maps = Map::orderBy('id', 'asc')->get();
        $contactinfos = ContactInfo::orderBy('id','asc')->get();
        $contactstuffs = ContactStuff::orderBy('id','asc')->get();
        return view('frontend.pages.contact', compact(
            'maps', 'contactinfos', 'contactstuffs'
        ));
    }

    //gallery page show
    public function gallery(){
        $gallerys = Gallery::orderBy('id', 'desc')->get();
        return view('frontend.pages.gallery', compact('gallerys'));
    }


    // search option
    public function search(Request $request){

        $searchQuery = $request->search;
        $products = Product::orWhere('name',"LIKE", "%$request->search%")->orWhere('model',"LIKE", "%$request->search%")->orWhere('regular_price',"LIKE", "%$request->search%")->orWhere('offer_price',"LIKE", "%$request->search%")->orWhere('brand',"LIKE", "%$request->search%")->where('quantity', '!=', 0)->where('status', 1)->paginate(20);
        return view('frontend.pages.search', compact('products',"searchQuery"));

    }



    public function checkout(Request $request){

        $total = 0;


        $carts = Cart::where('ip', $request->ip())->get();


        foreach($carts as $cart){
            $total += $cart->price * $cart->quantity;
        }
        return view('frontend.pages.checkout', compact('carts','total'));
    }



    public function singeProduct(Product $product){
        return view('frontend.pages.productDetails', compact('product'));
    }
}
