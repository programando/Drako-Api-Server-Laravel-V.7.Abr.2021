<?php

namespace App\Helpers;

class StringsHelper {


   public static function isEmptyOrNull( $value ) {
       $value  = trim($value );
      if ( empty($value) or is_null( $value )  ) {
                return true;
            }else {
                return false;
            }
      }

    public static function UpperTrim( $String, $Long=0 ) {
        if ( $Long== 0 ) $Long = strlen( $String);
        $String = trim( $String );
        $String = preg_replace('/\s\s+/', ' ', $String  );
        $String = substr($String, 0, $Long  );
        $String = mb_strtoupper( $String,'UTF-8');
        return $String;
    }
    

    public static function InicialMayuscula ( $String) {
        $String = mb_strtolower( trim( $String),'UTF-8'); 
        return ucfirst( $String); 
     }
 
    public static function LowerTrim ( $String) {
           $String = trim( $String );
           return mb_strtolower( $String,'UTF-8'); 
    }

    public static function FixEnterTab ( $cadena) {
        $cadena = mb_strtolower( trim( $cadena),'UTF-8'); 
        return preg_replace('/\s\s+/', ' ', $cadena  );
  }

    public static function FixAccents ( $cadena){
        $cadena = mb_strtolower( trim( $cadena),'UTF-8'); 
            //Reemplazamos la A y a
            $cadena = str_replace(
            array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'), 
            array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
            $cadena
            );
    
            //Reemplazamos la E y e
            $cadena = str_replace(
            array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
            array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
            $cadena );
    
            //Reemplazamos la I y i
            $cadena = str_replace(
            array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
            array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
            $cadena );
    
            //Reemplazamos la O y o
            $cadena = str_replace(
            array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
            array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
            $cadena );
    
            //Reemplazamos la U y u
            $cadena = str_replace(
            array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
            array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
            $cadena );
    
            //Reemplazamos la N, n, C y c
            $cadena = str_replace(
            array('Ñ', 'ñ', 'Ç', 'ç'),
            array('N', 'ñ', 'C', 'c'),
            $cadena
            );
            
          return $cadena;
       
    }
    
}
?>