<?php
namespace Gastro\HospitalizacionBundle\Util;

use Symfony\Component\Form\DataTransformerInterface;
use Gastro\HospitalizacionBundle\Util\Util;

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
        $sala=Util::extraerNumerico($camStr);
        $cama=Util::extraerNoNumerico($camStr);
  
        $em= $GLOBALS['kernel']->getContainer()->get('doctrine')->getManager();
        $camaObjeto=$em->getRepository('HospitalizacionBundle:Cama')->findOneBySalaCama($sala,$cama);
        
        return $camaObjeto;
    }
}
