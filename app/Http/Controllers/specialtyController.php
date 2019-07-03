<?php

namespace App\Http\Controllers;

use App\specialty;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class specialtyController extends Controller
{


    protected $specialty;
    
    public function __construct(specialty $specialty)
    {   
        $this->specialty = $specialty;
        $this->middleware('auth');
    }

    public function index()
    {
        $specialties = $this->specialty->paginate(20); // whereNotNull('rg')->
        return view('specialty.index', ['specialties' => $specialties]);
    }

    public function add()
    {
        $specialties = specialty::all();
        return view('specialty.add', ['specialties' => $specialties]);
    }

    public function save(\App\Http\Requests\specialtyRequests $request)
    {
        $insert = specialty::create($request->all());

        // Verifica se inseriu com sucesso
        if ($insert)
        return redirect()
                ->route('specialty.index')
                ->with('success', 'Especialidade cadastrada com sucesso!');
                    

        // Redireciona de volta com uma mensagem de erro
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao inserir');
    }

    public function edit ($id)
    {
        $specialty = specialty::find($id);
        if(!$specialty){
            \Session::flash('flash_message', [
                'msg'=>"Não existe esse especialidade cadastrada, deseja cadastrar nova especialidade?",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('specialty.add');
        }
        return view('specialty.edit', compact('specialty'));
    }

    public function update(Request $request, $id)
    {
        specialty::find($id)->update($request->all());
        
        return redirect()
                ->route('specialty.index')
                ->with('success', 'Especialidade atualizada com sucesso!');      
        
    }

    public function delete($id)
    {
        $specialty = specialty::find($id);
        
        $specialty->delete();

        return redirect()
                ->route('specialty.index')
                ->with('info', 'Deletado com sucesso!');      
        
    }

}
