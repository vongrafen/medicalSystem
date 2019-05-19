<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Http\Requests\DoctorRequests as Request;

class DoctorController extends Controller
{
    protected $doctorModel;

    public function __construct(Doctor $doctorModel)
    {
        $this->doctorModel = $doctorModel;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        
        $title = 'Médicos';
        $doctors = $this->doctorModel->get();
        $btnGroups = [
            '<a href="'.route('doctors.create').'" class="btn btn-sm btn-primary">Cadastrar Médico</a>'
        ];
        return view('doctors.all', compact('title', 'doctors', 'btnGroups'));
        
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
        '<a href="'.route('doctors.all').'" class="btn btn-sm btn-default ">Voltar</a>'
       ];

       return view('doctors.register', compact('title', 'btnGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $input = $request->all();
       $doctor = $this->doctorModel->fill($input);


            if (!$doctor->save()) {
                return redirect()->back()->with('error', 'Houve algum problema ao salvar o registro');
            }

            return redirect()->route('doctors.all')->with('sucess', 'Registro salvo com sucesso');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
       $doctor = $this->doctorModel
            ->where('slug', $slug)
            ->first();

        if (!$doctor){
            abort(404);
        }

        $title = 'Editar Doutor:' .$doctor->name;

        return view('admin.doctors.form', compact('title', 'doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $doctor = $this->doctorModel
            ->where('slug', $slug)
            ->first();

        if (!$doctor) {
            abort(404);
        }

        $input = $request->all();

        if (!$doctor->update($input)){
            return redirect()->back()->with('error', 'Houve um problema ao editar o registro');
        }

        return redirect()->route('doctors.all')->with('success','Registro salvo com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $doctor = $this->doctorModel
            ->where('slug', $slug)
            ->first();

        if (!$doctor) {
            abort(404);
        }

        if (!$doctor->delete()){
               return redirect()->back()->with('error', 'Houve um problema ao excluir o registro'); 
        }

        return redirect()->route('doctors.all')->with('success', 'Registro Excluído');
    }
}
