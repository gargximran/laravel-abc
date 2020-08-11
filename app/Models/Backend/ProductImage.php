<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
