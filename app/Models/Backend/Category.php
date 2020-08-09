<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;


    protected $fillable = ['name', 'category_id'];

    public function parent(){
        return $this->belongsTo(Category::class);
    }

    public function child(){
        return $this->hasMany(Category::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
    
}
