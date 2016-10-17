<?php

    Route::group(['prefix' => 'operador', 'as' => 'operador.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'OperadorController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'OperadorController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'OperadorController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'OperadorController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'OperadorController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'OperadorController@update']);
        Route::get('getAgentes', ['as' => 'getAgentes', 'uses' => 'OperadorController@getAgentes']);
    });

    Route::group(['prefix' => 'contrato', 'as' => 'contrato.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'ContratoController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'ContratoController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'ContratoController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'ContratoController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ContratoController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'ContratoController@update']);
    });

    Route::group(['prefix' => 'agencia', 'as' => 'agencia.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'AgenciaCallCenterController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'AgenciaCallCenterController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'AgenciaCallCenterController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'AgenciaCallCenterController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'AgenciaCallCenterController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'AgenciaCallCenterController@update']);
    });

    Route::group(['prefix' => 'convenio', 'as' => 'convenio.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'ConvenioCallCenterController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'ConvenioCallCenterController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'ConvenioCallCenterController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'ConvenioCallCenterController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ConvenioCallCenterController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'ConvenioCallCenterController@update']);
    });

    Route::group(['prefix' => 'usuario', 'as' => 'usuario.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'UserController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'UserController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'UserController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'UserController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'UserController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'UserController@update']);
    });

    //Rotas API restfull
    Route::group(['middleware' => ['oauth', 'cors'], 'prefix' => 'api/v1', 'as' => 'api.v1.'], function () {
        Route::resource('operador', 'Api\V1\OperadorController');
        Route::resource('agencia', 'Api\V1\AgenciaCallCenterController');
        Route::resource('contrato', 'Api\V1\ContratoController');
        Route::resource('convenio', 'Api\V1\ConvenioCallCenterController');
        Route::resource('usuario', 'Api\V1\UsuarioController');
    });

    //Rota que responde à solicitações de acesso de token
    Route::post('oauth/access_token', function() {
        return Response::json(Authorizer::issueAccessToken());
    });