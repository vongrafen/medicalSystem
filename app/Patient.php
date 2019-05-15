<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Patient extends Model
{

    protected $dates = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'name',
        'id',
        'cpf',
        'endereco',
    ];

    public function reports() {
        return $this->belongsTo('App\Report');
    }

}
