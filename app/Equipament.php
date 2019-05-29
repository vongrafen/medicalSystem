<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipament extends Model
{
    protected $fillable = [
        'name','model','serialnumber','active','description','servicestype'   
    ];

    protected $guarded = [
        'id', 'created_at', 'update_at'
    ];

}
