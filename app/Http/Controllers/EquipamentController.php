<?php

namespace App\Http\Controllers;

use App\Equipament;
use App\examtype;
use Illuminate\Http\Request;
use App\Requests\EquipamentRequest;
use App\Requests\examtypeRequest;

class EquipamentController extends Controller
{
    protected $equipamentModel;

    public function __construct(Equipament $equipamentModel)
    {   
        $this->equipamentModel = $equipamentModel;
        $this->middleware('auth');
    }
    public function __constructE(examtype $examtype)
    {   
        $this->examtype = $examtype;
        $this->middleware('auth');
    }


    public function index()
    {
        $TipoExame = examtype::all();
        $equipaments = $this->equipamentModel->paginate(20); // whereNotNull('rg')->
        //dd($TipoExame);
        return view('equipament.index', ['equipaments' => $equipaments, 'TipoExame' => $TipoExame]);
    }

    public function menu()
    {
        return view('equipament.menu');
    }

    public function detail($id)
    {
        $equipament = Equipament::find($id);
        return view('equipament.detail', compact('equipament'));
    }

    public function add()
    {
        $results = examtype::all();
        //dd($results);
        return view('equipament.add', ['results' => $results]);
    }

    public function save(\App\Requests\EquipamentRequest $request)
    {
        
        Equipament::create($request->all());
        \Session::flash('flash_message', [
            'msg'=>"Equipamento adicionado com sucesso",
            'class'=>"alert-success"
        ]);
        return redirect()->route('equipament.add');
    }

    public function edit ($id)
    {
        $equipament = Equipament::find($id);
        $results = examtype::all();
        if(!$equipament){
            \Session::flash('flash_message', [
                'msg'=>"Não existe esse equipamento cadastrado, deseja cadastrar um novo equipamento?",
                'class'=>"alert-danger"
            ]);
            //return redirect()->route('equipament.add');
            return redirect()->back();
        }
        //return view('equipament.edit', compact('equipament'));
        return view('equipament.edit', ['equipament' => $equipament,'results' => $results]);
        
    }

    public function update(Request $request, $id)
    {
        
        Equipament::find($id)->update($request->all());
        
        \Session::flash('flash_message',[
            'msg'=>"Equipamento atualizada com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('equipament.index');        
        
    }

    public function delete($id)
    {
        $equipament = Equipament::find($id);
       

        /*if(!$equipament->deleteTelephone()){
            \Session::flash('flash_message', [
                'msg'=>"Registro não pode ser deletado",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('equipament.index');
        }*/
        $equipament->delete();
         \Session::flash('flash_message',[
            'msg'=>"Equipamento atualizado com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('equipament.index');        
        
    }
}
