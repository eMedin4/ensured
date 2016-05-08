<?php

Route::get('test', 'PostController@test');

Route::group(['middleware' => 'web'], function () {


    /*
        LOGINent
    */
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

        Route::get('social/login/redirect/{provider?}', 
            ['as' => 'social.login', 'uses' => 'AuthController@redirectToProvider']);
        Route::get('social/login/{provider?}', 'AuthController@handleProviderCallback');
        Route::get('social/login/twitter/getmail',
            ['as' => 'getTwitterMail', 'uses' => 'AuthController@getTwitterMail']);


    /*
        POSTS
    */

        Route::get('/', 
        	['as' => 'main', 'uses' => 'PostController@main']);

        Route::get('/{id}/{title}', 
            ['as' => 'single', 'uses' => 'PostController@single'])->where('id', '[0-9]+');

        Route::post('votarpost', 
            ['as' => 'postvote', 'uses' => 'VoteController@postvote']); 




    /*
        POST FILTERS
    */

        Route::get('/fecha/hoy', 
            ['as' => 'today', 'uses' => 'RefinePostController@today']);

        Route::get('/fecha/mañana', 
            ['as' => 'tomorrow', 'uses' => 'RefinePostController@tomorrow']);

        Route::get('/fecha/semana', 
            ['as' => 'week', 'uses' => 'RefinePostController@week']);

        Route::get('/fecha/findesemana', 
            ['as' => 'weekend', 'uses' => 'RefinePostController@weekend']);

        Route::get('/fecha/mes', 
            ['as' => 'month', 'uses' => 'RefinePostController@month']);

        Route::get('/fecha/pasados', 
            ['as' => 'pasts', 'uses' => 'RefinePostController@pasts']);

        Route::get('listas/{id}/{collection}',
            ['as' => 'byCollection', 'uses' => 'RefinePostController@byCollection']);

        Route::get('buscar',
            ['as' => 'search', 'uses' => 'RefinePostController@search']);



    /*
        USERS
    */    

        Route::get('/perfil/{username}', 
            ['as' => 'profile', 'uses' => 'AuthController@showProfile']);

        Route::get('/perfil/actividad/{username}/{filter?}', 
            ['as' => 'filteractivity', 'uses' => 'ActivitiesController@show']);


        Route::get('/perfil/listas/{username}', 
            ['as' => 'pagecollections', 'uses' => 'CollectionController@pagedetails']);


}); /*MIDDLEWARE WEB*/




Route::group(['middleware' => ['web', 'auth']], function () {

    Route::get('nuevo', 
    	['as' => 'create', 'uses' => 'PostController@create']);

    Route::post('guardar', 
    	['as' => 'store', 'uses' => 'PostController@store']);

    Route::get('/editar/{id}',
        ['as' => 'edit', 'uses' => 'PostController@edit'])->where('id', '[0-9]+'); 

    Route::post('/editar/{id}',
        ['as' => 'update', 'uses' => 'PostController@update']);

    Route::post('livesearch', 
        ['as' => 'livesearch', 'uses' => 'SearchController@liveSearch']);

    Route::post('tagsearch', 
        ['as' => 'tagsearch', 'uses' => 'SearchController@tagSearch']);

    Route::post('comentar/{id}', 
    	['as' => 'comment.create', 'uses' => 'CommentController@store']);

    Route::post('votarcomentario',
        ['as' => 'commentvote', 'uses' => 'CommentController@commentvote']);

    Route::post('reportarpost', 
        ['as' => 'postreport', 'uses' => 'VoteController@postreport']); 

    /*
        COLECCIONES
    */

    Route::post('colecciones',
        ['as' => 'collections', 'uses' => 'CollectionController@show']);

    Route::post('guardarencoleccion',
        ['as' => 'savecollection', 'uses' => 'CollectionController@store']);

    Route::post('nuevacoleccion',
        ['as' => 'newcollection', 'uses' => 'CollectionController@add']);

    Route::post('listas',
        ['as' => 'menucollection', 'uses' => 'CollectionController@menu']);




});