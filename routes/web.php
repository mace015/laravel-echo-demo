<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

	Route::get('home', 'HomeController@index');

	Route::post('tasks/index', 'TasksController@index');
	Route::post('tasks/create', 'TasksController@create');
	Route::post('tasks/delete', 'TasksController@delete');

});
