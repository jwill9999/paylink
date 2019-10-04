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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/posts', 'PostController@index');
Route::get('/posts/edit/{id}', 'PostController@edit')->middleware('auth');
Route::get('/posts/{id}', 'PostController@show');
Route::post('/posts', 'PostController@store')->middleware('auth');
Route::post('/posts/{id}', 'PostController@update')->middleware('auth');
Route::delete('/posts/{id}', 'PostController@destroy')->middleware('auth');