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
    return Redirect::to('login');
});

Route::view('/login', 'auth.login')->name('login');
Route::post('/authentication', 'Auth\LoginController@authentication')->name('authentication');

Route::view('/register', 'auth.register')->name('register');
Route::post('/register', 'Auth\RegisterController@createUser')->name('register');

Route::view('/verify', 'auth.verify')->name('verify');

Route::view('/home', 'home')->name('home');

//Route::view('/logout', 'auth.login')->name('logout');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::view('/dashboard', 'layouts.app')->name('dashboard');

//Routes people
Route::get('/people', ['uses'=>'PeopleController@index', 'as' => 'people.index']);
Route::get('/people/add', ['uses'=>'PeopleController@add', 'as' => 'people.add']);
Route::post('/people/save', ['uses'=>'PeopleController@save', 'as' => 'people.save']);
Route::get('/people/edit/{id}', ['uses'=>'PeopleController@edit', 'as' => 'people.edit']);
Route::put('/people/update/{id}', ['uses'=>'PeopleController@update', 'as' => 'people.update']);
Route::get('/people/delete/{id}', ['uses'=>'PeopleController@delete', 'as' => 'people.delete']);

Route::get('/people/detail/{id}', ['uses'=>'PeopleController@detail', 'as' => 'people.detail']);
Route::get('/telefone/add/{id}', ['uses'=>'TelefoneController@add', 'as' => 'telefone.add']);
Route::post('/telefone/save/{id}', ['uses'=>'TelefoneController@save', 'as' => 'telefone.save']);

Route::get('/telefone/edit/{id}', ['uses'=>'TelefoneController@edit', 'as' => 'telefone.edit']);
Route::put('/telefone/update/{id}', ['uses'=>'TelefoneController@update', 'as' => 'telefone.update']);
Route::get('/telefone/delete/{id}', ['uses'=>'TelefoneController@delete', 'as' => 'telefone.delete']);