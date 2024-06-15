<?php

namespace App\Traits;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

trait QrCodeTrait {

   public function QrCodeGenerateTrait ( $DataCode, $Size=330 ){
      if ( empty($DataCode )) {
         $DataCode ='QrCode is empty';
      }
      return  QrCode::format('png')->size($Size)->encoding('UTF-8')->generate( $DataCode );

   }

}