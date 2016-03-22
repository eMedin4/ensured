<?php

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

    Route::get('/{username}', 
        ['as' => 'profile', 'uses' => 'AuthController@showProfile']);

    Route::get('/{username}/actividad/{filter?}', 
        ['as' => 'filteractivity', 'uses' => 'ActivitiesController@show']);

    Route::get('/{username}/listas', 
        ['as' => 'pagecollections', 'uses' => 'CollectionController@pagedetails']);


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
    	['as' => 'comment.create', 'uses' => 'CommentController@store']);

    Route::post('votarcomentario',
        ['as' => 'commentvote', 'uses' => 'CommentController@commentvote']);

    Route::post('colecciones',
        ['as' => 'collections', 'uses' => 'CollectionController@show']);

    Route::post('guardarencoleccion',
        ['as' => 'savecollection', 'uses' => 'CollectionController@store']);

    Route::post('nuevacoleccion',
        ['as' => 'newcollection', 'uses' => 'CollectionController@add']);





});