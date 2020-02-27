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

// トップページ
Route::get('/', 'TopPageController@index')->name('toppage');


// ユーザー登録画面
Auth::routes(); //Laravelの認証

//ログイン後トップページ
Route::get('/home', 'HomeController@index')->name('home');

// デグー
Route::get('/degu/register', 'DeguController@register')->name('degu/register'); //登録画面
Route::post('/degu/register/add', 'DeguController@add'); //登録処理
Route::get('/degu', 'DeguController@index')->name('degu'); //一覧画面
// Route::get('/degu/{id}','')// 詳細画面

// Route::get('/degu/{id}/profile', '')->name('user.profile'); //プロフィール画面(未実装)