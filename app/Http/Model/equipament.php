<?php

namespace App\Http\Model;

use Illuminate\Database\Model;

class equipament extends Model
{
       /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Name', 'Model', 'Serialnumber', 'Status', 'Description', 'Servicestype',
    ];

    

}
