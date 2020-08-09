<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcategory;
use App\Category;
class SubcategoryController extends Controller
{
    public function index(){
       $categories=Category::all();
       $subcategories=Subcategory::all();
       return view('admin.category.subcategory',['categories'=>$categories,'subcategories'=>$subcategories]);
   }
   public function storesubcategory(Request $request){
           $file=$request->file('sub_image');
           $subcategory=new Subcategory();
           $subcategory->sub_name=$request->sub_name;
           $subcategory->cat_slug=$request->cat_slug;
           $subcategory->slug=$this->createSlug($request->sub_name);
           if($file){
               $orginalname=$file->getClientOriginalName();
               $str=str_replace(' ','-', $orginalname);
               $name=time().'_'.$str;
               $file->move(public_path('images'), $name);                     
               $imageUrl =$name;
               $subcategory->image=$imageUrl; 
           }    
        
     
               $subcategory->save(); 
               return back();
       // return response()->json($category);
   }
    public function updatesubcategory(Request $request){
        $id=$request->id;
        $subcategory=Subcategory::find($id);

        $subcategory->sub_name=$request->update_sub_name;
        $subcategory->cat_slug=$request->update_cat_slug;
        $file=$request->file('update_sub_image');
       if($file){
               $orginalname=$file->getClientOriginalName();
               $str=str_replace(' ','-', $orginalname);
               $name=time().'_'.$str;
               $file->move(public_path('images'), $name);                     
               $imageUrl =$name;
               $subcategory->image=$imageUrl; 
           }  
        $subcategory->discount=$request->subdicount;
        $subcategory->status=$request->status;
       // $category->status='active';
       $subcategory->save(); 
       return back();
       // return response()->json($category);
   
   }
    public function deletesubcategory($id){
       $subcategory=Subcategory::find($id);      
       $subcategory->delete();
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
       return Subcategory::select('slug')->where('slug', 'like', $slug.'%')
       ->where('id', '<>', $id)
       ->get();
   }
}
