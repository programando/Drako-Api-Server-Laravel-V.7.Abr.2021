<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// DOCUMENTO SOPORTE
Route::group(['prefix'=>'docsoporte', 'namespace'=>'Api'], function() {
    $localController = 'DcmntosSprteController@';
    Route:: get('/reporte/dian'          , $localController.'documentosSoporte');
});





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

 
 
// PRODUCTOS
   Route::group(['prefix'=>'productos', 'namespace'=>'Api'], function() {
        $localController = 'ProductosController@';
        Route:: get('/listado'                           , $localController.'getProductos');
        Route:: post('/busqueda'                         , $localController.'getProductosBusqueda');
        Route:: post('/grupos'                           , $localController.'getProductosGrupos');
        Route:: post('/buscar/idproducto'                , $localController.'getProductoPorID');
        Route:: post('/buscar/idmd5'                     , $localController.'getProductoPorIdMd5');
        Route:: post('/por/grupo'                        , $localController.'getProductosPorGrupo');
        Route:: post('/por/clase'                        , $localController.'getProductosPorClase');
        Route:: post('/por/idmd5/clase'                  , $localController.'getProductosPorClaseIdMd5');
        Route:: get('/mas/vendidos'                      , 'ProductosVentasController@getProductosVendidos');
        Route:: post('/relacionados'                      , 'ProductosRelacionadosController@getProductosRelacionados');
        
    });

    // GRUPOS
   Route::group(['prefix'=>'grupos', 'namespace'=>'Api'], function() {
    $localController = 'ProductosGruposController@';
    Route:: get('/listado'                           , $localController.'getGruposConProductos');
    Route:: get('/destacados'                        , $localController.'getGruposDestacados');
});

    // CLASES DE PRODUCTO
    Route::group(['prefix'=>'productos/clases', 'namespace'=>'Api'], function() {
        $localController = 'ProductosGruposClaseController@';
        Route:: get('/listado'                           , $localController.'productosGruposClaseListar');
        Route:: get('/destacadas'                        , $localController.'productosGruposClasesDestacadas');
        
    });

    

// 

 // NOTES
    Route::group(['prefix'=>'notes', 'namespace'=>'Api'], function() {
        Route::get('pdf/{id}'             , 'FctrasElctrncasNotesCrController@noteSendToCustomer');
        Route::get('{tpNote}'             , 'FctrasElctrncasNotesCrController@notes');
    });

    Route::group(['prefix'=>'ordenes-compra', 'namespace'=>'Api'], function() {
        Route::get('enviar-proveedor'           , 'OrdenesCompraController@getOrdenesCompraInformarProveedor');
       
    });