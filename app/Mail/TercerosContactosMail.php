<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TercerosContactosMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nombre,  $telefono,$celular  , $comentario ,  $empresa ; 
    public function __construct( $nombre,  $telefono,$celular  , $comentario ,  $empresa)
    {
        
        $this->nombre     = $nombre;
        $this->telefono   = $telefono;
        $this->celular    = $celular;
        $this->comentario = $comentario;
        $this->empresa    = $empresa;   
    }
   
 
    public function build()
    {   
        $customerName   = 'Contactar a :' . $this->nombre  ;
        $subject        = 'Contacto comercial';
        return $this->view('mails.terceros.contactos')
                ->from( config('company.EMAILS_EMPRESA') )
                ->subject($subject) ;
    }
}
