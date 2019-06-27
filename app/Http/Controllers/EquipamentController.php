<?php

namespace App\Http\Controllers;

use App\Equipament;
use App\examtype;
use Illuminate\Http\Request;
use App\Requests\EquipamentRequest;
use App\Requests\examtypeRequest;
use Alert;
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

    // Função Responsavel por trazer todos os equipamentos cadastrados
    public function index()
    {
        $TipoExame = examtype::all();
        $equipaments = $this->equipamentModel->paginate(20); // whereNotNull('rg')->
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
    // Função Responsavel por trazer a tela de cadastro de equipamentos
    public function add()
    {
        $results = examtype::all();
        return view('equipament.add', ['results' => $results]);
    }
    // Função Responsavel por salvar um novo equipamento no banco
    public function save(\App\Requests\EquipamentRequest $request)
    {
        
        Equipament::create($request->all());
        alert()->success('', 'Equipamento Cadastrado com sucesso')->persistent('OK');
        return redirect()->route('equipament.add');
    }
    // Função Responsavel por trazer a tela de edição de equipamentos
    public function edit ($id)
    {
        $equipament = Equipament::find($id);
        $results = examtype::all();
        if(!$equipament){
            \Session::flash('flash_message', [
                'msg'=>"Não existe esse equipamento cadastrado, deseja cadastrar um novo equipamento?",
                'class'=>"alert-danger"
            ]);
            return redirect()->back();
        }
        return view('equipament.edit', ['equipament' => $equipament,'results' => $results]);
        
    }
    // Função Responsavel por salvar a edição de um equipamento
    public function update(Request $request, $id)
    {
        
        Equipament::find($id)->update($request->all());

        alert()->success('', 'Equipamento Atualizado com sucesso');

        return redirect()->route('equipament.index');        
        
    }
    // Função Responsavel pela exclusão de um equipamento
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

        Alert::info('Muito bem', 'Deletado com sucesso');

        return redirect()->route('equipament.index');        
        
    }
}
