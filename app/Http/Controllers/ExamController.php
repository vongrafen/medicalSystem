<?php

namespace App\Http\Controllers;

use App\Exam;
use Alert;
use App\People;
use App\exam_image;
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


    public function indexPaciente()
    {
        $userAtual= auth()->user()->people_id;

        $sql = "SELECT 
                exams.id,
                DATE_FORMAT(schedules.start_date, '%d/%m/%Y %H:%i:%s') as Data_Agendada,
                medico.name          as medico,
                DATE_FORMAT(exams.performed_date, '%d/%m/%Y %H:%i:%s') as Data_Realizada,
                examtypes.name     as Tipo_Exame,
                exams.status 
                FROM exams
                LEFT JOIN peoples paciente  ON paciente.id = exams.patients_id
                LEFT JOIN peoples medico    ON medico.id = exams.doctor_performer_id
                LEFT JOIN schedules         ON schedules.id = exams.id_schedules_exam
                LEFT JOIN equipaments       ON equipaments.id = schedules.equipament_id
                LEFT JOIN examtypes			ON examtypes.id = equipaments.examtype_id
                WHERE paciente.id = $userAtual";

        // Adicionar o PAGINATE Deve usar o use Illuminate\Pagination\LengthAwarePaginator;
        $page = 1;
        $size = 20;
        $data = DB::select($sql);
        $collect = collect($data);
        $results = new LengthAwarePaginator( $collect->forPage($page, $size), $collect->count(),$size,  $page);
        // Fim do Adicionar o PAGINATE      

        return view('paciente', ['results' => $results]);
    }

    
    public function add()
    {
        $exam = Exam::all();
        $paciente = DB::select('SELECT * FROM peoples WHERE peoples.profile = 4');
        $funcionario = DB::select('SELECT * FROM peoples WHERE peoples.profile = 2');
        $medico = DB::select('SELECT * FROM peoples WHERE peoples.profile = 3');
        
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
        

        $paciente = DB::select("SELECT * FROM peoples
        LEFT JOIN exams ON exams.patients_id = peoples.id
        WHERE exams.id = $Exam->id ");


        if($Exam->employee_id == null){
            $funcionario = DB::select('SELECT * FROM peoples WHERE peoples.profile = 2');
        }else{
        $funcionario = DB::select("SELECT * FROM peoples
        LEFT JOIN exams ON exams.employee_id = peoples.id
        WHERE employee_id = $Exam->employee_id ");
        }

        
        if($Exam->employee_id == null){
            $medico = DB::select('SELECT * FROM peoples WHERE peoples.profile = 3');
        }else{
        $medico = DB::select("SELECT * FROM peoples
        LEFT JOIN exams ON exams.doctor_performer_id = peoples.id
        WHERE doctor_performer_id = $Exam->doctor_performer_id ");
        }

        $id_Agenda = DB::select("SELECT * FROM schedules WHERE schedules.id = $Exam->id_schedules_exam");
        $status= $Exam->status;



        //dd($paciente->name);
        return view('Exam.edit', [
            'funcionario' => $funcionario,
            'medico' => $medico,
            'paciente' => $paciente,
            'id_Agenda' => $id_Agenda,
            'Exam' => $Exam,
            'status' => $status,
            ]);
    }

    public function ViewExam()
    {

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
        return view('Exam.ViewExam', ['results' => $results]);
    }

    public function visualizar($id)
    {
        
        $ImagemExame = DB::select("SELECT exam_images.imagem 
                                    FROM exams 
                                    LEFT JOIN exam_images ON exam_images.exam_id = exams.id
                                    WHERE exams.id = $id");
        
        if($ImagemExame == null){
            echo'não tem imagem';
        }


        return view('Exam.visualizar', ['ImagemExame' => $ImagemExame]);
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

        return redirect()->route('Exam.index')->with('success', 'Excluido com sucesso!');      
        
    }
        
}
