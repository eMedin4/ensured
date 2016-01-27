<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/









/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/', 
    	['as' => 'main', 'uses' => 'PostController@main']);

    Route::get('score', 
    	['as' => 'score', 'uses' => 'PostController@score']);

    Route::get('/{id}/{title}', 
    	['as' => 'single', 'uses' => 'PostController@single']);

    Route::post('votarpost/{id}', 
    	['as' => 'postvote', 'uses' => 'VoteController@postvote']);
    
});

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('nuevo', 
    	['as' => 'create', 'uses' => 'PostController@create']);

    Route::post('nuevo', 
    	['as' => 'store', 'uses' => 'PostController@store']);

    Route::post('comentar/{id}', 
    	['as' => 'comment', 'uses' => 'CommentController@store']);

});