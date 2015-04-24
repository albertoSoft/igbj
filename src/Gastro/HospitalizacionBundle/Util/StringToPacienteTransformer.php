<?php
namespace Gastro\HospitalizacionBundle\Util;

use Symfony\Component\Form\DataTransformerInterface;
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

        $hc=  ereg_replace("[^0-9]","", $pac);
//        $hc=  intval($pac);

        
        $em= $GLOBALS['kernel']->getContainer()->get('doctrine')->getManager();
        $paciente=$em->getRepository('PersonaBundle:Paciente')->findOneByHc($hc);
        
        
        return $paciente;
    }
}
