<?php

namespace App\Listeners;

use App\Mail\PedidoWasCreateMail;
use App\Events\PedidoWasCreateEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PedidoWasCreateListener
{

    public function handle(PedidoWasCreateEvent $event)
    {
         
         $Emails = [];
         array_push ($Emails, config('company.EMAILS_EMPRESA'));
         array_push ($Emails, $event->EmailCliente);
        Mail::to( $Emails)
            ->queue(   new  PedidoWasCreateMail ( $event, $event->Pedido, $event->PedidoDetalle, $event->Cliente ));
    }

 
    
}
