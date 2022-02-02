<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\OrdenesCompra  ;
use App\Events\ProveedoresOrdCpraReportedEvent;
use Arrays;

class OrdenesCompraController extends Controller
{
    
   public function getOrdenesCompraInformarProveedor () {
        $OrdenesCompra = OrdenesCompra::getOrdenesCompraInformarProveedor () ;
        $NumerosOcs    = Arrays::getUniqueIdsFromArray ($OrdenesCompra  ,'numero');
        foreach ($NumerosOcs as $NumeroOC ) {
            foreach ($OrdenesCompra as $OrdenCompra ) {
                if ( $NumeroOC == $OrdenCompra->numero ) {
                   ProveedoresOrdCpraReportedEvent::dispatch ( $NumeroOC,$OrdenCompra, $OrdenesCompra) ;
                   OrdenesCompra::where('numero',$NumeroOC)->delete(); // Borrar el registro procesado
                   exit;
                }
            }//ordenes compra
        }//Numeros Oc
        return 'Ok-Ocs enviadas';
    }

}
