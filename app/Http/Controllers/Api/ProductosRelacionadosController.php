<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductosRelacionado as Productos;

class ProductosRelacionadosController extends Controller
{
    public function getProductosRelacionados ( request $FormData ) {
        return  Productos::with('imagenes')->where('idprdcto_ppal',$FormData->idproducto )->get();
    }



}
