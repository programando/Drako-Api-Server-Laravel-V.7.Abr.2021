<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProveedoresOrdCpraReportedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $Numero, $OrdenCompra, $OrdenesCompra,$Email_Asesor, $Email_Proveedor ;
  
    public function __construct( $Numero, $OC, $OCS )
    {
        $this->Numero          = $Numero;
        $this->OrdenesCompra   = $OCS ;
        $this->Email_Asesor    = $OC->email_asesor;
        $this->Email_Proveedor = $OC->email_proveedor;
                    
    }

   
}
