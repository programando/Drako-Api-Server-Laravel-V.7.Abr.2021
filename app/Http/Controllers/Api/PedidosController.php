<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Pedido;
use App\Models\PedidosDt;
use App\Models\Producto;

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

        foreach ( $DetallePedido as $Registro=>$PedidosDt ) {
            $newPedidoDt                 = new PedidosDt;
            $newPedidoDt->idpedido       = $Pedido['idpedido'];
            $newPedidoDt->idproducto     = $PedidosDt['idproducto'];
            $newPedidoDt->idproducto_dt  = $PedidosDt['idproducto_dt'];
            $newPedidoDt->cantidad       = $PedidosDt['cantidad'];
            $newPedidoDt->precioUnitario = $PedidosDt['precioUnitario'];
            $newPedidoDt->iva            = $PedidosDt['iva'];
            $newPedidoDt->vr_iva         = $PedidosDt['iva']/100  * $PedidosDt['cantidad'] * $PedidosDt['precioUnitario'];
            $newPedidoDt->subtotal       = $PedidosDt['cantidad'] * $PedidosDt['precioUnitario'];
            $newPedidoDt->total          = $PedidosDt['cantidad'] * $PedidosDt['precioUnitario'] + $newPedidoDt->vr_iva ;
            $newPedidoDt->save();

            /*--------------------------------------------------------------------------------------*/
            $this->updateSaldoyReservaProducto ( $PedidosDt['idproducto'],$PedidosDt['cantidad'] );
            /*--------------------------------------------------------------------------------------*/
        }
        // ENVIA CORREO AL CLIENTE Y A DRAKO
        return $Pedido;
    }

    private function updateSaldoyReservaProducto ( $IdProducto, $Cantidad ) {
        $Producto                 = Producto::saldoPorIdProducto( $IdProducto  );
        $Producto->saldo          = $Producto->saldo - $Cantidad ;
        $Producto->cant_reservada = $Producto->cant_reservada + $Cantidad ;
        $Producto->update();
    }

 

    private function saldoVefiricarExistencias( $IdProducto,) {
        foreach ( $DetallePedido as $Registro=>$PedidosDt ) {
            $saldoProducto = Producto::saldoPorIdProducto( $IdProducto );
            return $saldoProducto;

            if ( $saldoProducto < $Registro['cantidad'] ) return "Inventario-NO-Disponible";
        }
        return "Inventario-SI-Disponible";
    }


}
