<?php

    Route::group(['prefix' => 'operador', 'as' => 'operador.'], function () {
        Route::get('index', ['as' => 'index', 'uses' => 'OperadorController@index']);
        Route::get('grid', ['as' => 'grid', 'uses' => 'OperadorController@grid']);
        Route::get('create', ['as' => 'create', 'uses' => 'OperadorController@create']);
        Route::post('store', ['as' => 'store', 'uses' => 'OperadorController@store']);
        Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'OperadorController@edit']);
        Route::post('update/{id}', ['as' => 'update', 'uses' => 'OperadorController@update']);
    });