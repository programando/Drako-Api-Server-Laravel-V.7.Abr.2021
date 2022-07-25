<?php

namespace App\Listeners;

use config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\InvoiceEvent030AcuseReciboMail;
use App\Events\InvoiceEvent030AcuseReciboWasCreateEvent;

class InvoiceEvent030AcuseReciboWasCreateListener
{
 
    public function handle(InvoiceEvent030AcuseReciboWasCreateEvent $event)
    {
        $NumFact      = $event->Factura['prfjo_dcmnto'] .$event->Factura['nro_dcmnto'].";" ;
        $Company      = config('company.NIT').";".config('company.NOMBRE').";" ;
        $Event        = $event->EventNumber . ';' . $event->EventId .";" ;
        $EmailSubject = 'EVENTO;'. $NumFact .   $Company   . $Event ;

        $Emails         =   $event->Factura['emails']->unique('email')  ;     
        $when           = now()->addSeconds(5);
        
        Mail::to( $Emails )
                  ->later( $when,new InvoiceEvent030AcuseReciboMail(
                            $event->Factura ,
                            $event->FilePdf, $event->FileXml, 
                            $event->PathPdf, $event->PathXml,
                            $EmailSubject, 
                            $event->ZipPathFile, $event->ZipFile,
                            $event->UUID
                            ));


    }
}
