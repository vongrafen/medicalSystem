<?php

namespace App\Http\Controllers;

use App\Exam;
use App\People;
use App\Diagnotic;
use Illuminate\Http\Request;
use App\Requests\LaudoRequest;
use Illuminate\Support\Facades\DB; // para usar o SQL
use Illuminate\Pagination\LengthAwarePaginator;
use Alert;

class DiagnoticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $Exam = Exam::find($id);
        $Laudo = DB::select("SELECT * FROM diagnotics WHERE diagnotics.exam_id = 6");
        
        return view('diagnostic.index', [
            'Exam'=>$Exam,
            'Laudo'=>$Laudo,

            ]);
    }

    /**
     * Função Responsavel por salvar um novo laudo no banco.
     */
    public function save(\App\Requests\LaudoRequest $request)
    {
        
        Diagnotic::create($request->all());
        //alert()->success('', 'Laudo Cadastrado com sucesso')->persistent('OK');
        return redirect()
                ->route('Exam.ViewExam')
                ->with('Laudo Cadastrado com sucesso');
    }

    /**
     * Método Add é um método que busca apartir de um ID vindo do Exame, para mandar os dados para salvar
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        
        $Exam = Exam::find($id);
        //$existe = DB::select("SELECT * FROM diagnotics WHERE diagnotics.exam_id = $id");
        $paciente = DB::select("SELECT distinct * FROM peoples 
                                LEFT JOIN exams ON exams.patients_id = peoples.id 
                                WHERE exams.id = $id");
        
        $medico = DB::select("SELECT distinct * FROM peoples 
                              LEFT JOIN exams ON exams.doctor_performer_id = peoples.id 
                              WHERE exams.id = $id");
        
        $DataExame = DB::select("SELECT distinct DATE_FORMAT(exams.performed_date, '%d/%m/%Y %H:%i:%s') as d
                                 FROM exams WHERE exams.id = $id");
        
        return view('diagnostic.add', [
            'medico' => $medico,
            'paciente' => $paciente,
            'DataExame' => $DataExame,
            'Exam'=>$Exam,
            ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diagnotic  $diagnotic
     * @return \Illuminate\Http\Response
     */
    public function show(Diagnotic $diagnotic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diagnotic  $diagnotic
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnotic $diagnotic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diagnotic  $diagnotic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diagnotic $diagnotic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diagnotic  $diagnotic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diagnotic $diagnotic)
    {
        //
    }
}
