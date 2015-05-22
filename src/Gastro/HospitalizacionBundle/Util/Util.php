<?php
namespace Gastro\HospitalizacionBundle\Util;

class Util
{
    static public function extraerNumerico($cadena) {
        $numero='';
        for ($i = 0 ; $i < strlen($cadena) ; $i ++){
            $caracter=substr($cadena, $i, 1);
            if(is_numeric($caracter)){
                $numero =  $numero.$caracter;
            }
        }
        return $numero;
    }
    static public function extraerNoNumerico($cadena) {
        $alfa='';
        for ($i = 0 ; $i < strlen($cadena) ; $i ++){
            $caracter=substr($cadena, $i, 1);
            if(!is_numeric($caracter)){
                $alfa =  $alfa.$caracter;
            }
        }
        return $alfa;
    }
}
