<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Municipio as Municipios;

class MunicipiosController extends Controller {
    
    public function listadoActivos () {
        return Municipios::where('inactivo','1')->get();
    }



    
}
