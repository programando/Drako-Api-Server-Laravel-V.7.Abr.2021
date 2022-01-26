<?php

namespace App\Listeners;

use App\Mail\ProveedoresSendOrdCpra;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\ProveedoresOrdCpraReportedEvent;

class ProveedoresOrdCpraReportedListener
{
    
    public function handle(ProveedoresOrdCpraReportedEvent $event)
    {
        $Emails = [];
        if ( !empty( $event->Email_Asesor))         array_push ($Emails, $event->Email_Asesor );
        if ( !empty( $event->Email_Proveedor))      array_push ($Emails, $event->Email_Proveedor );
        array_push ($Emails, config('company.EMAILS_EMPRESA'));
       
         Mail::to( $Emails)
            ->queue(   new  ProveedoresSendOrdCpra (  $event->Numero, $event->OrdenesCompra  ));
    }
}

 
                    