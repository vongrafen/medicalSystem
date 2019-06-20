<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

//oute::view('/login', "auth.login")->name('login');
Route::get('/login', 'Auth\LoginController@isLogged')->name('login');
Route::post('/authentication', 'Auth\LoginController@authentication')->name('authentication');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');




Route::group( [ 'middleware' => 'auth'], function()
{


    Route::group( [ 'middleware' => 'auth'], function() 
    {

    //Perfil do cliente (crair middleware client) https://blog.especializati.com.br/middleware-no-laravel-filtros/
    Route::view('/Profile', 'profile')->name('profile')->middleware('auth'); 
    Route::get('/Profile', ['uses'=>'UserController@profile', 'as' => 'profile']);
    Route::post('/Profile', ['uses'=>'UserController@profile', 'as' => 'profile']);
    Route::view('/ExamesPaciente', 'paciente')->name('paciente')->middleware('auth');
    Route::post('/Profile/update/{id}', ['uses'=>'UserController@updateProfile', 'as' => 'User.updateProfile']);
    
});


    //Equipamentos
    Route::view('/home', 'home')->name('home'); 
    Route::get('/equipament', ['uses'=>'EquipamentController@index', 'as' => 'equipament.index']);  
    Route::get('/equipament/add', ['uses'=>'EquipamentController@add', 'as' => 'equipament.add']);
    Route::get('/equipament/menu', ['uses'=>'EquipamentController@menu', 'as' => 'equipament.menu']);
    Route::post('/equipament/save', ['uses'=>'EquipamentController@save', 'as' => 'equipament.save']);
    Route::get('/equipament/edit/{id}', ['uses'=>'EquipamentController@edit', 'as' => 'equipament.edit']);
    Route::put('/equipament/update/{id}', ['uses'=>'EquipamentController@update', 'as' => 'equipament.update']);
    Route::get('/equipament/delete/{id}', ['uses'=>'EquipamentController@delete', 'as' => 'equipament.delete']);

    //Tipo de Exame 
    Route::post('/equipament/add/examtype', ['uses'=>'examtypeController@save', 'as' => 'examtype.save']);

    //Routes user
    Route::get('/User', ['uses'=>'UserController@index', 'as' => 'User.index']);
    Route::get('/User/add', ['uses'=>'UserController@add', 'as' => 'User.add']);
    Route::post('/User/save', ['uses'=>'UserController@save', 'as' => 'User.save']);
    Route::get('/User/edit/{id}', ['uses'=>'UserController@edit', 'as' => 'User.edit']);
    Route::get('/User/updateProfile', ['uses'=>'UserController@profileUpdate', 'as' => 'User.profileUpdate']);
    Route::get('/User/load/{id}', ['uses'=>'UserController@load', 'as' => 'User.load']);
    Route::get('/User/delete/{id}', ['uses'=>'UserController@delete', 'as' => 'User.delete']);


//Medicos 
Route::get('/Medicos', ['uses'=>'PeopleController@indexMedicos', 'as' => 'people.indexMedicos']);

//Pacientes

Route::get('/Pacientes', ['uses'=>'PeopleController@indexPacientes', 'as' => 'people.indexPacientes']);

//Funcionarios
Route::get('/Funcionarios', ['uses'=>'PeopleController@indexFuncionarios', 'as' => 'people.indexFuncionarios']);

//Especialidade
Route::Post('/people/add/specialty', ['uses'=>'specialtyController@save', 'as' => 'specialty.save']);

//Usuários
Route::Post('/people/add/user', ['uses'=>'UserController@save', 'as' => 'user.save']);

//Routes people
Route::get('/people', ['uses'=>'PeopleController@index', 'as' => 'people.index']);
Route::get('/people/menu', ['uses'=>'PeopleController@menu', 'as' => 'people.menu']);
Route::get('/people/add', ['uses'=>'PeopleController@add', 'as' => 'people.add']);
Route::post('/people/save', ['uses'=>'PeopleController@save', 'as' => 'people.save']);
Route::get('/people/edit/{id}', ['uses'=>'PeopleController@edit', 'as' => 'people.edit']);
Route::put('/people/update/{id}', ['uses'=>'PeopleController@update', 'as' => 'people.update']);
Route::get('/people/delete/{id}', ['uses'=>'PeopleController@delete', 'as' => 'people.delete']);


    
Route::get('/people/detail/{id}', ['uses'=>'PeopleController@detail', 'as' => 'people.detail']);
Route::get('/telefone/add/{id}', ['uses'=>'TelefoneController@add', 'as' => 'telefone.add']);
Route::post('/telefone/save/{id}', ['uses'=>'TelefoneController@save', 'as' => 'telefone.save']);

Route::get('/agenda', 'EventController@index')->name('events.index');
Route::get('/agendamento', 'EventController@index')->name('events.agenda');

Route::post('/agenda', 'EventController@addEvent')->name('events.agenda');

});