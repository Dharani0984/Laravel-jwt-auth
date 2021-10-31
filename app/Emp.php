<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Emp extends Model
{
    protected $table = "emp";
    protected $fillable = [
    	'name',
    	'email',
    	'phone',
    	'address'
    ];
}
