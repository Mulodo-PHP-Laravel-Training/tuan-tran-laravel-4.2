<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix' => 'users'), function()
{
    /*Route::post('create/{username}/{password}/{email}',array(
    	'as'=>'createuser',
    	'uses'=>'UsersController@createuser')
    );*/
	Route::post('create',array(
    	'as'=>'createuser',
    	'uses'=>'UsersController@createuser')
    );
    Route::put('login',array(
    	'as'=>'login',
    	'uses'=>'UsersController@login')
    );
    Route::put('logout',array(
    	'as'=>'logout',
    	'uses'=>'UsersController@logout')
    );
});
