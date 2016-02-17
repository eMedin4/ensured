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

Route::get('prueba', function() {
    return view('prueba');
});



Route::group(['middleware' => 'web'], function () {

    /*LOGIN*/
        Route::get('entrar',
            ['as' => 'getlogin', 'uses' => 'AuthController@getLogin']);

        Route::post('entrar',
            ['as' => 'postlogin', 'uses' => 'AuthController@postLogin']);

        Route::get('salir',
            ['as' => 'logout', 'uses' => 'AuthController@logout']);

        Route::get('registro',
            ['as' => 'getregister', 'uses' => 'AuthController@getRegister']);

        Route::post('registro',
            ['as' => 'postregister', 'uses' => 'AuthController@postRegister']);

    Route::get('/', 
    	['as' => 'main', 'uses' => 'PostController@main']);

    Route::get('/{username}/actividad', 
        ['as' => 'activity', 'uses' => 'ActivitiesController@show']);

    Route::get('/{id}/{title}', 
    	['as' => 'single', 'uses' => 'PostController@single']);

    Route::post('votarpost', 
        ['as' => 'postvote', 'uses' => 'VoteController@postvote']);  

    /*REFINE POSTS*/
        Route::get('hoy', 
            ['as' => 'today', 'uses' => 'RefinePostController@today']);

        Route::get('mañana', 
            ['as' => 'tomorrow', 'uses' => 'RefinePostController@tomorrow']);

        Route::get('semana', 
            ['as' => 'week', 'uses' => 'RefinePostController@week']);

        Route::get('findesemana', 
            ['as' => 'weekend', 'uses' => 'RefinePostController@weekend']);

        Route::get('mes', 
            ['as' => 'month', 'uses' => 'RefinePostController@month']);

        Route::get('pasados', 
            ['as' => 'pasts', 'uses' => 'RefinePostController@pasts']);

    
});

Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('nuevo', 
    	['as' => 'create', 'uses' => 'PostController@create']);

    Route::post('nuevo', 
    	['as' => 'store', 'uses' => 'PostController@store']);

    Route::post('comentar/{id}', 
    	['as' => 'comment', 'uses' => 'CommentController@store']);

});