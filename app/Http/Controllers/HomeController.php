<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\People;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $QtdUsers = DB::table('users')
                        ->select(DB::raw('count(*) as QtdUsers'))
                        ->get();
                        dd($QtdUsers);

        return view('home', ['QtdUsers' => $QtdUsers]);
    }
}
