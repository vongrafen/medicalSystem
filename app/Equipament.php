<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipament extends Model
{
    protected $fillable = [
        'patrimony','name','so','arquiteture','pc_brand','pc_model','service_tag','partnumber',
        'proc_brand','proc','proc_hz','memory','memory_ddr','memory_frequency','qtd_slots','memory_slots','disk','disk_type','user','active',    
    ];

    protected $guarded = [
        'id', 'created_at', 'update_at'
    ];

}
