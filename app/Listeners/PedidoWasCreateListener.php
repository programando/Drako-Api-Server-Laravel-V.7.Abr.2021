<?php

namespace App\Listeners;

use App\Events\PedidoWasCreateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PedidoWasCreateListener
{

    public function handle(PedidoWasCreateEvent $event)
    {
        //
    }


    /*
        public function handle( TercerosContactosEvent $event)
    {
        
        $when           = now()->addSeconds(3); 
         Mail::to( env('EMAILS_CONTACTOS') )
            ->later( $when, new TercerosContactosMail (  $event->email, $event->comentario )); 
    }
    */

    
}
