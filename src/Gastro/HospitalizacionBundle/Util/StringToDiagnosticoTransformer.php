<?php

namespace Gastro\HospitalizacionBundle\Util;

use Symfony\Component\Form\DataTransformerInterface;
//use Doctrine\ORM\EntityManager;
use Gastro\HospitalizacionBundle\Util\Util;

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

        $nombre= Util::extraerNoNumerico($diag);// strstr($diag, ' ', TRUE);

        
        $em= $GLOBALS['kernel']->getContainer()->get('doctrine')->getManager();
        $diagnostico=$em->getRepository('HospitalizacionBundle:Diagnostico')->findOneByNombre($nombre);
        
        return $diagnostico;
    }
}
