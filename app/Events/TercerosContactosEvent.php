<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TercerosContactosEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

  
     
    public $nombre,  $telefono,$celular  , $comentario ,  $empresa;
    public function __construct( $formDataContact  )
    {
        $this->celular    = $formDataContact->celular;
        $this->comentario = $formDataContact->comentario;
        $this->empresa    = $formDataContact->empresa;
        $this->nombre     = $formDataContact->nombre;
        $this->telefono   = $formDataContact->telefono;

        
         
    }  
}
//