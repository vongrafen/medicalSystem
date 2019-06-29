<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnotic extends Model
{

    protected $table = 'Diagnotics';
    protected $fillable = [
        'exam_id',
        'patients_id',
        'doctor_performer_id',
        'status',
        'diagnostic', 
    ];

}
