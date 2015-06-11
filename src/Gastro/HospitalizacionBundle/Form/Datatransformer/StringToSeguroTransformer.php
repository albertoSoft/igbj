<?php
namespace Gastro\HospitalizacionBundle\Form\Datatransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Gastro\HospitalizacionBundle\Util\Util;
use Symfony\Component\HttpFoundation\Session\Session;

class StringToSeguroTransformer implements DataTransformerInterface
{
    public function transform($seguro)
    {
        if (!$seguro) {
            return null;
        }

        return $$seguro->__toString();
    }

    /**
     * Reverts Transformation from String to Seguro Object
     */
    public function reverseTransform($sec)
    {
        if (null === $sec) {
            $session=new Session();
            $session->getFlashBag()->add('error', 'Debe introducir una institución de convenio válida!... no existe nombre');
            return null;
        }

        $em= $GLOBALS['kernel']->getContainer()->get('doctrine')->getManager();
        $seguro=$em->getRepository('HospitalizacionBundle:Seguro')->findOneByNombre($sec);
        
        if($seguro==null){
            $seguro=$em->getRepository('HospitalizacionBundle:Seguro')->importarSeguroSiceVerificando($sec);
        }
        
        return $seguro;
    }
}
