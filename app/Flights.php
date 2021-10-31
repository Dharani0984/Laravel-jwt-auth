<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flights extends Model
{
 protected $table = 'flights';
 protected $fillable = [
 	'sno',
 	'name',
 	'email'
 ];
}
