<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




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
        Route:: get('/'                          , $localController.'invoices')->name('invoices');
        Route:: get('pdf/{id}'                   , $localController.'invoiceSendToCustomer');
        Route:: get('/download/{filetype}/{id}'  , $localController.'invoiceFileDownload');
        Route:: get('accepted/{id}'              , $localController.'invoiceAccepted');
        Route:: get('rejected/{id}'              , $localController.'invoiceRejected');  
        Route:: get('/list'              , $localController.'invoiceList');
    });


 // NOTES
    Route::group(['prefix'=>'notes', 'namespace'=>'Api'], function() {
        Route::get('pdf/{id}'             , 'FctrasElctrncasNotesCrController@noteSendToCustomer');
        Route::get('{tpNote}'             , 'FctrasElctrncasNotesCrController@notes');
    });
