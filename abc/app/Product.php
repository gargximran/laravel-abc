<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function productsubcategories(){
        return $this->belongsTo(Subcategory::class,'sub_cat_slug','slug');
     }
}
