<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class examtype extends Model
{
    protected $table = 'examtypes';
    protected $fillable = [
       'name',
       'description',
       'class'
   ];
}
