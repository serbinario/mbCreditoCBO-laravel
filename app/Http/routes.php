<?php

// Rotas de autenticação
Route::get('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', ['as' => 'auth.postLogin', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth.getLogout', 'uses' => 'Auth\AuthController@getLogout']);

// Rotas para novos usuarios
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

/**
 *
 */
Route::group(['middleware' => 'auth'], function () {

    Route::get('', 'DashBoardController@index');

    Route::get('index', ['as' => 'index', 'uses' => 'DefaultController@index']);
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashBoardController@index']);
    Route::get('dashboard/chartContratosByMonth/{searchAgente}', ['as' => 'dashboard.chartContratosByMonth', 'uses' => 'DashBoardController@getDataChartContratosByMonth']);
    Route::get('dashboard/chartContratosByYear/{searchAgente}', ['as' => 'dashboard.chartContratosByYear', 'uses' => 'DashBoardController@getDataChartContratosByYear']);

    Route::group(['prefix' => 'operador', 'as' => 'operador.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'OperadorController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'OperadorController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'OperadorController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'OperadorController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'OperadorController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'OperadorController@update']);

        //unique chave j
        Route::post('searchChaveJ', ['as' => 'searchChaveJ', 'uses' => 'OperadorController@searchChaveJ']);
    });

    Route::group(['prefix' => 'contrato', 'as' => 'contrato.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'ContratoController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'ContratoController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'ContratoController@create']);
        Route::get('createContrato/{idCliente}', ['as' => 'createContrato', 'uses' => 'ContratoController@createContrato']);
        Route::post('store', ['as' => 'store', 'uses' => 'ContratoController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ContratoController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'ContratoController@update']);

        //Busca de cliente por CPF em cadastro de contratos
        Route::get('searchCliente/{clienteCpf}', ['as' => 'searchCliente', 'uses' => 'ContratoController@searchCliente']);

        /*Rota que possibilita o teste de cadastro contratos
        onde é feito o teste se o no. contrato que foi inserido
        já se encontra cadastrado*/
        Route::post('searchContrato', ['as' => 'searchContrato', 'uses' => 'ContratoController@searchContrato']);

        /*Rota que possibilita o teste de cadastro contratos
        onde é feito o teste se o cpf que foi inserido já se
        encontra cadastrado*/
        Route::post('searchCpf', ['as' => 'searchCpf', 'uses' => 'ContratoController@searchCpf']);

        # Rotas de GERENCIAMENTO DE TELEFONES
        Route::get('telefone/grid/{idClient}', ['as' => 'telefone.grid', 'uses' => 'ContratoController@gridPhones']);
        Route::post('telefone/store/{idClient}', ['as' => 'telefone.create', 'uses' => 'ContratoController@storePhone']);

        # Rota do pdf do contrato
        Route::get('viewContrato/{id}', ['as' => 'viewContrato', 'uses' => 'ContratoController@viewContrato']);

        #
        Route::get('buscaAgencia', ['as' => 'buscaAgencia', 'uses' => 'ContratoController@buscaAgencia']);
        Route::get('buscaAgencia/{idAgencia}', ['as' => 'buscaAgencia', 'uses' => 'ContratoController@buscaAgencia']);
        Route::get('buscaNoAgencia/{idAgencia}', ['as' => 'buscaNoAgencia', 'uses' => 'ContratoController@buscaNoAgencia']);
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
        Route::get('verificarOperador', ['as' => 'verificarOperador', 'uses' => 'UsuarioController@verificarOperador']);
    });

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