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

Route::view('/equipaments', 'equipaments.equipaments')->name('equipaments');
Route::view('/equipaments', 'equipaments.equipaments@error')->name('equipaments');
Route::get('/equipamentController', 'equipamentController@register')->name('equipamentController');

Route::view('/equipamentslist', 'Equipaments.equipamentslist')->name('equipamentslist');

 //Medicos
 Route::group(['prefix' => 'medicos'], function () {
    Route::get('/', 'DoctorController@all')->name('doctors.all');
    Route::get('cadastrar', 'DoctorController@create')->name('doctors.create');
    Route::post('cadastrar', 'DoctorController@store')->name('doctors.store');
    Route::get('edit/{id}', 'DoctorController@edit')->name('doctors.edit');
    Route::put('edit/{id}', 'DoctorController@update')->name('doctors.update');
    Route::get('excluir/{id}', 'DoctorController@destroy')->name('doctors.destroy');
});
