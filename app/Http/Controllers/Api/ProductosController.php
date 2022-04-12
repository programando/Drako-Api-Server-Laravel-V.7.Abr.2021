<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\FoldersHelper as Files;
use App\Models\Producto;

use Storage;
class ProductosController extends Controller
{

  

    public function getProductoPorID ( Request $FormData ) {
        return Producto::with('imagenes')->where('idproducto', $FormData->idproducto )->get();
    }

    public function getProductos () {
        return Producto::with('imagenes')->paginate(20);
    }

    public function getProductosBusqueda ( Request $FormData ){
        return Producto::with('imagenes')->busquedaTexto( $FormData->textoBusqueda)->paginate(20);;
    }

    public function getProductosGrupo ( Request $FormData ){
        return Producto::with('imagenes')->busquedaPorGrupos( $FormData->grupos )->paginate(20);;
    }    

}
