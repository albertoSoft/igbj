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
    
    /*
     * DEVUELVE H.C DIRECTAMENTE DEL FORMULARIO ENVIADO ----- NO ESTA EN USO
     *
    static public function devolverHcPaciente($data) {
        // recuperar la HC del formulario de admisión 
        $hc=NULL;
                    foreach ($data as $clave => $valor) {
                        foreach ($valor as $clave2 => $valor2) {
                            if (is_array($valor2)){
                                $cont=1;
                                foreach ($valor2 as $clave3 => $valor3) {
                                    if($cont==3){
                                        $hc=Util::extraerNumerico($valor3);
                                        break;
                                    }
                                    $cont++;
                                }
                            }  
                        }
                    }
        return $hc;
    }/**/
}
