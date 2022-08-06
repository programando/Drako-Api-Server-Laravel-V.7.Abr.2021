<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\ApiSoenac;
use App\Traits\FctrasElctrncasTrait;
use App\Models\FctrasElctrncasEvent   ;

use Storage;
use Carbon;


class FctrasElctrncasEventsController extends Controller
{
    use FctrasElctrncasTrait, ApiSoenac ;
    private $jsonObject = [] , $jsonResponse = []; 



    public function documentStatus ( request $FormData) {
        $partUrl  = 'receptions/' . "$FormData->uuid";
        $response        = $this->ApiSoenac->postRequest( $partUrl, '' ) ;
        return   $response  ;        
    }
    
    public function documentosRecepcionados(  ){
        $partUrl  = 'receptions';
        $response        = $this->ApiSoenac->postRequest( $partUrl, '' ) ;
        return   $response  ;
    }


    public function acuseRecibo(request $FormData) {
        $response = '';
        $partUrl  = 'event/030';
        $Number   = FctrasElctrncasEvent::maxId();
        $this->getJsonAcuse ( $FormData->uuid, $Number  ) ;
        $response        = $this->ApiSoenac->postRequest( $partUrl, $this->jsonObject ) ;
        $isValidResponse = $this->processEventResponse ( $response, $FormData->uuid,'030'  );
        return   $response  ;
    }


    public function rechazoReclamo(request $FormData) {
        $response = '';
        $partUrl  = 'event/031';
        $Number   = FctrasElctrncasEvent::maxId();
        $this->getJsonAcuse ( $FormData->uuid, $Number  ) ;
        $response        = $this->ApiSoenac->postRequest( $partUrl, $this->jsonObject ) ;
        $isValidResponse = $this->processEventResponse ( $response, $FormData->uuid, '031'  );
        return   $response['expedition_date'] ;
    }

    public function reciboBienServicio(request $FormData) {
        $response = '';
        $partUrl  = 'event/032';
        $Number   = FctrasElctrncasEvent::maxId();
        $this->getJsonAcuse ( $FormData->uuid, $Number  ) ;
        $response        = $this->ApiSoenac->postRequest( $partUrl, $this->jsonObject ) ;
        $isValidResponse = $this->processEventResponse ( $response, $FormData->uuid, '032'  );
        return   $response ;
    }

    public function aceptacionExpresa(request $FormData) {
        $response = '';
        $partUrl  = 'event/033';
        $Number   = FctrasElctrncasEvent::maxId();
        $this->getJsonAcuse ( $FormData->uuid, $Number  ) ;
        $response        = $this->ApiSoenac->postRequest( $partUrl, $this->jsonObject ) ;
        $isValidResponse = $this->processEventResponse ( $response, $FormData->uuid, '033'  );
        return   $response ;
    }


    private function processEventResponse ( $response, $UUID, $CodeEvent ) {
       if ( array_key_exists('is_valid',$response) && $response['is_valid'] == true) {
            $this->saveNewResponse   ( $response, $UUID,$CodeEvent );
        } else {
            return "eeror";
        }
    }


    private function saveNewResponse ( $response, $UUIDDoc, $CodeEvent) {    
       $FctrasElctrncasEvent                        = new FctrasElctrncasEvent;
       $FctrasElctrncasEvent->fcha_rgstro           = Carbon::now(); ;
       $FctrasElctrncasEvent->event_code            = $CodeEvent;
       $FctrasElctrncasEvent->event_expedition_date = $response['expedition_date'] ;
       $FctrasElctrncasEvent->event_status_message  = $response['status_message'] ;
       $FctrasElctrncasEvent->uuid_document         = $UUIDDoc;
       $FctrasElctrncasEvent->uud_response          = $response['uuid'];  
       $FctrasElctrncasEvent->save();
    }


   


    private function getJsonAcuse( $UUID, $Number ) {

        $jsonData= [
            'number'      => $Number,
            'uuid'        => $UUID,
            'sync'        => true,
            'person'      => $this->getPersonObject ()
          ] ;
        $this->jsonObject = $jsonData;
    }

    private function getPersonObject() {
        return  [
            "type_document_identification_id" => '3',
            "identification_number"           => '34599831',
            "first_name"                      => 'MARÍA',
            "family_name"                     => "MARTÍNEZ",
            "job_title"                       => "N/A",
            "organization_department"         => "N/A"
        ];

    }


}
