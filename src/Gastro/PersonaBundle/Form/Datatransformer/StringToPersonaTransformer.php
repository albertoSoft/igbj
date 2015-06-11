<?php
namespace Gastro\PersonaBundle\Form\Datatransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Gastro\HospitalizacionBundle\Util\Util;
use Symfony\Component\HttpFoundation\Session\Session;
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
     * Reverts Transformation from String to Persona Object
     */
    public function reverseTransform($per)
    {
        if (null === $per) {
            return null;
        }

        $ideper= Util::extraerNumerico($per);
        if($ideper!=null){
            $em= $GLOBALS['kernel']->getContainer()->get('doctrine')->getManager();
            $persona=$em->getRepository('PersonaBundle:Persona')->findOneByIdeper($ideper);
            if($persona==null){
                $emSice=$GLOBALS['kernel']->getContainer()->get('doctrine')->getManager('sice');
                $persona=$emSice->getRepository('SiceBundle:Perpersona')->importarPersonaSice($ideper);
                if($persona==NULL){
                    $session=new Session();
                    $session->getFlashBag()->add('error', 'Debe registrar un Medico válido (de la lista).Código de médico no coincide.');
                }
            }
        }
        else{
            $session=new Session();
            $session->getFlashBag()->add('error', 'Debe registrar un Medico válido (de la lista).Dato sin código de médico.');
            $persona=NULL;
        }
        return $persona;
    }
}
