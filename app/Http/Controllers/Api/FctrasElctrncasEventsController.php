<?php

namespace App\Http\Controllers\Api;

use App\Traits\ApiSoenac;
use App\Traits\PdfsTrait;

use App\Traits\QrCodeTrait;
use App\Helpers\DatesHelper;
use Illuminate\Http\Request;
use App\Helpers\GeneralHelper  ;
use App\Models\FctrasElctrnca   ;
use App\Http\Controllers\Controller;

use App\Traits\FctrasElctrncasTrait;
use App\Models\FctrasElctrncasEvent   ;
use App\Events\InvoiceEvent030AcuseReciboWasCreateEvent;
use Storage;
use Carbon;


class FctrasElctrncasEventsController extends Controller
{
    use FctrasElctrncasTrait, ApiSoenac, QrCodeTrait, PdfsTrait;
    private $jsonObject = [] , $jsonResponse = []; 


    public function acuseRecibo(request $FormData) {
       $partUrl = 'event/030';
       $Factura = FctrasElctrnca::with('customer')->InvoicesSearchDataByUUID ($FormData->uuid ) ;
  
       $this->getJsonAcuse (  $Factura  ) ;
       //return $this->jsonObject ;
       $response = '';
       //$response        = $this->ApiSoenac->postRequest( $partUrl, $this->jsonObject ) ;
       $isValidResponse = $this->processEventResponse ( $response , $Factura[0]);
    
       return   $isValidResponse ;
    }


    private function _030AcuseReciboSendEmail ( $id_fact_elctrnca) {
            $Resolution = $this->traitSoenacResolutionsInvoice();
            $Factura    = FctrasElctrnca::with('customer','total', 'products', 'emails','additionals', 'eventsResponse030', 'serviceResponse')->where('id_fact_elctrnca','=', $id_fact_elctrnca)->get();
            $Factura    = $Factura[0];

            $this->getNameFilesTrait($Factura );           
            $this->saveInvoicePfdFile   ( $Resolution, $Factura );
            $this->saveInvoiceXmlFile   ( $Factura              );
            return $Factura;
         

    }

// TODO ... 'E0301800',1800, REEMPLAZAR DE LA RESPUESTA
    private function processEventResponse ( $response, $Factura) {
        //Valid response
        $id_fact_elctrnca = $Factura['id_fact_elctrnca'] ;
        $this->_030AcuseReciboUpdateValidResponse   ( $id_fact_elctrnca  );
        $this->_030AcuseReciboSendEmail             ( $id_fact_elctrnca  );
         InvoiceEvent030AcuseReciboWasCreateEvent::dispatch ( $Factura, 'E0301800',1800);
        return ;
        if ( array_key_exists('is_valid',$response) && $response['is_valid'] == true) {
            // Todos Ok
        } else {
            return "eeror";
        }
    }


    private function _030AcuseReciboUpdateValidResponse ( $id_fact_elctrnca ) {    
        $EventExists = FctrasElctrncasEvent::where('id_fact_elctrnca', $id_fact_elctrnca)
                                            ->where('event_030_acse_rbo','1')->first();
       if ( $EventExists)      return ;

       $FctrasElctrncasEvent =  FctrasElctrncasEvent::where('id_fact_elctrnca',$id_fact_elctrnca  )->first();
       $FctrasElctrncasEvent->event_030_acse_rbo = true ;
       $FctrasElctrncasEvent->event_030_fcha = Carbon::now() ;
       $FctrasElctrncasEvent->update();
    }



    private function getJsonAcuse( $Document ) {
        $environment = ["type_environment_id" => 2];
        $Customer    = $Document[0]['customer'];
        $Person      = [
            "type_document_identification_id" => $Customer['type_document_identification_id'],
            "identification_number"           => $Customer['identification_number'],
            "first_name"                      => $Customer['name'],
            "family_name"                     => "N/A",
            "job_title"                       => "N/A",
            "organization_department"         => "N/A"
        ];
        $jsonData= [
            'number'      => $Document[0]['number'],
            'uuid'        => $Document[0]["uuid"],
            'sync'        => true,
            'person'      => $Person
          ] ;
        $this->jsonObject = $jsonData;
    }


    private function saveInvoicePfdFile  ( $Resolution, $Factura   ){           
        $Fechas          = $this->FechasFacturaTrait ( $Factura['fcha_dcmnto'], $Factura['due_date'] );
        $Customer        = $Factura['customer'];
        $Products        = $Factura['products'];
        $Totals          = $Factura['total'];
        $Additionals     = $Factura['additionals'];
        $ServiceResponse = $Factura['serviceResponse'];
        $CantProducts    = $Products->count();         
        $CodigoQR        = $this->QrCodeGenerateTrait( $ServiceResponse['qr_data'] );
        $Data            = compact('Resolution', 'Fechas', 'Factura','Customer', 'Products','CantProducts', 'Totals','CodigoQR', 'Additionals' );
        $PdfContent      = $this->pdfCreateFileTrait('pdfs.invoice', $Data);
        Storage::disk('Files')->put( $this->PdfFile, $PdfContent);
    }

    private function saveInvoiceXmlFile ( $Factura) {
        $base64_bytes = $Factura['attached_document_base64_bytes'];
        Storage::disk('Files')->put( $this->XmlFile, base64_decode($base64_bytes));
    }



    /*{
    "is_valid": false,
    "is_restored": null,
    "algorithm": null,
    "class": "Event",
    "number": "E0301800",
    "uuid": null,
    "issue_date": null,
    "expedition_date": null,
    "zip_key": null,
    "status_code": "89",
    "status_description": "NIT 10485950 no autorizado a enviar documentos para emisor con NIT 10496258.",
    "status_message": null,
    "mail_sending_message": null,
    "errors_messages": [],
    "xml_name": null,
    "zip_name": null,
    "signature": null,
    "qr_code": null,
    "qr_data": null,
    "qr_link": null,
    "pdf_download_link": null,
    "xml_base64_bytes": null,
    "application_response_base64_bytes": null,
    "attached_document_base64_bytes": null,
    "pdf_base64_bytes": null,
    "zip_base64_bytes": null,
    "type_environment_id": 1,
    "payload": {
        "number": 1800,
        "uuid": "e00c88096c7a4216cdb1ca216ac5b4d406d81f30788fa9c852a7a60481a946f783afffd8711d86b3966ada6213b2ffd4",
        "sync": true,
        "person": {
            "type_document_identification_id": 3,
            "identification_number": 10496258,
            "first_name": "JAVIER BANGUERO",
            "family_name": "N/A",
            "job_title": "N/A",
            "organization_department": "N/A"
        }
    }
}
*/




}
