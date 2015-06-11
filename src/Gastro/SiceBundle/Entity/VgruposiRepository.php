<?php
namespace Gastro\SicenBundle\Entity;

use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityRepository;
use Gastro\HospitalizacionBundle\Entity\Servicio;

class VgruposiRepository extends EntityRepository
{
    public function equivalenciaServicio(\Gastro\SiceBundle\Entity\Vgruposi $Vgruposi) {
        $servicio=NULL;
        $emSice=  $this->getEntityManager();
        $nombreServicio=trim($Vgruposi->getVgrudescri());
        if($nombreServicio!=NULL){
            $em=$GLOBALS['kernel']->getContainer()->get('doctrine')->getManager();
            $servicio=$em->getRepository('HospitalizacionBundle:Servicio')->findOneByNombre($nombreServicio);
            if($servicio==NULL){
                $servicioNew=new Servicio();
                $servicioNew->setNombre($nombreServicio);
                $em->persist($servicioNew);
                $em->flush();
                $servicio=$em->getRepository('HospitalizacionBundle:Servicio')->findOneByNombre($nombreServicio);
            }
        }
        return $servicio;
    }
}
