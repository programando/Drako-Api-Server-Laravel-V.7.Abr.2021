<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\FoldersHelper as Files;
use App\Models\Producto;
use App\Models\ProductosGruposClase as ClaseProductos;

use Storage;
class ProductosController extends Controller
{

    public function getProductoPorIdMd5 ( Request $FormData ) {
        return Producto::with('imagenes')->where('idmd5', $FormData->idmd5 )->get();
    }

    public function getProductoPorID ( Request $FormData ) {
        return Producto::with('imagenes')->where('idproducto', $FormData->idproducto )->get();
    }

    public function getProductos () {
        return Producto::with('imagenes')->paginate(20);
    }

    public function getProductosBusqueda ( Request $FormData ){
        return Producto::with('imagenes')->busquedaTexto( $FormData->textoBusqueda)->paginate(20);;
    }

    // PRODUCTOS POR UN GRUPO(S)... RECIBE ARRAY COMO PARAMETRO
    public function getProductosGrupos ( Request $FormData ){
        return Producto::with('imagenes')->busquedaPorGrupos( $FormData->grupos )->paginate(20);
    }   
    
    public function getProductosPorGrupo ( Request $FormData) {
        return Producto::with('imagenes')->where('idgrupo', $FormData->idgrupo )->paginate(20);;
    }

    // TODOS LOS PRODUCTOS DE UNA CLASE.... RECIBE ARRAY COMO PARAMENTRO
    public function getProductosPorClase ( Request $FormData) {
        $IdsGrupos = [];
        $ClasesProductos = ClaseProductos::with('grupos')->whereIn('id_clase_grupo', $FormData->clasesProdcucto)->get();
        $IdsGrupos = $this->getGruposProductosPorClaseProducto( $ClasesProductos) ;
        return Producto::with('imagenes')->busquedaPorGrupos(  $IdsGrupos)->paginate(20);
    }

    public function getProductosPorClaseIdMd5 ( Request $FormData) {
        $IdsGrupos = [];
        $ClasesProductos = ClaseProductos::with('grupos')->where('idmd5', $FormData->idmd5)->get();
        $IdsGrupos = $this->getGruposProductosPorClaseProducto( $ClasesProductos) ;
        return Producto::with('imagenes')->busquedaPorGrupos(  $IdsGrupos)->paginate(20);
    }

    // MAYO 04 2022     OBTIENE TODOS LOS GRUPO DE UNA CLASE
    private function getGruposProductosPorClaseProducto ( $ClasesProductos) {
        $IdsGrupos = [];
        foreach ( $ClasesProductos as $Clave => $valor ){
            foreach ($valor->grupos as $grupo ) {
                array_push($IdsGrupos, $grupo->idgrupo);  ;
            }
        }
        return $IdsGrupos;
    }


}
