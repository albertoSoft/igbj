<?php
namespace Gastro\SicenBundle\Entity;

use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityRepository;

use Gastro\SiceBundle\Entity\SeSala;
use Gastro\HospitalizacionBundle\Entity\Sala;
class SeSalaRepository extends EntityRepository
{
    public function importarSalaSice($salaEnum){
        $emSice=  $this->getEntityManager();
        $em=$GLOBALS['kernel']->getContainer()->get('doctrine')->getManager();
        $sala=$emSice->getRepository('HospitalizacionBundle:Sala')->findOneByEnumeracion($salaEnum);
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
}
