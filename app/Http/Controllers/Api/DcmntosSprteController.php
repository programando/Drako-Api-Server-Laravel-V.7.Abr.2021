<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Traits\ApiSoenac;
use App\Traits\PdfsTrait;
use App\Traits\QrCodeTrait;
use App\Traits\FctrasElctrncasTrait;
use App\Traits\DocsSoporteTrait;

use App\Helpers\DatesHelper;
use App\Helpers\GeneralHelper  ;

use App\Models\FctrasElctrnca   ;
use App\Models\FctrasElctrncasMcipio;
use App\Models\DcmntosSprteWithholdingTaxTotal;
 
use App\Events\InvoiceWasCreatedEvent;


Use Storage;
Use Carbon;


class DcmntosSprteController extends Controller {

    use FctrasElctrncasTrait, ApiSoenac, QrCodeTrait, PdfsTrait, DocsSoporteTrait;
    private $jsonObject = [] , $jsonResponse = []; 

    public function documentosSoporte () {
        $URL        = 'document-support' ;
        $Documentos = FctrasElctrnca::DocumentosSoporteToSend();
         
        foreach ($Documentos as $Documento ) {
            $this->reportingInformation ( $Documento );
            $response   = $this->ApiSoenac->postRequest( $URL, $this->jsonObject) ;  
             
            return  $response ;
            //$this->documentsProcessReponse( $Empleado['id_nomina_elctrnca'], $response ) ;
        }
 
        return $Documentos;
    }


    private function reportingInformation ( $DocSoporte ) {
        $this->jsonObject   = [];
        $id_fact_elctrnca = $DocSoporte['id_fact_elctrnca'];    
        $otherData          = FctrasElctrnca::with('customer', 'docsSoporteRetenciones', 'total','products')->where('id_fact_elctrnca','=', $id_fact_elctrnca)->get();  
       
        $this->jsonObjectCreate ( $DocSoporte,  $otherData  )   ;
   }


   private function jsonObjectCreate ( $DocSoporte, $otherData ) {
   
        $this->DocSoporteHeaderTrait                ( $DocSoporte                               ,  $this->jsonObject                            )   ;  
        $this->DocSoporteResolutionTrait            ( $this->jsonObject                                                                         )   ;  
        $this->DocSoporteEnvironmentTrait           ( $this->jsonObject                                                                         )   ;
        $this->traitCustomer                        ( $otherData[0]['customer']                 , $this->jsonObject                             )   ;   
        $this->DocSoporteWithHoldingTaxTotalsTrait  ( $otherData[0]['docsSoporteRetenciones']   , $this->jsonObject, 'withholding_tax_totals'   )   ;
        $this->DocSoporteLegalMonetaryTotalsTrait   ( $otherData[0]['total']                    , $this->jsonObject, 'legal_monetary_totals'    )   ;
        $this->DocSoporteInvoiceLinesTrait          ( $otherData[0]['products']                 , $this->jsonObject, 'invoice_lines'            )   ; 
       
   }




}