<?php

namespace App\Http\Controllers;

use App\examtype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class examtypeController extends Controller
{


    protected $examtype;
    
    public function __construct(examtype $examtype)
    {   
        $this->examtype = $examtype;
        $this->middleware('auth');
    }

    public function save(\App\Http\Requests\examtypeRequests $request)
    {
        $insert = examtype::create($request->all());

        // Verifica se inseriu com sucesso
        if ($insert)
        return redirect()
                    ->back()
                    ->with('success', 'Especialidade cadastrada com sucesso!');

        // Redireciona de volta com uma mensagem de erro
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao inserir');
        }

}
