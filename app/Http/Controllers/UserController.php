<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;



class UserController extends Controller
{
    protected $user;

    
    public function __construct(user $user)
    {   
        $this->user = $user;
        $this->middleware('auth');
    }

    public function save(UserRequests $request)
    {
        dd($request);
        $insert = user::create($request->all());
        dd($insert);
        // Verifica se inseriu com sucesso
        if ($insert)
        return redirect()
                    ->route('people.add')
                    ->with('success', 'Usuário cadastrado com sucesso!');

        // Redireciona de volta com uma mensagem de erro
        return redirect()
                    ->back()
                    ->with('error', 'Falha ao inserir');
        }


}
