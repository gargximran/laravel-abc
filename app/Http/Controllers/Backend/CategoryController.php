<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{

    
    public function indexParent()
    {
        $parentCategories = Category::where('category_id', 0)->get();
        return view('backend.pages.category.parent.index', compact('parentCategories'));
    }

    public function indexChild(){
        $parentCategories = Category::where('category_id', 0)->get();
        $childCategories = Category::whereNotIn('category_id', [0])->get();
        return view('backend.pages.category.child.index', compact('childCategories', 'parentCategories'));

    }








    public function storeParent(Request $request){
        $request->validate([
            "name" => "required|unique:categories,name"
        ]);

       
   
        $newCategory = new Category();
        $newCategory->name = $request->name;
        $newCategory->slug = Str::slug($request->name);
        if($newCategory->save()){
            Toastr::success('Parent Category Added Successfully.');
            return redirect()->route('parent_category_show');
        }else{
            Toastr::error('Something Wrong!');
            return redirect()->route('parent_category_show');
        }
    }









    public function storeChild(Request $request){
        $request->validate([
            "name" => "required|unique:categories,name",
            "parent_id" => "required"
        ]);

        $category = Category::find($request->parent_id);
   
        $newCategory = new Category();
        
        $newCategory->name = $request->name;
        $newCategory->slug = Str::slug($request->name);
        $newCategory->parent()->associate($category);
        if($newCategory->save()){
            Toastr::success('Child Category Added Successfully.');
            return redirect()->route('child_category_show');
        }else{
            Toastr::error('Something Wrong!');
            return redirect()->route('child_category_show');
        }
    }







    public function updateParent(Request $request, Category $category){
        $request->validate([
            "name" => "required|unique:categories,name,$category->id"
        ]);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        
        if($category->save()){
            Toastr::success('Parent category Edited Successfully.');
            return redirect()->route('parent_category_show');
        }else{
            Toastr::error('Something Wrong!');
            return redirect()->route('parent_category_show');
        }

    }




    public function updateChild(Request $request, Category $category){
        $request->validate([
            "name" => "required|unique:categories,name,$category->id",
            "parent_id" => "required"
        ]);

        $parentCategory = Category::find($request->parent_id);
   
        
        
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->parent()->associate($parentCategory);
        if($category->save()){
            Toastr::success('Child Category Updated Successfully.');
            return redirect()->route('child_category_show');
        }else{
            Toastr::error('Something Wrong!');
            return redirect()->route('child_category_show');
        }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
