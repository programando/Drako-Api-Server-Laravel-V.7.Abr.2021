<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

use App\Traits\ApiSoenac;
use App\Traits\PdfsTrait;
use App\Traits\QrCodeTrait;
use App\Traits\FctrasElctrncasTrait;

use App\Helpers\DatesHelper;
use App\Helpers\GeneralHelper  ;

use App\Models\FctrasElctrnca   ;
use App\Models\FctrasElctrncasMcipio;
 
use App\Events\InvoiceWasCreatedEvent;


Use Storage;
Use Carbon;


class FctrasElctrncasInvoicesController  
{
   use FctrasElctrncasTrait, ApiSoenac, QrCodeTrait, PdfsTrait;

   private $jsonObject = [] , $jsonResponse = []; 
  

    public function invoicesReceived() {
        $URL = 'receptions' ;
        return  $this->ApiSoenac->postRequest( $URL , $this->jsonResponse ) ;     
    }


    public function searchInvoceByUuid ( request $FormData ){
        return FctrasElctrnca::with('customer', 'total', 'events')->where('uuid', $FormData->uuid)->first();
    }

    public function sentInvoicesLogs (Request $FormData) {
        $prfjo_dcmnto = trim( $FormData->prfjo_dcmnto);
        $nro_dcmnto   = $FormData->nro_dcmnto;
        $partUrl      = "logs/$prfjo_dcmnto$nro_dcmnto";
        $response     = $this->ApiSoenac->postRequest( $partUrl, $this->jsonResponse ) ;   
        $Documento    = FctrasElctrnca::where('prfjo_dcmnto', "$prfjo_dcmnto")
                                        ->where('nro_dcmnto',$nro_dcmnto  ) ->first();
            
        $this->documentsProcessReponse( $Documento, $response[0] ) ;
    }


    public function invoiceList(){
        return FctrasElctrnca::documentsList();
    }

    public function FacturasPosUltimos3Dias(){
        return FctrasElctrnca::FacturasPosUltimos3Dias();
    }


    public function invoices() {
        $URL = 'invoice' ;
        $Documentos = FctrasElctrnca::InvoicesToSend()->get();  
        
            foreach ($Documentos as $Documento ) {
            $this->invoicesToSend ( $Documento) ;
            $response = $this->ApiSoenac->postRequest( $URL, $this->jsonObject ) ;
            $this->traitUpdateJsonObject ( $Documento );
            $this->documentsProcessReponse( $Documento, $response ) ;
            //return  $this->jsonObject;
        }   
    }

    private function invoicesToSend ($Facturas)  {
        $this->jsonObject = [];
        $id_fact_elctrnca = $Facturas['id_fact_elctrnca'];    
        $otherDataInvoice = FctrasElctrnca::with('customer','total', 'products', 'emails')->where('id_fact_elctrnca','=', $id_fact_elctrnca)->get();
        $this-> jsonObjectCreate ($Facturas , $otherDataInvoice     );
    }

    private function jsonObjectCreate ( $invoce,  $Others ) {
            $this->traitDocumentHeader              ( $invoce , $this->jsonObject    );
            $this->traitEmailSend                   ( $Others[0]['emails']    , $this->jsonObject   );
            $this->traitNotes                       ( $invoce    , $this->jsonObject   );
            $this->traitOrderReference              ( $invoce    , $this->jsonObject   );
            $this->traitReceiptDocumentReference    ( $invoce    , $this->jsonObject   );
            $this->traitCustomer                    ( $Others[0]['customer']  , $this->jsonObject   );
            $this->traitPaymentForms                ( $invoce  , $this->jsonObject   );
            $this->traitLegalMonetaryTotals         ( $Others[0]['total']     , $this->jsonObject, 'legal_monetary_totals' );
            $this->traitInvoiceLines                ( $Others[0]['products']  , $this->jsonObject, 'invoice_lines'   );
            unset( $this->jsonObject['billing_reference']);
            unset( $this->jsonObject['discrepancy_response']);// No los necesito para facturas
        }


    
        private  function documentsProcessReponse($Documento,  $response ){
        $id_fact_elctrnca           = $Documento['id_fact_elctrnca']  ;
        if ( array_key_exists('is_valid',$response) ) {
            $this->responseContainKeyIsValid ( $id_fact_elctrnca, $response );                   
        } else {       
            $this->traitdocumentErrorResponse( $id_fact_elctrnca, $response ); 
        }
    }

    private function responseContainKeyIsValid($idfact_elctrnca , $response ){
        if ( $response['is_valid'] == true || is_null( $response['is_valid'] ) ) {
            $this->traitDocumentSuccessResponse    ( $idfact_elctrnca , $response );
            $this->traitFctrasDataReponseNewRecord ( $idfact_elctrnca , $response );
            $this->invoiceSendToCustomer  ( $idfact_elctrnca ); 
        }else {
            $this->traitdocumentErrorResponse( $idfact_elctrnca, $response );     
        }
    }

