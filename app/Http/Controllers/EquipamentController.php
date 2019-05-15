<?php

namespace App\Http\Controllers;

use App\Equipament;
use Illuminate\Http\Request;

class EquipamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipament = Equipament::all();

        return view('equipaments.index', ['resultado' => $equipament]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Equipament $equipament)
    {
        try{
            $equipament->create($request->all());
            
            if ($validate) {
                return back()->with('Sucesso','Equipamento cadastrado com Sucesso');
            }    
        } catch(\Illuminate\Database\QueryException $e) {
            return back()->with('error','ERRO: Ops! Algo deu errado!');
        }  
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipament  $equipament
     * @return \Illuminate\Http\Response
     */
    public function show(Equipament $equipament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipament  $equipament
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipament $equipament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipament  $equipament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipament $equipament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipament  $equipament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipament $equipament)
    {
        //
    }
}
