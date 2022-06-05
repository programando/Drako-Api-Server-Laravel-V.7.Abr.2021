<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


$localController = 'PedidosController@';
Route::post('/nuevo/registro'          , $localController.'pedidoNuevoRegistro');
Route::post('/producto/{idproducto}'          , $localController.'saldoVefiricarExistencias');

 
