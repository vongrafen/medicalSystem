<?php

namespace App\Http\Controllers;

use App\User;
use App\People;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    
    protected $user;
    public function __construct(User $user)
    {   
        $this->user = $user;
        $this->middleware('auth');
        
    }
    protected $peopleModel;
    public function __constructP(People $peopleModel)
    {   
        $this->peopleModel = $peopleModel;
        $this->middleware('auth');
    }

    public function index()
    {
        
        $results = $this->user->paginate(20); // whereNotNull('rg')->
        return view('User.index',['results' => $results]);
    }

    public function profileUpdate(UpdateProfileFormRequest $request)
    {
        $user = auth()->user();

        $data = $request->all();

        if ($data['password'] != null)
            $data['password'] = bcrypt($data['password']);
        else
            unset($data['password']);

        
        $data['img'] = $user->img;
        if ($request->hasFile('img') && $request->file('img')->isValid()) {
            if ($user->img)
                $name = $user->img;
            else
                $name = $user->id.kebab_case($user->name);
            
            $extenstion = $request->img->extension();
            $nameFile = "{$name}.{$extenstion}";

            $data['img'] = $nameFile;

            $upload = $request->img->storeAs('users', $nameFile);

            if (!$upload)
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer o upload da imgm');
        }

        $update = $user->update($data);

        if ($update)
            return redirect()
                        ->route('profile')
                        ->with('success', 'Sucesso ao atualizar!');

        return redirect()
                    ->back()
                    ->with('error', 'Falha ao atualizar o perfil...');
    }

    public function add()
    {
        $results = user::all();
        $peoples = People::all();
        return view('User.add', ['results' => $results, 'peoples' => $peoples]);
    }

    public function save(Request $request)
    {
        if($request['password']!=null)
        $request['password'] = bcrypt( $request['password']);
         else    
        unset( $request['password']);

       $insert = user::create($request->all()); 




        if ($insert)    // Verifica se inseriu com sucesso
                return redirect()
                        ->route('User.index');
            else
                return  redirect()
                        ->route('User.add');
    }

    public function edit ($id)
    {
        $users = user::find($id);
        if(!$users){
            \Session::flash('flash_message', [
                'msg'=>"Não existe esse pessoa cadastrada, deseja cadastrar nova pessoa?",
                'class'=>"alert-danger"
            ]);
            return redirect()->route('User.add');
        }
        return view('User.edit', compact('User'));
    }

    public function load()
    {
        $peoples = People::all();

        return view('User.add', ['peoples' => $peoples]);
    }


    public function profile()
    {
        $user = auth()->user();
        $peoples = People::all()->find($user->people_id);
        
        return view('profile', ['results' => $user, 'peoples' => $peoples]);
    }

    
    public function update(Request $request, $id)
    {
        Session::flash('message', 'Olá');
        user::find($id)->update($request->all());
        
        return redirect()->route('User.index');        
        
    }

    public function delete($id)
    {
        $users = user::find($id);
        
        $users->delete();
         \Session::flash('flash_message',[
            'msg'=>"usuário atualizada com sucesso!",
            'class'=>"alert-success"
        ]);

        return redirect()->route('User.index')->with('success', 'cadastrada com sucesso!');      
        
    }
}
