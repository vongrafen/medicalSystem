<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $fillable = [
        'name', 'email', 'address', 'birthdate', 'genre', 'cpf', 'rg', 'number', 'district', 'complement', 'telephone', 'obs',
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
