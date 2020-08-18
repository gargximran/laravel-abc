<?php

namespace App;

use App\Models\Backend\Product;
use Illuminate\Database\Eloquent\Model;

class ProductSale extends Model
{
    public function Invoice(){
        return $this->belongsTo(Invoice::class);
    }


    public function Product(){
        return $this->belongsTo(Product::class);
    }
}