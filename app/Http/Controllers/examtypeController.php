<?php

namespace App\Http\Controllers;

use App\examtype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Requests\examtypeRequest;

class examtypeController extends Controller
{


    protected $examtype;
    
    public function __construct(examtype $examtype)
    {   
        $this->examtype = $examtype;
        $this->middleware('auth');
        
    }

    public function save(Request $request)
    {
        $insert = examtype::create($request->all());

        // Verifica se inseriu com sucesso
        if ($insert)
        return redirect()
                    ->route('equipament.add')
                    ->with('success', 'cadastrada com sucesso!');

        // Redireciona de volta com uma mensagem de erro
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao inserir');
        }

}
