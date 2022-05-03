<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ProductosGruposClase as ProductosClases;

class ProductosGruposClaseController extends Controller
{
    public function productosGruposClaseListar() {
        return ProductosClases::where('inactivo','0')->orderBy('nom_clase_grupo')->get();
    }

    public function productosGruposClasesDestacadas() {
        return ProductosClases::limit(8)->where('imagen','<>','')->get();
    }
    
}
