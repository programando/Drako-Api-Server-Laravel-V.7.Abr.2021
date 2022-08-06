<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

 
 // PREFIX ->  events-fact-proveedor

$localController = 'FctrasElctrncasEventsController@';

 
Route:: post('/030/acuse'                       , $localController.'acuseRecibo')                   ;
Route:: post('/031/rechazo'                     , $localController.'rechazoReclamo')                ;
Route:: post('/032/recibo-bien-servicio'        , $localController.'reciboBienServicio')            ;
Route:: post('/033/aceptacion-expresa'          , $localController.'aceptacionExpresa')             ;
Route:: post('/recibidas'                       , $localController.'documentosRecepcionados')       ;
Route:: post('/consulta'                       , $localController.'documentStatus')       ;

 