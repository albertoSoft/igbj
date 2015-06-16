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
        if (null === $camStr) { return null; }

        $salaNumero=Util::extraerNumerico($camStr);
        $camaLetra=Util::extraerNoNumerico($camStr);
  
        if ($salaNumero!=NULL){
            if ($camaLetra!=NULL){
                $em= $GLOBALS['kernel']->getContainer()->get('doctrine')->getManager();
                $emSice= $GLOBALS['kernel']->getContainer()->get('doctrine')->getManager('sice');
                
                $salaObj=$em->getRepository('HospitalizacionBundle:Sala')->findOneByEnumeracion($salaNumero);
                if($salaObj==NULL){ $salaObj=$emSice->getRepository('SiceBundle:SeSala')->importarSalaSiceVerificando($salaNumero); }
                if($salaObj!=NULL){
                    $camaObjeto=$em->getRepository('HospitalizacionBundle:Cama')->findOneBy(array('sala'=>$salaObj->getId(),'nombre'=>$camaLetra));
                    if($camaObjeto==NULL){
                        $camaObjeto=$em->getRepository('HospitalizacionBundle:Cama')->importarCamaSiceVerificando($salaNumero,$camaLetra);
                    }
                }
            }
            else{
                $session=new Session();
                $session->getFlashBag()->add('error','¡Debe introducir una cama válida (seleccione de la lista)... Cama sin dato (letra).!.');
                $camaObjeto=NULL;
                }
        }
        else{
            $session=new Session();
            $session->getFlashBag()->add('error','¡Debe introducir una cama válida (de la lista)!...Dato Número sala)');
            $camaObjeto=NULL;
        }
        return $camaObjeto;
    }
}