    public function invoiceSendToCustomer ( $id_fact_elctrnca ) {
        $Factura      = $this->invoiceSendGetData ( $id_fact_elctrnca, false) ; 
        InvoiceWasCreatedEvent::dispatch          ( $Factura ) ; 
        return "ok";
    }


    private function invoiceSendGetData ( $id_fact_elctrnca, $IsFacturaPos ) {
        $Factura = FctrasElctrnca::with('customer','total', 'products', 'emails','additionals', 'serviceResponse', 'taxes')->where('id_fact_elctrnca','=', $id_fact_elctrnca)->get();
        
        $Factura = $Factura[0];
        $this->getNameFilesTrait($Factura );
        $this->invoiceCreateFilesToSend  ( $id_fact_elctrnca,  $Factura, $IsFacturaPos   );
        return $Factura;
    }

        
    public function invoiceFileDownload ( $fileType, $id_fact_elctrnca ) {
        
        $this->invoiceSendGetData ( $id_fact_elctrnca, false) ;
        if ( strtoupper( $fileType) == 'PDF') {
            return response()->download( Storage::disk('Files')->path( $this->PdfFile ) )->deleteFileAfterSend();
        }else {
            return response()->download( Storage::disk('Files')->path( $this->XmlFile ) )->deleteFileAfterSend();
        }
    }

    private function invoiceCreateFilesToSend ( $id_fact_elctrnca,  $Factura, $IsFacturaPos =false  ){
        $Resolution   = $this->traitSoenacResolutionsInvoice();                
        if ( $IsFacturaPos == false ) {
            $this->saveInvoicePfdFile   ( $Resolution, $Factura );
            $this->saveInvoiceXmlFile   ( $Factura              );
        }else {
            $this->savePosInvoicePfdFile   ( $Resolution, $Factura );
        }
        
    }

    private function savePosInvoicePfdFile  ( $Resolution, $Factura   ){  
            
        $Fechas          = $this->FechasFacturaTrait ( $Factura['fcha_dcmnto'], $Factura['due_date'] );
        $Customer        = $Factura['customer'];
        $Products        = $Factura['products'];
        $Totals          = $Factura['total'];
        $Additionals     = $Factura['additionals'];
        $Taxes           = $Factura['taxes'];
        $ServiceResponse = $Factura['serviceResponse'];

        $CantProducts    = $Products->count();
        $CodigoQR        = $this->QrCodeGenerateTrait( $ServiceResponse['qr_data'] );
        $Data            = compact('Resolution', 'Fechas', 'Factura','Customer', 'Products','CantProducts', 'Totals','CodigoQR', 'Additionals','Taxes' );
        $PdfContent      = $this->pdfCreatePosFileTrait('pdfs.pos', $Data);
        
        Storage::disk('Files')->put( $this->PdfFile, $PdfContent);
        
        
    }

    private function saveInvoicePfdFile  ( $Resolution, $Factura   ){  
            
        $Fechas          = $this->FechasFacturaTrait ( $Factura['fcha_dcmnto'], $Factura['due_date'] );
        $Customer        = $Factura['customer'];
        $Products        = $Factura['products'];
        $Totals          = $Factura['total'];
        $Additionals     = $Factura['additionals'];
        $Taxes           = $Factura['taxes'];
        $ServiceResponse = $Factura['serviceResponse'];

        $CantProducts    = $Products->count();
        $CodigoQR        = $this->QrCodeGenerateTrait( $ServiceResponse['qr_data'] );
        $Data            = compact('Resolution', 'Fechas', 'Factura','Customer', 'Products','CantProducts', 'Totals','CodigoQR', 'Additionals','Taxes' );
        $PdfContent      = $this->pdfCreateFileTrait('pdfs.invoice', $Data);
        Storage::disk('Files')->put( $this->PdfFile, $PdfContent);
    }

    private function saveInvoiceXmlFile ( $Factura) {
        $Factura      = $Factura['serviceResponse'];
        $base64_bytes = $Factura['attached_document_base64_bytes'];
        Storage::disk('Files')->put( $this->XmlFile, base64_decode($base64_bytes));
    }

        
    public function PrintPosDocument ( request $FormData ) {
        $Factura      = $this->invoiceSendGetData ( $FormData->id_fact_elctrnca, true) ; 

        $filePath = 'public/documents/' . $this->PdfFile; // Asegúrate de que esta ruta sea correcta
         
        return response()->json(['url' => url(Storage::url($filePath))]);
    }

    public function invoiceAccepted ( $Token ) {          
        $this->customerResponse ( $Token, 'ACEPTADA');
        return redirect('/');
    }

    public function invoiceRejected ( $Token  ){
        $this->customerResponse ( $Token, 'RECHAZADA');
        return redirect('/');
    }
 
 
    private function customerResponse ( $Token, $Reponse ) {
        $Factura      = FctrasElctrnca::where('cstmer_token', "$Token")->first();
        if ( empty( $Factura['cstmer_rspnse'] ) ) {
            $Factura->cstmer_rspnse      = $Reponse;
            $Factura->cstmer_rspnse_date = now();
            $Factura->update();
        } 
    }


 
 
}
