<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class specialty extends Model
{
    
    protected $table = 'specialties';
     protected $fillable = [
        'name',
        'description'
    ];
}
