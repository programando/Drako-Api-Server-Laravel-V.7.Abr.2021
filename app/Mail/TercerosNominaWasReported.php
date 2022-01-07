<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TercerosNominaWasReported extends Mailable
{
    use Queueable, SerializesModels;

      public $Empleados, $BodyTable ;
    public function __construct( $Empleados)
    {
        $this->Empleados = $Empleados ;
        $Tabla = '';
        foreach ($this->Empleados as $Empleado ) {
            $Tabla   =  $Tabla ."<tr>" ;
            $Tabla   = $Tabla . "<td>" . trim( $Empleado        )    . "</td>" ;
            $Tabla   = $Tabla . '</tr>';
        }
        $this->BodyTable = $Tabla ;
    }

    
    public function build()
    {
        return $this->view('mails.terceros.nomina')
        ->from( 'jhonjamesmg@hotmail.com', 'nómina' )
        ->subject('Reporte nómina') ;
    }
}
