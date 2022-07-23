<?php

namespace App\Mail;

use config;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvoiceSendToCustomerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $Factura;
    public $FilePdf, $FileXml, $PathPdf, $PathXml, $ZipFile, $ZipPathFile;
    public $subject,   $SPA_Url_Factura;
 
    public function __construct( $DatosToEmail, $FilePdf, $FileXml, $PathPdf, $PathXml, $subject, $ZipPathFile, $ZipFile, $UUID ) {
        $this->Factura     = $DatosToEmail;
        $this->FilePdf     = $FilePdf;
        $this->FileXml     = $FileXml;
        $this->PathPdf     = $PathPdf;
        $this->PathXml     = $PathXml;
        $this->subject     = $subject;
        $this->ZipFile     = $ZipFile;
        $this->ZipPathFile = $ZipPathFile;
       
        $this->SPA_Url_Factura     = config('company.URL_SPA_NUXT'). "documentos/electronicos/factura/$UUID ";

    
         
    }

     public function build()  {        
         return $this->subject( $this->subject)->view('mails.invoices.ToCustomer')
                     ->attach(  $this->ZipPathFile, [ 'as' => $this->ZipFile, 'mime' => 'application/zip']);
    }

 

}
