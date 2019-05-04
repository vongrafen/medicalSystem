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


// Tarefas do Alison
Route::view('/equipaments', 'equipaments.equipaments')->name('equipaments');
Route::view('/typeequipaments', 'equipaments.equipaments')->name('equipaments');
Route::view('/exams', 'equipaments.equipaments')->name('equipaments');
Route::view('/typeexams', 'equipaments.equipaments')->name('equipaments');
//Route::view('/equipaments', 'equipaments.equipaments@error')->name('equipaments');
Route::POST('/equipamentController', 'equipamentController@register')->name('equipamentController');

Route::view('/equipamentslist', 'Equipaments.equipamentslist')->name('equipamentslist');

