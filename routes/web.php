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

Route::resource('client', 'ClientController',['except'=>['create','show']]);
Route::get('getlistclient', 'ClientController@getlistclient');

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
Route::get('namebanner', 'BannerController@namebanner');

Route::resource('slider', 'SliderController',['except'=>['create']]);
Route::get('getlistslider', 'SliderController@getlistslider');
Route::post('slider/{id}', 'SliderController@update');
Route::get('setslider1/{id}', 'SliderController@setslider1');
Route::get('setslider2/{id}', 'SliderController@setslider2');
Route::get('setslider3/{id}', 'SliderController@setslider3');
Route::get('nameslider1', 'SliderController@nameslider1');
Route::get('nameslider2', 'SliderController@nameslider2');
Route::get('nameslider3', 'SliderController@nameslider3');


Route::get('showbanner', 'ShowController@showbanner');
Route::get('showslider1', 'ShowController@showslider1');
Route::get('showslider2', 'ShowController@showslider2');
Route::get('showslider3', 'ShowController@showslider3');



Route::get('auth/google', 'AuthController@redirectgoogle');
Route::get('auth/google/callback', 'AuthController@handlegoogle');
Route::get('auth/facebook', 'AuthController@redirectfacebook');
Route::get('auth/facebook/callback', 'AuthController@handlefacebook');
Route::post('aulogoutth/client', 'AuthController@logout')->name('logout_client');

Route::resource('tests', 'TestsController');
Route::resource('results', 'ResultsController');

Route::get('gay', 'GayController@gay');