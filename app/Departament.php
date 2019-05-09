<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    protected $fillable = [
        'name', 'local', 'cost_center'
    ];

    protected $guarded = [
        'id', 'created_at', 'update_at'
    ];
}
