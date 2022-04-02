<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Producto;

use Storage;
class ProductosController extends Controller
{
    public function getProductos () {
        return Producto::with('imagenes')->inRandomOrder()->paginate(20);
    }

    public function getProductosBusqueda ( Request $FormData ){
        return Producto::with('imagenes')->busquedaTexto( $FormData->textoBusqueda)->paginate(20);;
    }

    public function getProductosGrupo ( Request $FormData ){
        return Producto::with('imagenes')->busquedaPorGrupos( $FormData->grupos )->paginate(20);;
    }    

}
