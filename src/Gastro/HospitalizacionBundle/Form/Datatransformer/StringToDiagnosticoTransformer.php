<?php

namespace Gastro\HospitalizacionBundle\Form\Datatransformer;

use Symfony\Component\Form\DataTransformerInterface;
//use Doctrine\ORM\EntityManager;
use Gastro\HospitalizacionBundle\Util\Util;
use Symfony\Component\HttpFoundation\Session\Session;

class StringToDiagnosticoTransformer implements DataTransformerInterface
{

    /**
     * transforms the Diagnostico-Object into a String
     */
    public function transform($diagnostico)
    {
        if (!$diagnostico) {
            return null;
        }

        return $diagnostico->__toString();
    }

    /**
     * Reverts Transformation from String to Diagnostico Object
     */
    public function reverseTransform($diag)
    {

        if (null === $diag) {
            return null;
        }

        $nombre= strstr($diag, '-', TRUE);

        if ($nombre!=NULL){
            $em= $GLOBALS['kernel']->getContainer()->get('doctrine')->getManager();
            $diagnostico=$em->getRepository('HospitalizacionBundle:Diagnostico')->findOneByNombre($nombre);
            if($diagnostico!=NULL){
                return $diagnostico;
            }else{
                $session=new Session();
                $session->getFlashBag()->add('error','¡Debe introducir un diagnóstico válido (seleccione de la lista)... No coincide el Nombre del diagnóstico.!.');
            }
        }
        else {
            $session=new Session();
            $session->getFlashBag()->add('error','¡Debe introducir un diagnóstico válido (seleccione de la lista)... No existe Nombre del diagnóstico.!.');
          }
        return null;
        
    }
}
