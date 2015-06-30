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
    static public function fechaEspanolCadena(\DateTime $fecha) {

        $dia=$fecha->format("l");

        if ($dia=="Monday") $dia="Lunes";
        if ($dia=="Tuesday") $dia="Martes";
        if ($dia=="Wednesday") $dia="Miércoles";
        if ($dia=="Thursday") $dia="Jueves";
        if ($dia=="Friday") $dia="Viernes";
        if ($dia=="Saturday") $dia="Sabado";
        if ($dia=="Sunday") $dia="Domingo";

        $mes=$fecha->format("F");

        if ($mes=="January") $mes="Enero";
        if ($mes=="February") $mes="Febrero";
        if ($mes=="March") $mes="Marzo";
        if ($mes=="April") $mes="Abril";
        if ($mes=="May") $mes="Mayo";
        if ($mes=="June") $mes="Junio";
        if ($mes=="July") $mes="Julio";
        if ($mes=="August") $mes="Agosto";
        if ($mes=="September") $mes="Setiembre";
        if ($mes=="October") $mes="Octubre";
        if ($mes=="November") $mes="Noviembre";
        if ($mes=="December") $mes="Diciembre";

        $ano=$fecha->format("Y");
        
        $dia2=$fecha->format("d");
        
        return "$dia, $dia2 de $mes de $ano";
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
