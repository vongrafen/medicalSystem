<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\equipament;

class EquipamentController extends Controller
{
    private $equipament;
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Equipament $equipament)
    {
       // $this->middleware('auth');

        $this->equipament = $equipament;  
    }
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    /**
    * Criar um insert no banco de dados. 
    */
    public function register(Request $request)
    {
        return 'teste';
       /* $dataform = $request->all;

        $insert = $this->equipament->create($dataform);
        
        if($insert)
            return 'Inserido com sucesso';
            //return redirect()->route('equipamentslist');
        else
            return 'não inseriu';
            //return redirect()->route('equipaments');
            */
    }

}
