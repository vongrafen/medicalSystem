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
    //Equipamentos
    Route::view('/home', 'home')->name('home');   
    Route::view('/equipamentos', 'equipaments.register')->name('equipaments.register');
    Route::post('/equipamentos/cadastro', 'EquipamentController@create')->name('equipaments.cadastrar');
    Route::get('/equipamentos/index', 'EquipamentController@index')->name('equipaments.index');


});

//Medicos
Route::group(['prefix' => 'medicos'], function () {
    Route::get('/', 'DoctorController@all')->name('doctors.all');
    Route::get('cadastrar', 'DoctorController@create')->name('doctors.create');
    Route::post('cadastrar', 'DoctorController@store')->name('doctors.store');
    Route::get('edit/{id}', 'DoctorController@edit')->name('doctors.edit');
    Route::put('edit/{id}', 'DoctorController@update')->name('doctors.update');
    Route::get('excluir/{id}', 'DoctorController@destroy')->name('doctors.destroy');
});
//Pacientes
Route::group(['prefix' => 'pacientes'], function () {
    Route::get('/', 'PatientController@all')->name('patients.all');
    Route::get('cadastrar', 'PatientController@create')->name('patients.create');
    Route::post('cadastrar', 'PatientController@store')->name('patients.store');
    Route::get('edit/{id}', 'PatientController@edit')->name('patients.edit');
    Route::put('edit/{id}', 'PatientController@update')->name('patients.update');
    Route::get('excluir/{id}', 'PatientController@destroy')->name('patients.destroy');
});

//Routes people
Route::get('/people', ['uses'=>'PeopleController@index', 'as' => 'people.index']);
Route::get('/people/menu', ['uses'=>'PeopleController@menu', 'as' => 'people.menu']);
Route::get('/people/add', ['uses'=>'PeopleController@add', 'as' => 'people.add']);
Route::post('/people/save', ['uses'=>'PeopleController@save', 'as' => 'people.save']);
Route::get('/people/edit/{id}', ['uses'=>'PeopleController@edit', 'as' => 'people.edit']);
Route::put('/people/update/{id}', ['uses'=>'PeopleController@update', 'as' => 'people.update']);
Route::get('/people/delete/{id}', ['uses'=>'PeopleController@delete', 'as' => 'people.delete']);

Route::Post('/people/add', ['uses'=>'specialtyController@save', 'as' => 'specialty.save']);
    
Route::get('/people/detail/{id}', ['uses'=>'PeopleController@detail', 'as' => 'people.detail']);
Route::get('/telefone/add/{id}', ['uses'=>'TelefoneController@add', 'as' => 'telefone.add']);
Route::post('/telefone/save/{id}', ['uses'=>'TelefoneController@save', 'as' => 'telefone.save']);

Route::get('/telefone/edit/{id}', ['uses'=>'TelefoneController@edit', 'as' => 'telefone.edit']);
Route::put('/telefone/update/{id}', ['uses'=>'TelefoneController@update', 'as' => 'telefone.update']);
Route::get('/telefone/delete/{id}', ['uses'=>'TelefoneController@delete', 'as' => 'telefone.delete']);


Route::get('/agenda', 'EventController@index')->name('events.index');
Route::get('/agendamento', 'EventController@index')->name('events.agenda');

Route::post('/agenda', 'EventController@addEvent')->name('events.agenda');