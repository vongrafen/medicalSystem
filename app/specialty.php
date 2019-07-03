<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class specialty extends Model
{
    //Declaração de arquivos protegidos e não protegidos
    protected $table = 'specialties';
     protected $fillable = [
        'name',
        'description'
    ];
}
