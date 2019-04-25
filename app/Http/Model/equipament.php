<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Equipament extends Model
{
    protected $fillable = [
        'name', 'model', 'serialnumber', 'status', 'description', 'servicestype',
    ];
}
