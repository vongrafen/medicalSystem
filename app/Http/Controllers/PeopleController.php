<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\People;
>>>>>>> master
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
<<<<<<< HEAD
        //$people = \App\Http\Model\People::paginate(5);
        return view('people.index');
=======
        $peoples = People::paginate(5);
        return view('people.index', ['peoples' => $peoples]);
>>>>>>> master
    }

    public function detail($id)
    {
<<<<<<< HEAD
        $people = \App\Http\Model\People::find($id);
=======
        $people = People::find($id);
>>>>>>> master
        return view('people.detail', compact('people'));
    }

    public function add()
    {
        return view('people.add');
    }

    public function save(\App\Http\Requests\PeopleRequest $request)
    {
<<<<<<< HEAD
        \App\Http\Model\People::create($request->all());
=======
        People::create($request->all());
>>>>>>> master
        \Session::flash('flash_message', [
            'msg'=>"Pessoa adicionada com sucesso",
            'class'=>"alert-success"
        ]);
        return redirect()->route('people.add');
    }

    public function edit ($id)
    {
<<<<<<< HEAD
        $people = \App\Http\Model\People::find($id);
=======
        $people = People::find($id);
>>>>>>> master
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
<<<<<<< HEAD
        \App\Http\Model\People::find($id)->update($request->all());
=======
        People::find($id)->update($request->all());
>>>>>>> master
        
        \Session::flash('flash_message',[
            'msg'=>"Pessoa atualizada com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('people.index');        
        
    }

    public function delete($id)
    {
<<<<<<< HEAD
        $people = \App\Http\Model\People::find($id);
       

        if(!$people->deleteTelephone()){
=======
        $people = People::find($id);
       

        /*if(!$people->deleteTelephone()){
>>>>>>> master
            \Session::flash('flash_message', [
                'msg'=>"Registro não pode ser deletado",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('people.index');
<<<<<<< HEAD
        }
=======
        }*/
>>>>>>> master
        $people->delete();
         \Session::flash('flash_message',[
            'msg'=>"Pessoa atualizada com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('people.index');        
        
    }
<<<<<<< HEAD



=======
>>>>>>> master
}
