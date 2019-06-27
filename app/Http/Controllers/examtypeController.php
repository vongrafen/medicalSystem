<?php

namespace App\Http\Controllers;

use App\examtype;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Requests\examtypeRequests;
use Alert;
class examtypeController extends Controller
{


    protected $examtype;
    
    public function __construct(examtype $examtype)
    {   
        $this->examtype = $examtype;
        $this->middleware('auth');
        
    }

    public function save(examtypeRequests $request)
    {
       
        Examtype::create($request->all());

        alert()->success('', 'Tipo de exame Cadastrado com sucesso')->persistent('OK');

        return redirect()->route('equipament.add');
        // try{
        //     $insert = examtype::create($request->all());
        //     // Verifica se inseriu com sucesso
        //     if ($insert)
        //     return redirect()
        //                 ->back();
                        

        //     // Redireciona de volta com uma mensagem de erro
        //     return redirect()
        //                 ->back()
        //                 ->with('error', 'Falha ao inserir');
        
        // }catch(Exeption $e){
        //     return 'Erro';
        // }
    }

}
