<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipament extends Model
{
    protected $table = 'equipaments';
    protected $fillable = [
        'name',
        'model',
        'serialnumber',
        'active',
        'description',
        'examtype_id',   
    ];

}
