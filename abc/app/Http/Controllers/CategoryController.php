<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    public function index(){
    	$categories=Category::all();
    	return view('admin.category.category',['categories'=>$categories]);
    }
    public function storeCategory(Request $request){
    		$file=$request->file('image');
	        $category=new Category();
	        $category->category_name=$request->category_name;
	        $category->slug=$this->createSlug($request->category_name);
	        if($file){
	            $orginalname=$file->getClientOriginalName();
	            $str=str_replace(' ','-', $orginalname);
	            $name=time().'_'.$str;
	            $file->move(public_path('images'), $name);                     
	            $imageUrl =$name;
	            $category->image=$imageUrl; 
	        }    
         
      
       		 $category->save(); 
       		 return back();
        // return response()->json($category);
    }
     public function updateCategory(Request $request){
        $id=$request->id;
         $category=Category::find($id);

        $category->category_name=$request->category_name;
        $category->discount=$request->discount;
        $category->status=$request->status;
      
        $file=$request->file('update_image');
     if($file){
        unlink('public/images/'.$category->image);
                $orginalname=$file->getClientOriginalName();
                $str=str_replace(' ','-', $orginalname);
                $name=time().'_'.$str;
                $file->move(public_path('images'), $name);                     
                $imageUrl =$name;
                $category->image=$imageUrl; 
            }   
         
        // $category->status='active';
        $category->save(); 
        return back();
        // return response()->json($category);
    
    }
     public function deleteCategory($id){
        $category=Category::find($id);      
        $category->delete();
        return back();
        // unlink('public/images/'.$category->image);
        // return response()->json(['done']);        

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
        return Category::select('slug')->where('slug', 'like', $slug.'%')
        ->where('id', '<>', $id)
        ->get();
    }
}
