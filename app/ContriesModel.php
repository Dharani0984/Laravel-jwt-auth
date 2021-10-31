<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContriesModel extends Model
{
    protected $table = "contries";
    protected $fillable = [
                            'country_id',
                            'country_name'
                          ];
}
