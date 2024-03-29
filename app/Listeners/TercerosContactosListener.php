<?php

namespace App\Listeners;

use App\Mail\TercerosContactosMail;
use Illuminate\Support\Facades\Mail;
use App\Events\TercerosContactosEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TercerosContactosListener
{
    
    public function handle( TercerosContactosEvent $event)
    {
         
        $when           = now()->addSeconds(5); 
         Mail::to( env('EMAILS_CONTACTOS') )
            ->later( $when, new TercerosContactosMail ( 
                $event->nombre,
                $event->telefono,
                $event->celular,
                $event->comentario,
                $event->empresa,

        
        )); 
    }
}
 