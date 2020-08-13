<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Product;
use App\Models\Backend\ProductImage;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('backend.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('category_id', 0)->get();
        return view('backend.pages.product.add', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            "name" =>"required|unique:products,name",
            "category" =>"required",
            "model" => "required|unique:products,model",
            "size" => "required",
            "regular_price" => "required",
            "quantity" => "required",
            "status" => "required",
            "exclusive" => "required",
            "image_1" => 'required|image',
            "image_2" => 'required|image',
            "image_3" => 'required|image'

        ]);
        

        $imageArray = [$request->image_1,$request->image_2,$request->image_3];

        $serialVal = Product::orderBy('id', 'desc')->select('id')->first();
        
        $val = $serialVal ? number_format($serialVal->id) + 1 : 1;

        $category = Category::find($request->category);

        $product = new Product();
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->category()->associate($category);
        $product->brand = $request->brand;
        $product->regular_price = $request->regular_price;
        $product->offer_price = $request->offer_price ? $request->offer_price : 0;
        $product->model = $request->model;
        $product->size = $request->size;
        $product->code = "abc-".Str::lower(Str::random(3)).$val;
        $product->status = $request->status;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->exclusive = $request->exclusive;

            
        if($product->save()){
            foreach($imageArray as $image){

                $imageName = Str::random(12).uniqid().'.png';
                $productImage = new ProductImage();
                Image::make($image)->encode('png', 100)->save(public_path('images/product/'."$imageName"));
                $productImage->name = $imageName;
                $productImage->product()->associate($product);
                $productImage->save();

            }


            Toastr::success('Product added successfully!');
            return redirect()->route('product_show_backend');
        }else{
            Toastr::error('Something Wrong!');
            return redirect()->route('product_show_backend');
        }

        


        
        
        
        





    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('backend.pages.product.view', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::where('category_id', 0)->get();
        return view('backend.pages.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([
            "name" =>"required|unique:products,name,$product->id",
            "category" =>"required",
            "model" => "required|unique:products,model,$product->id",
            "size" => "required",
            "regular_price" => "required",
            "quantity" => "required",
            "status" => "required",
            "exclusive" => "required",

        ]);



        // image upload section
        $imageArray = [$request->image_1,$request->image_2,$request->image_3];
        
        foreach($imageArray as $key => $image){
            if(!is_null($image)){

                
                if(File::exists(public_path("images/product/".$product->image[$key]->name))){
                    File::delete(public_path("images/product/".$product->image[$key]->name));
                }

                $imageName = Str::random(12).uniqid().'.png';
                Image::make($image)->encode('png', 100)->save(public_path('images/product/'."$imageName"));

                $productImage = ProductImage::find($product->image[$key]->id);
                $productImage->name = $imageName;
                $productImage->save();


            }
        }

        //product detail update
        $category = Category::find($request->category);

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->category()->associate($category);
        $product->brand = $request->brand;
        $product->regular_price = $request->regular_price;
        $product->offer_price = $request->offer_price ? $request->offer_price : 0;
        $product->model = $request->model;
        $product->size = $request->size;
        $product->status = $request->status;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->exclusive = $request->exclusive;

        if($product->save()){
            Toastr::success('Product update successfully!');
            return redirect()->route('product_show_backend');
        }else{
            Toastr::error('Something went Wrong!');
            return redirect()->route('product_show_backend');
        }






    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        
        $product->delete(); 

        Toastr::warning('Product Delete Successfully!');
        return redirect()->route('product_show_backend');

    }
}
