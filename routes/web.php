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
Route::post('/login', 'Auth\LoginController@authentication')->name('login');

Route::view('/register', 'auth.register')->name('register');
Route::view('/verify', 'auth.verify')->name('verify');

Route::view('/home', 'home')->name('home');
//Route::view('/logout', 'layouts\app')->name('logout');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
Route::view('/dashboard', 'layouts.app')->name('dashboard');