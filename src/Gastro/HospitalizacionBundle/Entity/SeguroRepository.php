<?php
namespace Gastro\HospitalizacionBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Session\Session;

use Gastro\HospitalizacionBundle\Entity\Seguro;
use Gastro\SiceBundle\Entity\Vshinstitu;

class SeguroRepository extends EntityRepository
{
    public function importarSeguroSice($institucionNombre)
    {
        $em=  $this->getEntityManager();
        $emSice=$GLOBALS['kernel']->getContainer()->get('doctrine')->getManager('sice');

        $seguroSice=new Vshinstitu();
        
        $seguroSice=$emSice->getRepository('SiceBundle:Vshinstitu')->findOneBy(array('vinsnombre'=>$institucionNombre));
        if($seguroSice!=NULL){
            $seguro=new Seguro();
            
            $seguro->setNombre($seguroSice->getVinsnombre());
            $seguro->setSigla('');
 
            $em->persist($seguro);
            $em->flush();

            return $seguro;
        }
        else{
            return NULL;
        }
    }
    
    public function importarSeguroSiceVerificando($institucion)
    {
               $seguro= $this->importarSeguroSice($institucion);
                if($seguro!=NULL){
                    return $seguro;
                }
                else{
                    $session=new Session();
                    $session->getFlashBag()->add('error','¡Debe introducir una institucion válida (seleccione de la lista)... No coincide Nombre institución.!.');
                }
                
        return NULL;
    }
    public function encontrarSeguroDesdeListaSice($tipopac,$seguroListaValue) {
        $seguro=NULL;
        $em=  $this->getEntityManager();
            if ($tipopac==1){
                $seguro=$em->getRepository('HospitalizacionBundle:Seguro')->findOneByNombre('INSTITUCIONAL');
            }
            elseif ($tipopac==2){
                $emSice=$GLOBALS['kernel']->getContainer()->get('doctrine')->getManager('sice');
                $institucion=$emSice->getRepository('SiceBundle:Vshinstitu')->find($seguroListaValue);
                $seguro=$em->getRepository('HospitalizacionBundle:Seguro')->findOneByNombre($institucion->getVinsnombre());
                if($seguro==NULL){
                    $seguro=$em->getRepository('HospitalizacionBundle:Seguro')->importarSeguroSice($institucion->getVinsnombre());
                }
            }
            return $seguro;
    }
}
