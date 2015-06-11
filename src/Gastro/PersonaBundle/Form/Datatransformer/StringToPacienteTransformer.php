<?php
namespace Gastro\PersonaBundle\Form\Datatransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Gastro\HospitalizacionBundle\Util\Util;
use Symfony\Component\HttpFoundation\Session\Session;

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
        
        if ($hc!=NULL){
            $em= $GLOBALS['kernel']->getContainer()->get('doctrine')->getManager();
            $paciente=$em->getRepository('PersonaBundle:Paciente')->findOneByHc($hc);

            if($paciente==null){
                $paciente=$em->getRepository('PersonaBundle:Paciente')->importarHcSiceVerificando($hc);
            }
        }  else {
            $session=new Session();
            $session->getFlashBag()->add('error','¡Debe introducir un paciente válido (seleccione de la lista)... No existe H.C. del paciente.!.');
            $paciente=NULL;
        }
        
        
        
        return $paciente;
    }
}
