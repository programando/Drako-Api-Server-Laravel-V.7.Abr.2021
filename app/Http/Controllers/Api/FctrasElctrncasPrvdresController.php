<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FctrasElctrncasPrvdre as FacturasProveedores;


class FctrasElctrncasPrvdresController extends Controller
{
    
    public function getFacturasProveedores() {
        return FacturasProveedores::all();
    }

}
