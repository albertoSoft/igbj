<?php

namespace Gastro\CensoBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Gastro\CensoBundle\Entity\AdmisionCama;

class AdmisionAltaRepository extends EntityRepository
{
    public function verificarAdmisionCamaTieneAlta(AdmisionCama $admisionCama) {
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery('SELECT aa FROM CensoBundle:AdmisionAlta aa WHERE aa.admisionPaciente=:ap_id ');
        $consulta->setParameter('ap_id',$admisioncama->getAdmisionPaciente()->getId());
        $consulta->setMaxResults(1);
        $alta=$consulta->getOneOrNullResult();
        if ($alta!=NULL){
            return TRUE;
        }else {
            return FALSE;
        }
    }
}
