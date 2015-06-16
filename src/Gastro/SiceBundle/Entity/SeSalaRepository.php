<?php
namespace Gastro\SiceBundle\Entity;

use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityRepository;

use Gastro\SiceBundle\Entity\SeSala;
use Gastro\HospitalizacionBundle\Entity\Sala;
class SeSalaRepository extends EntityRepository
{
    public function importarSalaSice($salaEnum){
        $emSice=  $this->getEntityManager();
        $em=$GLOBALS['kernel']->getContainer()->get('doctrine')->getManager();
        $sala=$em->getRepository('HospitalizacionBundle:Sala')->findOneByEnumeracion($salaEnum);
        if($sala==NULL){
            $salaSice=$emSice->getRepository('SiceBundle:SeSala')->findOneBySaEnum($salaEnum);
            if($salaSice!=NULL){
                $sala=new Sala();
                $sala->setEnumeracion($salaSice->getSaEnum());
                $sala->setPiso($salaSice->getSaPiso());
                $sala->setNombre($salaSice->getSaDescripcion());
                $sala->setServicio($emSice->getRepository('SiceBundle:Vgruposi')->equivalenciaServicio($salaSice->getVgrucodigo()));
                $em->persist($sala);
                $em->flush();                
            }else{
                $sala=NULL;
            }
        }
        return $sala;
        
    }
    public function importarSalaSiceVerificando($salaEnum)
    {
        /**
        $session=new Session();
        if ($salaEnum!=NULL){
           if ($camaEnum!=NULL){
         */
               $sala= $this->importarSalaSice($salaEnum);
                if($sala!=NULL){
                    return $sala;
                }
                else{
                    $session=new Session();
                    $session->getFlashBag()->add('error','¡Debe introducir una sala válida (seleccione de la lista)... No coincide Letra de sala.!.');
                }
                /**
            }
            else{
                $session->getFlashBag()->add('error','¡Debe introducir una cama válida (de la lista)!...Dato sin Letra de cama)');
            }
        }
        else{
            $session->getFlashBag()->add('error','¡Debe introducir una sala válida (de la lista)!... ¡Dato sin numero de Sala.!.');
        }
                 * 
                 */
        return NULL;
    }
}
