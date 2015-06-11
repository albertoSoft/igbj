<?php
namespace Gastro\HospitalizacionBundle\Form\Datatransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Gastro\HospitalizacionBundle\Util\Util;
use Symfony\Component\HttpFoundation\Session\Session;

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
  
        $session=new Session();
        if ($sala!=NULL){
            if ($cama!=NULL){
                $em= $GLOBALS['kernel']->getContainer()->get('doctrine')->getManager();
                $emSice= $GLOBALS['kernel']->getContainer()->get('doctrine')->getManager('sice');
                $salaObj=$em->getRepository('HospitalizacionBundle:Cama')->findOneByEnumeracion($sala);
                
                if($salaObj==NULL){$camaObjeto=NULL;}else{$camaObjeto=$em->getRepository('HospitalizacionBundle:Cama')->findOneBy(array('sala'=>$salaObj->getId(),'nombre'=>$cama));}
                
                if($camaObjeto==NULL){$salaObj=$emSice->getRepository('SiceBundle:SeSala')->importarSalaSice($sala);$camaObjeto=$em->getRepository('HospitalizacionBundle:Cama')->importarCamaSiceVerificando($sala,$cama);}
                return  $camaObjeto;
            }
            else{
                     $session->getFlashBag()->add('error','¡Debe introducir una cama válida (seleccione de la lista)... No coincide Nª de sala y/o cama.!.');
                }
        }
        else{
            $session->getFlashBag()->add('error','¡Debe introducir una cama válida (de la lista)!...Dato sin Letra de cama)');
        }
    }
}
