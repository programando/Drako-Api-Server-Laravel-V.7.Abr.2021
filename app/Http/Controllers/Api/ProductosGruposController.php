<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductosGrupo as Grupos ;
class ProductosGruposController extends Controller
{
    public function getGruposConProductos () {
        return  Grupos::getGruposConProductos();
            
    }


}
