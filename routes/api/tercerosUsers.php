<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




//Route::group(['prefix'=>'usuarios' ], function() {
    Route::post('/buscar/email'     , 'TercerosUserController@buscarEmail');
    Route::post('/login'            , 'TercerosUserController@login')->name('login');
    Route::post('/logout'           , 'TercerosUserController@logout')->name('logout'); 
    Route::post('/reset/password'   , 'TercerosUserController@resetPassword')->name('reset-password'); 
    Route::post('/update/password'  , 'TercerosUserController@updatePassword')->name('update-password'); 
    Route::post('/registro'          , 'TercerosUserController@registroNuevoUsuario'); 

//});

Route::middleware('auth:sanctum')->get('/autenticado', function (Request $request) {
    return $request->user();
});