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
    return view('welcome');
});

// デグー登録画面
Route::get('/degu', 'DeguIndexController@index');

Route::get('/degu/register', 'DeguRegisterController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
