<?php


namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class exams extends Model
{
    protected $fillable = [
        'name', 'model', 'serialnumber', 'status', 'description', 'servicestype',
    ];
}
