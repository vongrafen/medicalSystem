<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class People extends Model
{

    protected $table = 'peoples';
     protected $fillable = [
        'name',
        'birthdate',
        'genre',
        'cpf',
        'rg',
        'address',
        'number',
        'district',
        'complement',
        'cep',
        'telephone',
        'email',
        'obs',
        'profile',
        'crm',
        'office',
        'sector',
        'city',
        'specialty_id'
    ];

    /*public function telephone(){
        return $this->hasMany('App\Telefone');
    }

    public function addTelephone(Telephone $tel){
        return $this->telephone()->save($tel);
    }

    public function deleteTelephone()
    {
        foreach($this->telephone as $tel){
            $tel->delete();
        }
        return true;
    }*/
}
