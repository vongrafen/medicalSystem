<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{

    protected $dates = [
        'created_at',
        'updated_at'
    ];
    protected $fillable = [
        'name',
        'id',
        'cpf',
        'crm',
        'endereco',
    ];

    public function reports() {
        return $this->hasMany('App\Report');
    }

}
