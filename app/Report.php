<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Report extends Model
{
    use Sluggable;

    protected $dates = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'id',
        'date',
        'description',
    ];

    public function doctor() {
        return $this->belongsTo('App\Doctor');
    }

    public function patient() {
        return $this->belongsTo('App\Patient');
    }

}
