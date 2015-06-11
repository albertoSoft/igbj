<?php
namespace Gastro\SiceBundle\Util;

class Util {
    static public function devolverLetraCama($camaNumero) {
        switch ($camaNumero){
            case 1:
                $letra='A';
                break;
            case 2:
                $letra='B';
                break;
            case 3:
                $letra='C';
                break;
            case 4:
                $letra='D';
                break;
            case 5:
                $letra='E';
                break;
            case 6:
                $letra='F';
                break;
            case 7:
                $letra='G';
                break;
        }
        return $letra;
    }
}
