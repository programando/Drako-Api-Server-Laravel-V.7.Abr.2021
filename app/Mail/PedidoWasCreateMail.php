<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Helpers\DatesHelper;

use Storage ;
 

class PedidoWasCreateMail extends Mailable
{
    use Queueable, SerializesModels;
    public   $BodyTable,   $FchaFinReserva, $NumeroPedido, $NombreCliente, $VrTotalPedido ;
    
    public function __construct( $Data,  $Pedido, $PedidoDetalle, $Cliente )     {
        $this->NombreCliente  = $Cliente->pnombre . ' ' . $Cliente->papellido;
        $this->NumeroPedido   = $Pedido->idpedido;
        $this->VrTotalPedido  = number_format($Pedido->total, 0, "" ,".");
        $this->FchaFinReserva = DatesHelper::HumanDate( $Pedido->fcha_fin_reserva)  ;
        $this->BodyTable      = $this->buildTableOc ( $PedidoDetalle );
    }

    public function build()    {
            return $this->view('mails.terceros.PedidoWasCreatedMailView')
                        ->subject('Nuevo pedido creado - Drako-Autopartes');
    }


 
    private function buildTableOc ( $PedidoProductos ) {
        $Tabla          = '';
        foreach ($PedidoProductos as $Producto  ) {
                
                $Tabla =  $Tabla ."<tr style='border: black 1px solid;''>"  ;
                    $Tabla = $Tabla . "<td style='text-align: left; border: black 1px solid'>"      . number_format($Producto['cantidad'], 0, "" ,".")                          . "</td>" ;
                    $Tabla = $Tabla . "<td style='text-align: left; border: black 1px solid'>"      . trim($Producto['producto']['nombre_impreso'])                       . "</td>" ;
                    $Tabla = $Tabla . "<td style='text-align: right; border: black 1px solid'>"     . number_format($Producto['precioUnitario'], 0, "" ,".")    . "</td>" ;
                    $Tabla = $Tabla . "<td style='text-align: right; border: black 1px solid'>"     . number_format($Producto['subtotal'], 0, "" ,".")    . "</td>" ;
                    $Tabla = $Tabla . "<td style='text-align: right; border: black 1px solid'>"     . number_format($Producto['vr_iva'], 0, "" ,".")    . "</td>" ;
                    $Tabla = $Tabla . "<td style='text-align: right; border: black 1px solid'>"     . number_format($Producto['total'], 0, "" ,".")    . "</td>" ;
                    $Tabla = $Tabla . '</tr>';
        }
        return $Tabla;
    }


}
