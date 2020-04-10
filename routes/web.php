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

// ============================
// トップページ
// ============================
Route::get('/', 'TopPageController@index')->name('toppage');

// ============================
// Laravelの認証
// ============================
Auth::routes(); //Laravelの認証

// ============================
// Twitter認証
// ============================
Route::get('/login/twitter', 'LoginController@redirectToProvider');
Route::get('/login/twitter/callback', 'LoginController@handleProviderCallback');

// ============================
// ログイン後のホームページ
// ============================
Route::get('/home', 'HomeController@index')->name('home');

// ============================
// デグー関連ページ
// ============================
// Route::get('/degu/register', 'DeguController@register')->name('degu/register')->middleware('auth'); //登録画面
// Route::post('/degu/register/add', 'DeguController@add'); //登録処理
// Route::get('/degu', 'DeguController@index')->name('degu'); //一覧画面
// Route::get('/degu/{id}','DeguController@page');// 詳細画面
// Route::get('/degu/{id}/profile', '')->name('user.profile'); //プロフィール画面(未実装)

// ============================
// Q&A関連ページ
// ============================
Route::get('/qa', 'QaController@index')->name('qa'); //一覧画面
Route::get('/qa/{id}', 'QaController@page'); //一覧画面
Route::post('/qa/addQuestion', 'QaController@addQuestion')->name('qa/addQuestion')->middleware('auth');
Route::post('/qa/addAnswer', 'QaController@addAnswer')->name('qa/addAnswer')->middleware('auth');
