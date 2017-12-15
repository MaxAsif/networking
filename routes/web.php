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
/*
	Home Controller is used to get the dashboard of both student member and coordinator
*/
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


/*
	Alumni Controller is used to get the list of alumni for both student member and coordinator
	Alumni Controller is used to get the profile of each alum
	Alumni Controller is used to edit notes related to alum
	Alumni Controller is used to add alum in database
	Alumni Controller is used to edit alum

*/
Route::get('/viewdata','AlumniController@get');
Route::get('/viewdata_s','AlumniController@get_s');
Route::get('/year/{year}','AlumniController@getyear');
Route::post('/notesedit/{id}','AlumniController@editnotes');
Route::get('/addalumni',function(){
	$message = '';
	return view('addalumni',compact('message'));
});
Route::post('/addalumni','AlumniController@index');
Route::post('/editalumnidata','AlumniController@editdata');

Route::get('/editalum/{id}','AlumniController@editt');
Route::get('/profile/{id}','AlumniController@profile');


/*
	Tagslist Controller is used to add and delete tag to tags list

*/

Route::get('/addtag','TagslistController@index');
Route::post('/addtag','TagslistController@postdata');
Route::post('/deletetag','TagslistController@deletedata');

/*
	Acess Controller is used to give acess to students and view student member dashboard

*/

Route::post('/access','AccessController@post');
Route::get('/access','AccessController@index');
Route::post('/accessdelete','AccessController@deleteAccess');

/*
	Assigntag controller is used to assign tag to the alum and delete it

*/

Route::post('/assigntag/{id}','AddtagController@index');
Route::post('/taggdelete/{id}','AddtagController@delete');
