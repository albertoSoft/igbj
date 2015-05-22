<?php
namespace Gastro\HospitalizacionBundle\Util;

use Symfony\Component\Form\DataTransformerInterface;
use Gastro\HospitalizacionBundle\Util\Util;
//use Doctrine\ORM\EntityManager;

class StringToPacienteTransformer implements DataTransformerInterface
{
    public function transform($paciente)
    {
        if (!$paciente) {
            return null;
        }

        return $paciente->__toString();
    }

    /**
     * Reverts Transformation from String to Paciente Object
     */
    public function reverseTransform($pac)
    {

        if (null === $pac) {
            return null;
        }

        $hc=  Util::extraerNumerico($pac);

        
        $em= $GLOBALS['kernel']->getContainer()->get('doctrine')->getManager();
        $paciente=$em->getRepository('PersonaBundle:Paciente')->findOneByHc($hc);
        
        
        return $paciente;
    }
}
