<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\ProductosVenta ;


class ProductosVentasController extends Controller
{
    
    public function getProductosVendidos (){
        return ProductosVenta::with('imagenes')->get();
    }


}
