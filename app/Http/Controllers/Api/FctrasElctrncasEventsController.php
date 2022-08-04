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


    public function acuseRecibo(request $FormData) {
        $response = '';
        $partUrl  = 'event/030';
        $Number   = FctrasElctrncasEvent::maxId();
        $this->getJsonAcuse ( $FormData->uuid, $Number  ) ;
        $response        = $this->ApiSoenac->postRequest( $partUrl, $this->jsonObject ) ;
        $isValidResponse = $this->processEventResponse ( $response, $FormData->uuid  );
        return   $response['expedition_date'] ;
    }

    private function processEventResponse ( $response, $UUID) {
       if ( array_key_exists('is_valid',$response) && $response['is_valid'] == true) {
            $this->_030AcuseReciboUpdateValidResponse   ( $response);
        } else {
            return "eeror";
        }
    }


    private function _030AcuseReciboUpdateValidResponse ( $response) {    
        $UUID = $response['uuid'];
        $EventExists = FctrasElctrncasEvent::where('uuid', "$UUID")->where('event_030_acse_rbo','1')->first();
       if ( $EventExists)      return ;

       $FctrasElctrncasEvent                     = new FctrasElctrncasEvent;
       $FctrasElctrncasEvent->uuid               = $UUID;
       $FctrasElctrncasEvent->event_030_acse_rbo = true ;
       $FctrasElctrncasEvent->event_030_fcha     = $response['expedition_date'] ;
       $FctrasElctrncasEvent->fcha_rgstro        = Carbon::now(); ;
       $FctrasElctrncasEvent->save();
    }



    private function getJsonAcuse( $UUID, $Number ) {
        $Person      = [
            "type_document_identification_id" => '3',
            "identification_number"           => '94491178',
            "first_name"                      => 'JHON',
            "family_name"                     => "JAMES",
            "job_title"                       => "N/A",
            "organization_department"         => "N/A"
        ];
        $jsonData= [
            'number'      => $Number,
            'uuid'        => $UUID,
            'sync'        => true,
            'person'      => $Person
          ] ;
        $this->jsonObject = $jsonData;
    }


}
