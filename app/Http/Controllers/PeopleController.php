<?php

namespace App\Http\Controllers;

use Session;
use App\People;
use App\specialty;
use App\User;
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

    public function __constructU(user $user)
    {   
        $this->user = $user;
        $this->middleware('auth');
    }


    public function index()
    {
        $peoples = $this->peopleModel->paginate(20); // whereNotNull('rg')->
        return view('people.index', ['peoples' => $peoples]);
    }

    public function indexMedicos()
    {
        $peoples = $this->peopleModel->where('profile','=','3')->paginate(20);
        return view('people.index', ['peoples' => $peoples]);
    }
    
    public function indexPacientes()
    {
        $peoples = $this->peopleModel->where('profile','=','4')->paginate(20);
        return view('people.index', ['peoples' => $peoples]);
    }

    public function indexFuncionarios()
    {
        $peoples = $this->peopleModel->where('profile','=','2')->paginate(20);
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
        return view('people.add', ['results' => $results]);
    }


    public function save(\App\Http\Requests\PeopleRequest $request)
    {
        $insert = 0;
       try{
            $insert = People::create($request->all());

       }catch(Exception $e){
           echo('Erro!');
    }finally{
        $tipopessoa = $request->get('profile');
        if ($insert){    // Verifica se inseriu com sucesso
            if($tipopessoa == 3){
                return redirect()
                        ->route('people.indexMedicos')
                        ->with('success', 'cadastrado com sucesso!');
            }
            if($tipopessoa == 2){
                return redirect()
                        ->route('people.indexFuncionarios')
                        ->with('success', 'cadastrado com sucesso!');
            }
            if($tipopessoa == 4){
                return redirect()
                        ->route('people.indexPacientes')
                        ->with('success', 'cadastrado com sucesso!');
            }else
            return redirect()
                        ->route('people.index')
                        ->with('success', 'cadastrado com sucesso!');
        }
   return redirect()
                ->route('people.add')
                ->with('success', 'cadastrado com sucesso!');
    }
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
        Session::flash('message', 'Olá');
        People::find($id)->update($request->all());
        
        return redirect()->route('people.index');        
        
    }

    public function delete($id)
    {
        $people = People::find($id);
        
        $people->delete();
         \Session::flash('flash_message',[
            'msg'=>"Pessoa atualizada com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('people.index')->with('success', 'cadastrada com sucesso!');      
        
    }
}
