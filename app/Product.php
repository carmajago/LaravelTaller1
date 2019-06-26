<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'iva',
    'quantity_available',          
    'min_amount', 'max_amount','image'
   ];

}
