<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\OrdenesCompra  ;
use App\Events\ProveedoresOrdCpraReportedEvent;
use App\Traits\PdfsTrait;

use App\Helpers\DatesHelper;
use App\Helpers\GeneralHelper  ;

use Arrays;
Use Storage;
Use Carbon;

class OrdenesCompraController extends Controller
{
    use PdfsTrait;
   public function getOrdenesCompraInformarProveedor () {
        $OrdenesCompra = OrdenesCompra::getOrdenesCompraInformarProveedor () ;
        $NumerosOcs    = Arrays::getUniqueIdsFromArray ($OrdenesCompra  ,'numero');
        foreach ($NumerosOcs as $NumeroOC ) {
            foreach ($OrdenesCompra as $OrdenCompra ) {
                if ( $NumeroOC == $OrdenCompra->numero ) {
                    $this->getPdf($NumeroOC );
                    ProveedoresOrdCpraReportedEvent::dispatch ( $NumeroOC,$OrdenCompra, $OrdenesCompra) ;
                    OrdenesCompra::where('numero',$NumeroOC)->delete(); // Borrar el registro procesado
                    //Storage::disk('Files')->delete ( $NumeroOC.'.pdf');
                   break;
                }
            }//ordenes compra
        }//Numeros Oc
        return 'Ok-Ocs enviadas';
    }

    public function getPdf( $NumeroOC ) {
        
        $OrdenesCompra = OrdenesCompra::getOrdenesCompra ( $NumeroOC) ;
        $Fechas        = $this->FechasDocumento( $OrdenesCompra[0]['fecha'] , $OrdenesCompra[0]['fecha'] ) ;
        $Data          = compact('OrdenesCompra','Fechas');
        $PdfContent    = $this->pdfCreateFileTrait('pdfs.orden-compra', $Data);
        $PdfFile       = $OrdenesCompra[0]['numero'].'.pdf';
        Storage::disk('Files')->put( $PdfFile, $PdfContent);
    }


        private function FechasDocumento ( $Fecha_1, $Fecha_2) {
            $Fechas       = [];
            $FechaFactura = DatesHelper::DocumentDate( $Fecha_1  );  
            $FechaVcmto   = DatesHelper::DocumentDate( $Fecha_2 );
            $Fechas = [
                'FactDia'   => $FechaFactura->day,
                'FactMes'   => GeneralHelper::nameOfMonth( $FechaFactura->month),
                'Factyear'  => $FechaFactura->year,
                'VenceDia'  => $FechaVcmto->day,
                'VenceMes'  => GeneralHelper::nameOfMonth( $FechaVcmto->month),
                'VenceYear' => $FechaVcmto->year
            ];
            return $Fechas;
        }


}
