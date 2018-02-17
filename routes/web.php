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

Route::resource('user', 'UserController',['except'=>['create','show']]);
Route::get('getlistuser', 'UserController@getlistuser');

Route::resource('history', 'HistoryController',['except'=>['destroy','create','show']]);
Route::get('getlisthistory', 'HistoryController@getlisthistory');
Route::post('del', 'HistoryController@destroy');


Route::get('getlistpersonal', 'PersonalController@getlistpersonal');
Route::group(['prefix'=>'personal'],function(){

	Route::get('', 'PersonalController@index');
	Route::post('', 'PersonalController@postedit');
	Route::get('pass', 'PersonalController@editpass');
	Route::post('pass', 'PersonalController@posteditpass');
});
Route::resource('banner', 'BannerController',['except'=>['create','show']]);
Route::get('getlistbanner', 'BannerController@getlistbanner');
