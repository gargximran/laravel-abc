<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'slug','category_id','regular_price','model','code'];

    public function category(){
        return $this->belongsTo(Category::class);
    }



    public function image(){
        return $this->hasMany(ProductImage::class);
    }


}
