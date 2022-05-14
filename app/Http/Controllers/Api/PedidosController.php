<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Pedido;
use App\Models\PedidosDt;

class PedidosController extends Controller
{
    public function pedidoNuevoRegistro ( request $FormData ) {
        $Pedido = new Pedido;
        $Pedido->idtercero        = $FormData->idtercero ;
        $Pedido->fcha_pedido      = Carbon::now('UTC');
        $Pedido->horas_reserva    = $FormData->horas_reserva ;
        $Pedido->fcha_fin_reserva = Carbon::now('UTC')->addHours( $FormData->horas_reserva);
        $Pedido->subtotal         = $FormData->subtotal ;
        $Pedido->iva              = $FormData->iva ;
        $Pedido->flete            = $FormData->flete ;
        $Pedido->total            = $FormData->total ;
        $Pedido->save();
         
        $DetallePedido =  $FormData->get('detallePedido');

        foreach ( $DetallePedido as $PedidosDt=>$Registro ) {
            $PedidoDt                 = new PedidosDt;
            $PedidoDt->idpedido       = $Pedido['idpedido'];
            $PedidoDt->idproducto     = $Registro['idproducto'];
            $PedidoDt->idproducto_dt  = $Registro['idproducto_dt'];
            $PedidoDt->cantidad       = $Registro['cantidad'];
            $PedidoDt->precioUnitario = $Registro['precioUnitario'];
            $PedidoDt->iva            = $Registro['iva'];
            $PedidoDt->vr_iva         = $Registro['iva']/100  * $Registro['cantidad'] * $Registro['precioUnitario'];
            $PedidoDt->subtotal       = $Registro['cantidad'] * $Registro['precioUnitario'];
            $PedidoDt->total          = $Registro['cantidad'] * $Registro['precioUnitario'] + $PedidoDt->vr_iva ;
            $PedidoDt->save();
        }
        // ENVIA CORREO AL CLIENTE Y A DRAKO
        return $Pedido;
    }
}
