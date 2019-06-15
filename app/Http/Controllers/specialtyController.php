<?php

namespace App\Http\Controllers;

use App\specialty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class specialtyController extends Controller
{


    protected $specialty;
    
    public function __construct(specialty $specialty)
    {   
        $this->specialty = $specialty;
        $this->middleware('auth');
    }

    public function popula()
    {
        
        $ReturnSpecialialty = specialty::find($name); // whereNotNull('rg')->
        return view('people.add');
        //return view('people.add', ['peoples' => $ReturnSpecialialty]);
    }



    public function save(\App\Http\Requests\specialtyRequests $request)
    {
        $insert = specialty::create($request->all());

        // Verifica se inseriu com sucesso
        if ($insert)
        return redirect()
                    ->route('people.add')
                    ->with('success', 'Especialidade cadastrada com sucesso!');

        // Redireciona de volta com uma mensagem de erro
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao inserir');
        }

}
