<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;

class Barbers extends Model
{
    protected $table = "barbers_list";

    protected $fillable = [

        'name',
        'phone',
        'email',
        'address',
        'photo',
        'status'
    ];

}
