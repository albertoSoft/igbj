<?php
namespace Gastro\PersonaBundle\Util;

use Symfony\Component\Form\DataTransformerInterface;
use Gastro\HospitalizacionBundle\Util\Util;
//use Doctrine\ORM\EntityManager;

class StringToPersonaTransformer implements DataTransformerInterface
{
    public function transform($persona)
    {
        if (!$persona) {
            return null;
        }

        return $persona->__toString();
    }

    /**
     * Reverts Transformation from String to Paciente Object
     */
    public function reverseTransform($per)
    {
        if (null === $per) {
            return null;
        }

        $ideper=  Util::extraerNumerico($per);
        
        $em= $GLOBALS['kernel']->getContainer()->get('doctrine')->getManager();
        $persona=$em->getRepository('PersonaBundle:Persona')->findOneByIdeper($ideper);
        
        
        return $persona;
    }
}
