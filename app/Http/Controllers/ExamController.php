<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    protected $Exam;
    public function __construct(Exam $Exam)
    {   
        $this->Exam = $Exam;
        $this->middleware('auth');
    }


    public function index()
    {
        $results = $this->Exam->paginate(20); // whereNotNull('rg')->
        return view('Exam.index', ['results' => $results]);
    }

    
    public function add()
    {
        $results = Exam::all();
        return view('Exam.add', ['results' => $results]);
    }

    public function save(Request $request)
    {
       try{
            $insert = Exam::create($request->all());
            return redirect()
                        ->route('Exam.index')
                        ->with('success', 'cadastrado com sucesso!');
       }catch(Exception $e){
            return redirect()
                        ->route('Exam.add')
                        ->with('error', 'Erro!');

        }
    }

    public function edit ($id)
    {
        $Exam = Exam::find($id);
        if(!$Exam){
            \Session::flash('flash_message', [
                'msg'=>"Não existe cadastro, deseja cadastrar?",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('Exam.add');
        }
        return view('Exam.edit', compact('Exam'));
    }

    public function update(Request $request, $id)
    {
        try{
            Exam::find($id)->update($request->all());
            return redirect()
                        ->route('Exam.index')
                        ->with('success', 'cadastrado com sucesso!');

        }catch(Exeption $e){
            return redirect()
                        ->route('Exam.add')
                        ->with('error', 'Erro!');
        }
    }
         
    public function delete($id)
    {
        $Exam = Exam::find($id);
        
        $Exam->delete();
         \Session::flash('flash_message',[
            'msg'=>"Exame excluido com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('Exam.index')->with('success', 'Excluido com sucesso!');      
        
    }
        
}
