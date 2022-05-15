<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// MUNICIPIOS
    Route::group(['prefix'=>'municipios' ], function() {
        $localController = 'MunicipiosController@';
        Route::get('/listado/activos'                  , $localController.'listadoActivos');
    });