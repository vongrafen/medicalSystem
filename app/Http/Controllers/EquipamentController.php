<?php

namespace App\Http\Controllers;


use App\Requests\EquipamentRequest;
use App\Http\Model\Equipament;

class EquipamentController extends Controller
{  
    /**
    * Criar um insert no banco de dados. 
    */
    public function register(EquipamentRequest $request, Equipament $equipament)
    {

        $create = $equipament->create($request->all());
        //$insert = $this->equipament->create($dataform);
        
        if($create)  
            //return 'Inserido com sucesso';
            return redirect()->route('equipamentslist');
        else
            //return 'não inseriu';
            return redirect()->route('equipaments@error');
            
    }

}
