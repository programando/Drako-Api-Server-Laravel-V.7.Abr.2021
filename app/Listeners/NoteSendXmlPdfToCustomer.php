<?php

namespace App\Listeners;

use App\Events\NoteWasCreatedEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\CreditNoteSentToCustomerMail;
use Illuminate\Contracts\Queue\ShouldQueue;

class NoteSendXmlPdfToCustomer
{
     
    public function handle(NoteWasCreatedEvent $event) {
        
        $EmailSubject   = config('companyEMPRESA_.NIT').";".config('company.EMPRESA_NOMBRE').";".$event->Note['prfjo_dcmnto'] .$event->Note['nro_dcmnto'] ;
        $EmailSubject  .= ';91;'.config('company.EMPRESA_NOMBRE');

        $Emails =   $event->Note['emails']->unique('email')  ;     
        $when   = now()->addSeconds(5);
        Mail::to( $Emails )
                  ->cc('frenostoro1@hotmail.com')
                  ->later( $when,new CreditNoteSentToCustomerMail(
                            $event->Note ,
                            $event->FilePdf, $event->FileXml, 
                            $event->PathPdf, $event->PathXml,
                            $EmailSubject, 
                            $event->ZipPathFile, $event->ZipFile
                            ));
    }
}
