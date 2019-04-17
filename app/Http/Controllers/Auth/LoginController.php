<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Model\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    public function authentication(Request $request){

        $this -> validate($request, [
            'login'=>'required',
            'password'=>'required',
        ]);

        $user = $request->input('login');
        $password = $request->input('password');

        //$loginData = ['login' => $user, 'password' => $password];

        if (auth::attempt(['login' => $user, 'password' => $password])){
            return redirect ('dashboard');
        }
        else {
            return redirect ('login');
        }
        
    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect('login');
    }
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
