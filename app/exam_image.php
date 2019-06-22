<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class exam_image extends Model
{
    protected $table = 'exam_images';
    protected $fillable = [
       'exam_id',
       'imagem',
       'Data',
   ];
}
