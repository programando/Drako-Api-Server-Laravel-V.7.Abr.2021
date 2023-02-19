<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PedidoWasCreateEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public   $EmailCliente, $Pedido, $PedidoDetalle, $Cliente;
    public function __construct( $Pedido )
    {

        $this->EmailCliente = $Pedido->cliente['email'];
        $this->Cliente       = $Pedido->cliente;
        $this->Pedido        = $Pedido;
        $this->PedidoDetalle = $Pedido->detallePedido;
         
    }


 

}
