<?php

namespace Gastro\CensoBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AdmisionCamaRepository extends EntityRepository
{
    public function findUltimaAdmisionCama(AdmisionPaciente $admisionPaciente) {
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery('SELECT ac FROM CensoBundle:AdmisionCama ac WHERE ac.admisionPaciente=:ap_id ORDER BY ac.fecha DESC');
        $consulta->setParameter('ap_id', $admisionPaciente->getId());
        $consulta->setMaxResults(1);
        return $consulta->getOneOrNullResult();
    }
}
