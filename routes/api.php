<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// NOMINA ELECTRONICA
    Route::group(['prefix'=>'nomina', 'namespace'=>'Api'], function() {
        $localController = 'NominaElctrncaController@';
        Route:: get('/reporte/dian'          , $localController.'dianReporting');
        Route:: post('/nota/ajuste'           , $localController.'notaAjusteNomina');
        Route:: post('zipkey/{id}'           , $localController.'zipKey');
    });
	

/* DB::listen(function($query){
  //Imprimimos la consulta ejecutada
  echo "<pre> {$query->sql } </pre>";
});
 */


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// INVOICES
    Route::group(['prefix'=>'invoices', 'namespace'=>'Api'], function() {
        $localController = 'FctrasElctrncasInvoicesController@';
        Route:: get('/'                           , $localController.'invoices')->name('invoices');
        Route:: get('pdf/{id}'                    , $localController.'invoiceSendToCustomer');
        Route:: get('/download/{filetype}/{id}'   , $localController.'invoiceFileDownload');
        Route:: get('accepted/{id}'               , $localController.'invoiceAccepted');
        Route:: get('rejected/{id}'               , $localController.'invoiceRejected');  
        Route:: get('/list'                       , $localController.'invoiceList');
        Route:: post('logs'                       , $localController.'sentInvoicesLogs');
    });


 // NOTES
    Route::group(['prefix'=>'notes', 'namespace'=>'Api'], function() {
        Route::get('pdf/{id}'             , 'FctrasElctrncasNotesCrController@noteSendToCustomer');
        Route::get('{tpNote}'             , 'FctrasElctrncasNotesCrController@notes');
    });

    Route::group(['prefix'=>'ordenes-compra', 'namespace'=>'Api'], function() {
        Route::get('enviar-proveedor'           , 'OrdenesCompraController@getOrdenesCompraInformarProveedor');
       
    });