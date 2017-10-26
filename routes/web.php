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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/viewdata',function(){
	return view('viewdata');
});


Route::get('/addalumni',function(){
	return view('addalumni');
});


Route::get('/addtag','AddtagController@index');


Route::get('/access','AccessController@index');
