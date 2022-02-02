<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProveedoresSendOrdCpra extends Mailable
{
    use Queueable, SerializesModels;
    public $Numero, $Fecha, $SubTotal, $Iva, $Total, $Observaciones, $Proveedor, $BodyTable;
    
    public function __construct( $Numero, $OrdenesCompra )     {
        $this->BodyTable = $this->buildTableOc ( $Numero, $OrdenesCompra );
    }

    public function build()    {
            return $this->view('mails.terceros.proveedoresOrdenCompra')
                        ->subject('Orden de compra - Drako-Autopartes');
            
    }


 
    private function buildTableOc ( $Numero, $Ordenes ) {
        $Tabla          = '';
        $Num            = 1;
        foreach ($Ordenes as $Orden ) {
            if ( $Orden->numero == $Numero ) {
                $Tabla =  $Tabla ."<tr>"  ;
                    $Tabla = $Tabla . "<td style='text-align: right;'>" . $Num       . "</td>" ;
                    $Tabla = $Tabla . "<td>" . $Orden->producto       . "</td>" ;
                    $Tabla = $Tabla . "<td style='text-align: right;'>" . $Orden->cantidad       . "</td>" ;
                    $Tabla = $Tabla . "<td style='text-align: right;'>" . number_format($Orden->vr_unitario, 0, "" ,".")       . "</td>" ;
                    $Tabla = $Tabla . "<td style='text-align: right;'>" . number_format($Orden->vr_item, 0, "" ,".")        . "</td>" ;
                    $Tabla = $Tabla . '</tr>';
                    $Num++;
                    $this->Fecha         = $Orden->fecha ;
                    $this->Iva           = number_format($Orden->iva  , 0, "" ,".");
                    $this->Numero        = $Orden->numero ;
                    $this->Observaciones = trim( $Orden->observaciones) ;
                    $this->Proveedor     = trim( $Orden->proveedor) ;
                    $this->SubTotal      = number_format($Orden->sub_total , 0, "" ,".");
                    $this->Total         = number_format($Orden->total, 0, "" ,".") ;
            }
        }
        return $Tabla;
    }
}
