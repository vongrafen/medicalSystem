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
        // dd('Página em Manutenção');
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
        '<a href="'.route('states.all').'" class="btn btn-sm btn-default ">Voltar</a>'
       ];

       return view('admin.states.form', compact('title', 'btnGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $input = $request->all();
       $state = $this->stateModel->fill($input);

            if (!$state->save()) {
                return redirect()->back()->with('error', 'Houve algum problema ao salvar o registro');
            }

            return redirect()->route('states.all')->with('sucess', 'Registro salvo com sucesso');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
       $state = $this->stateModel
            ->where('slug', $slug)
            ->first();

        if (!$state){
            abort(404);
        }

        $title = 'Editar Estado:' .$state->name;

        return view('admin.states.form', compact('title', 'state'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $state = $this->stateModel
            ->where('slug', $slug)
            ->first();

        if (!$state) {
            abort(404);
        }

        $input = $request->all();

        if (!$state->update($input)){
            return redirect()->back()->with('error', 'Houve um problema ao editar o registro');
        }

        return redirect()->route('states.all')->with('success','Registro salvo com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $state = $this->stateModel
            ->where('slug', $slug)
            ->first();

        if (!$state) {
            abort(404);
        }

        if (!$state->delete()){
               return redirect()->back()->with('error', 'Houve um problema ao excluir o registro'); 
        }

        return redirect()->route('states.all')->with('success', 'Registro Excluído');
    }
}
