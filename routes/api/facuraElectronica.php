<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

 
   
$localController = 'FctrasElctrncasInvoicesController@';
Route:: get('/'                           , $localController.'invoices')->name('invoices')              ;
Route:: get('/pdf/{id}'                    , $localController.'invoiceSendToCustomer')                   ;
Route:: get('/download/{filetype}/{id}'   , $localController.'invoiceFileDownload')                     ;
Route:: get('/accepted/{id}'               , $localController.'invoiceAccepted')                         ;
Route:: get('/rejected/{id}'               , $localController.'invoiceRejected')                         ;  
Route:: get('/list'                       , $localController.'invoiceList')                             ;
Route:: post('/logs'                       , $localController.'sentInvoicesLogs')                        ;
Route:: post('/search-document-by-uuid'    , $localController.'searchInvoceByUuid')                      ;
Route:: post('/recepcionadas'              , $localController.'invoicesReceived')                        ;

Route:: post('/event/acuse-recibo'         , 'FctrasElctrncasEventsController@acuseRecibo')              ;

Route:: post('/print/pos'                    , $localController.'PrintPosDocument');
Route:: get('/list/pos'                       , $localController.'FacturasPosUltimos3Dias')              ;