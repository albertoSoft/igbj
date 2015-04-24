<?php
namespace Gastro\HospitalizacionBundle\Util;

use Symfony\Component\Form\DataTransformerInterface;

class StringToCamaTransformer implements DataTransformerInterface
{
     public function transform($cama)
    {
        if (!$cama) {
            return null;
        }

        return $cama->__toString();
    }

    /**
     * Reverts Transformation from String to Cama Object
     */
    public function reverseTransform($camStr)
    {
        if (null === $camStr) {
            return null;
        }
        $sala=ereg_replace("[^0-9]","", $camStr);
        $cama=ereg_replace("[0-9]","", $camStr);
        /*
        $sala=intval($camStr)
        ;$cama='';
        for ($i = 0 ; $i < strlen($camStr) ; $i ++){
            if(!is_numeric((int)$camStr[$i])){
                $cama .=  $camStr[$i];
            }
        } /**/
        $em= $GLOBALS['kernel']->getContainer()->get('doctrine')->getManager();
        $camaObjeto=$em->getRepository('HospitalizacionBundle:Cama')->findOneBySalaCama($sala,$cama);
        
        return $camaObjeto;
    }
}
