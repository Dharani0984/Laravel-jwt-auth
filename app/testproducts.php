<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class testproducts extends Model
{
    protected $table = 'products';
    protected $fillable = [
    	'name',
    	'sku',
    	'price',
    	'quantity'
    ];
}
