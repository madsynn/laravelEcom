<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceProduct extends Model
{
    protected $table = "price_product";

    protected $fillable = ['price_id' , 'product_id'];




}
