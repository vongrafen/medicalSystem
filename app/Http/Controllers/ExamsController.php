<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExamsController extends Controller
{
    public function register(request $request, Exams $exam)
    {

        $create = $exam->create($request->all());
        //$insert = $this->equipament->create($dataform);
        
        if($create)  
            //return 'Inserido com sucesso';
           return redirect()->route('examsList');
        else
            
        return 'não inseriu';
            //return redirect()->route('equipaments@error');
            
    }
}

