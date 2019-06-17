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

    public function profileUpdate(Request $request)
    {
        // https://www.youtube.com/watch?v=QFEuoJZ3IOI
        $user = auth()->user();

        $data = $request->all();
        if($data['password']!=null)
            $data['password'] = bcrypt( $data['password']);
        else    
            unset( $data['password']);

        $data['img'] = $user->img;
            if(( $request->hasFile('img')) && $request->file('img')->isValid() ){
                if($user->img)
                    $name = $user->image;
                else
                    $name = $user->id.kebab_case($user->name);
                
                
                $extenstion = $request->img->extenstion();
                $namefile - "{$name}.{extenstion}";
                $data['img'] = $namefile;

                // super impostant voltar o nome da imagem diferente
                dd($namefile);

                $upload = $request->img->storeAs('users',$namefile);

                

                if(!$upload)
                    return redirect()
                        ->back()
                        ->with('error','Falha ao fazer upload');
            }

        $update = auth()->user()->update($data);

        if($update)
            return redirect()
                       ->route('User.index');
            else
            return  redirect()
                    ->route('User.add');




    }

    public function add()
    {
        $results = user::all();
        $peoples = People::all();
        return view('User.add', ['results' => $results, $peoples]);
    }


    public function save(Request $request)
    {
       
       $insert = user::create($request->all()); 
       if($insert['password']!=null)
       $insert['password'] = bcrypt( $insert['password']);
        else    
       unset( $insert['password']);



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
