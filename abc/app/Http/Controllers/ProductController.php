<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;
class ProductController extends Controller
{
    public function index(){
    	$categories=Category::where('status','active')->get();
    	return view('admin.product.product',['categories'=>$categories]);
    }
    public function addProduct(Request $request){
    		// $file=$request->file('images[]');

    		$images = $request->file('file');
		    $images_one = $request->file('file_one');
            $images_two = $request->file('files_two');
    		$product=new Product;
    		$product->title=$request->title;
    		$product->slug=$this->createSlug($request->title);
    		$product->cat_slug=$request->cat_slug;
    		$product->sub_cat_slug=$request->sub_cat_slug;
    		$product->price=$request->price;
    		$product->sell_price=$request->discountPrice;
    		$product->discount=$request->discount;
            $product->qty=$request->qty;
    		$product->short_description=$request->short_description;
    		$product->long_description=$request->long_description;
    		$product->status=$request->status;
    		if($images){
	            $orginalname=$images->getClientOriginalName();
	            $str=str_replace(' ','-', $orginalname);
	            $name=time().'_'.$str;
	            $images->move(public_path('images'), $name);                     
	            $imageUrl =$name;
	            $product->images=$imageUrl;

	        }
            if($images_one){
                $orginalname_one=$images_one->getClientOriginalName();
                $str_one=str_replace(' ','-', $orginalname_one);
                $name_one=time().'_'.$str_one;
                $images_one->move(public_path('images'), $name_one);                     
                $imageUrl_one =$name_one;
                $product->images_one=$imageUrl_one;

            }
            if($images_two){
                $orginalname_two=$images_two->getClientOriginalName();
                $str_two=str_replace(' ','-', $orginalname_two);
                $name_two=time().'_'.$str;
                $images_two->move(public_path('images'), $name_two);                     
                $imageUrl_two =$name_two;
                $product->images_two=$imageUrl_two;

            }
	        $product->save();
	        return back();
    }
    public function updateProduct(Request $request){

            $images = $request->file('file');
            $images_one = $request->file('file_one');
            $images_two = $request->file('files_two');
            $product=Product::find($request->product_id);
 
            $product->title=$request->title;
            // $product->slug=$this->createSlug($request->title);
            $product->cat_slug=$request->cat_slug;
            $product->sub_cat_slug=$request->sub_cat_slug;
            $product->price=$request->price;
            $product->sell_price=$request->discountPrice;
            $product->discount=$request->discount;
            $product->qty=$request->qty;
            $product->short_description=$request->short_description;
            $product->long_description=$request->long_description;
            $product->status=$request->status;
       if($images){
        unlink('public/images/'.$product->$images);
                $orginalname=$images->getClientOriginalName();
                $str=str_replace(' ','-', $orginalname);
                $name=time().'_'.$str;
                $images->move(public_path('images'), $name);                     
                $imageUrl =$name;
                $product->images=$imageUrl;

            }
            if($images_one){
                $orginalname_one=$images_one->getClientOriginalName();
                $str_one=str_replace(' ','-', $orginalname_one);
                $name_one=time().'_'.$str_one;
                $images_one->move(public_path('images'), $name_one);                     
                $imageUrl_one =$name_one;
                $product->images_one=$imageUrl_one;

            }
            if($images_two){
                $orginalname_two=$images_two->getClientOriginalName();
                $str_two=str_replace(' ','-', $orginalname_two);
                $name_two=time().'_'.$str;
                $images_two->move(public_path('images'), $name_two);                     
                $imageUrl_two =$name_two;
                $product->images_two=$imageUrl_two;

            }
            $product->save();
            return redirect('/admin/product/all');
    }
    public function productlist(){
    	$allproduct=DB::table('products')
    	// ->join('categories', 'products.cat_slug', '=', 'categories.slug')
     //    ->join('subcategories', 'products.sub_cat_slug', '=', 'subcategories.slug')                
        ->select('products.*')
        ->get();
    	return view('admin.product.product_list',['products'=>$allproduct]);
    }
      public function stocklist(){
     //    $allproduct=DB::table('products')
     //    // ->join('categories', 'products.cat_slug', '=', 'categories.slug')
     // //    ->join('subcategories', 'products.sub_cat_slug', '=', 'subcategories.slug')                
     //    ->select('products.*')
     //    ->get();
         $stockProduct=DB::table('products') 
            
        ->select('products.*',DB::raw("(SELECT SUM(orderdetails.productQuantity) FROM orderdetails
        WHERE orderdetails.productId = products.id
        GROUP BY orderdetails.productId) as sell_qty"))
        ->orderby('sell_qty')
        ->get();
        return view('admin.product.stockProduct',['stockProduct'=>$stockProduct]);
    }
    public function viewProduct($slug){
        $singelViewProduct=Product::where('slug',$slug)->first();
        return view('admin.product.viewProduct',['singelViewProduct'=>$singelViewProduct]);
    }
    public function editProduct($id){
        $product=Product::with('productsubcategories')->where('id',$id)->first();
       $categories=Category::where('status','active')->get();
        return view('admin.product.editProduct',['product'=>$product,'categories'=>$categories]);
    }
    public function subcategory($slug){
    	$sub_cat_id=DB::table("subcategories")->where("cat_slug",$slug)->pluck("sub_name","slug");;
        return json_encode($sub_cat_id);
    }

    public function createSlug($title, $id = 0)
    {
        $slug = preg_replace('/\s+/u', '-', trim($title));
        $allSlugs = $this->getRelatedSlugs($slug, $id);
        if (! $allSlugs->contains('slug', $slug)){
            return $slug;
        }

        $i = 1;
        $is_contain = true;
        do {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                $is_contain = false;
                return $newSlug;
            }
            $i++;
        } while ($is_contain);
    }
    protected function getRelatedSlugs($slug, $id = 0)
    {
        return Product::select('slug')->where('slug', 'like', $slug.'%')
        ->where('id', '<>', $id)
        ->get();
    }
}

