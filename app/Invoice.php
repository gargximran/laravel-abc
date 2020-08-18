<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public function product(){
        return $this->hasMany(ProductSale::class);
    }
}
