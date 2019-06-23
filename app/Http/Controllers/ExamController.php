<?php

namespace App\Http\Controllers;

use App\Exam;
use App\People;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB; // para usar o SQL
use Illuminate\Pagination\LengthAwarePaginator;

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
 
        //$results = $this->Exam->paginate(20); // whereNotNull('rg')->
        //return view('Exam.index', ['results' => $results]);

        $sql = "SELECT 
                exams.id,
                paciente.name        as paciente,
                medico.name          as medico,
                DATE_FORMAT(exams.performed_date, '%d/%m/%Y %H:%i:%s') as dataRealizada,
                equipaments.name     as TipoEquipaments,
                exams.status 
                FROM exams
                LEFT JOIN peoples paciente  ON paciente.id = exams.patients_id
                LEFT JOIN peoples medico    ON medico.id = exams.doctor_performer_id
                LEFT JOIN schedules         ON schedules.id = exams.id_schedules_exam
                LEFT JOIN equipaments       ON equipaments.id = schedules.equipament_id";

        
        // Adicionar o PAGINATE Deve usar o use Illuminate\Pagination\LengthAwarePaginator;
        $page = 1;
        $size = 20;
        $data = DB::select($sql);
        $collect = collect($data);
        
        $results = new LengthAwarePaginator(
                                 $collect->forPage($page, $size),
                                 $collect->count(), 
                                 $size, 
                                 $page
                               );

        // Fim do Adicionar o PAGINATE

                            
        return view('Exam.index', ['results' => $results]);




    }

    
    public function add()
    {
        $exam = Exam::all();

        $funcionario = DB::select('SELECT * FROM peoples WHERE peoples.profile = 2');
        $medico = DB::select('SELECT * FROM peoples WHERE peoples.profile = 3');
        $paciente = DB::select('SELECT * FROM peoples WHERE peoples.profile = 4');

        $id_Agenda = DB::select('SELECT * FROM schedules WHERE schedules.patients_id IN (SELECT id FROM peoples WHERE peoples.profile = 4)');
        
        return view('Exam.add', [
            'funcionario' => $funcionario,
            'medico' => $medico,
            'paciente' => $paciente,
            'id_Agenda' => $id_Agenda,
            ]);
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
