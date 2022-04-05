<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductosGrupo as GruposProductos ;

class ProductosGruposController extends Controller
{
    public function getGruposConProductos () {
        return  GruposProductos::getGruposConProductos();
    }

    public function getGruposDestacados () {
        return GruposProductos::limit(6)->inRandomOrder()->get();
    }


}
