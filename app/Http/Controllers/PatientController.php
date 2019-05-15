<?php

namespace App\Http\Controllers;

use App\Patient;
use App\Http\Requests\PatientRequests as Request;

class PatientController extends Controller
{
    protected $patientModel;

    public function __construct(Patient $patientModel)
    {
        $this->patientModel = $patientModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        // dd('Página em Manutenção');
        $title = 'Paciente';
        $patients = $this->patientModel->get();
        // dd('Página em Manutenção');
        $btnGroups = [
            '<a href="'.route('patients.create').'" class="btn btn-sm btn-primary">Cadastrar Paciente</a>'
        ];
        return view('patients.all', compact('title', 'patients', 'btnGroups'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $title = 'Cadastrar Médico';

       $btnGroups = [
        '<a href="'.route('patients.all').'" class="btn btn-sm btn-default ">Voltar</a>'
       ];

       return view('patients.register', compact('title', 'btnGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $input = $request->all();
       $patient = $this->patientModel->fill($input);

            if (!$patient->save()) {
                return redirect()->back()->with('error', 'Houve algum problema ao salvar o registro');
            }

            return redirect()->route('patients.all')->with('sucess', 'Registro salvo com sucesso');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
       $patient = $this->patientModel
            ->where('slug', $slug)
            ->first();

        if (!$patient){
            abort(404);
        }

        $title = 'Editar Doutor:' .$patient->name;

        return view('admin.patients.form', compact('title', 'patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $patient = $this->patientModel
            ->where('slug', $slug)
            ->first();

        if (!$patient) {
            abort(404);
        }
 
        $input = $request->all();

        if (!$patient->update($input)){
            return redirect()->back()->with('error', 'Houve um problema ao editar o registro');
        }

        return redirect()->route('patients.all')->with('success','Registro salvo com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $patient = $this->patientModel
            ->where('slug', $slug)
            ->first();

        if (!$patient) {
            abort(404);
        }

        if (!$patient->delete()){
               return redirect()->back()->with('error', 'Houve um problema ao excluir o registro'); 
        }

        return redirect()->route('patients.all')->with('success', 'Registro Excluído');
    }
}
