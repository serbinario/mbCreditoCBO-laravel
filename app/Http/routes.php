<?php

    Route::group(['prefix' => 'operador', 'as' => 'operador.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'OperadorController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'OperadorController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'OperadorController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'OperadorController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'OperadorController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'OperadorController@update']);
        /*Protótipo do menu
        Route::get('novoMenu', ['as' => 'novoMenu', 'uses' => 'OperadorController@novoMenu']);
        Route::get('novoCreate', ['as' => 'novoCreate', 'uses' => 'OperadorController@novoCreate']);*/

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
        Route::get('index', ['as' => 'index', 'uses' => 'UsuarioController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'UsuarioController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'UsuarioController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'UsuarioController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'UsuarioController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'UsuarioController@update']);
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