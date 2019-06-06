<?php

namespace App\Http\Controllers;

use App\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{

    protected $peopleModel;
    
    public function __construct(People $peopleModel)
    {   
        $this->peopleModel = $peopleModel;
        $this->middleware('auth');
    }


    public function index()
    {
        $peoples = $this->peopleModel->paginate(5); // whereNotNull('rg')->
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
        return view('people.add');
    }

    public function save(\App\Http\Requests\PeopleRequest $request)
    {
        People::create($request->all());
        \Session::flash('flash_message', [
            'msg'=>"Pessoa adicionada com sucesso",
            'class'=>"alert-success"
        ]);
        return redirect()->route('people.add');
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
