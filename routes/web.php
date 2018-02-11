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
Auth::routes();

Route::get('/', 'HomeController@index');

Route::resource('user', 'UserController',['except'=>['destroy','create','show']]);
Route::get('getlistuser', 'UserController@getlist');
Route::post('deluser', 'UserController@destroy');
