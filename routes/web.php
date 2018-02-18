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

Route::get('adminlogin', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('adminlogin', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');


        // Password Reset Routes...
Route::get('passwordadmin', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('passwordadmin/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.all');

Route::get('/admin', 'HomeAdminController@index');
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
Route::resource('banner', 'BannerController',['except'=>['create']]);
Route::get('getlistbanner', 'BannerController@getlistbanner');
Route::post('banner/{id}', 'BannerController@update');
Route::get('setbanner/{id}', 'BannerController@setbanner');
Route::get('showbanner', 'BannerController@showbanner');