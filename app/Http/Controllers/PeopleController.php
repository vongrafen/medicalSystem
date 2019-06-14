<?php

namespace App\Http\Controllers;

use App\People;
use App\specialty;
use Illuminate\Http\Request;


class PeopleController extends Controller
{

    protected $peopleModel;
    
    public function __construct(People $peopleModel)
    {   
        $this->peopleModel = $peopleModel;
        $this->middleware('auth');
    }

    protected $specialty;
    
    public function __constructS(specialty $specialty)
    {   
        $this->specialty = $specialty;
        $this->middleware('auth');
    }


    public function index()
    {
        $peoples = $this->peopleModel->paginate(20); // whereNotNull('rg')->
        return view('people.index', ['peoples' => $peoples]);
    }

    public function menu()
    {
        return view('people.menu');
    }

    public function detail($id)
    {
        $people = People::find($id);
        return view('people.detail', compact('people'));
    }

    public function add()
    {
        $results = specialty::all();
        return view('people.add', ['peoples' => $results]);
        //return view('people.add');
    }

    public function save(\App\Http\Requests\PeopleRequest $request)
    {
       
        // Insere uma nova pessoa, de acordo com os dados informados pelo usuário
        $insert = People::create($request->all());

        // Verifica se inseriu com sucesso
        // Redireciona para a listagem das categorias
        // Passa uma session flash success (sessão temporária)
        if ($insert)
        return redirect()
                    ->route('people.index')
                    ->with('success', 'Pessoa cadastrada com sucesso!');

        // Redireciona de volta com uma mensagem de erro
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao inserir');
        }

    public function edit ($id)
    {
        $people = People::find($id);
        if(!$people){
            \Session::flash('flash_message', [
                'msg'=>"Não existe esse pessoa cadastrada, deseja cadastrar nova pessoa?",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('people.add');
        }
        return view('people.edit', compact('people'));
    }

    public function update(Request $request, $id)
    {
        People::find($id)->update($request->all());
        
        \Session::flash('flash_message',[
            'msg'=>"Pessoa atualizada com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('people.index');        
        
    }

    public function delete($id)
    {
        $people = People::find($id);
       

        /*if(!$people->deleteTelephone()){
            \Session::flash('flash_message', [
                'msg'=>"Registro não pode ser deletado",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('people.index');
        }*/
        $people->delete();
         \Session::flash('flash_message',[
            'msg'=>"Pessoa atualizada com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('people.index');        
        
    }
}
