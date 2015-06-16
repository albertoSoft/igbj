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
    
    static public function devolverEnumeracionCama($camaLetra) {
        switch ($camaLetra){
            case 'A':
                $numero=1;
                break;
            case 'B':
                $numero=2;
                break;
            case 'C':
                $numero=3;
                break;
            case 'D':
                $numero=4;
                break;
            case 'E':
                $numero=5;
                break;
            case 'F':
                $numero=6;
                break;
            case 'G':
                $numero=7;
                break;
        }
        return $numero;
    }
}
