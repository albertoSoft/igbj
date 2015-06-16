<?php
namespace Gastro\SiceBundle\Entity;

use Doctrine\ORM\EntityRepository;

class SeCamaRepository extends EntityRepository 
{
    public function findAllOrederBySalaCama() {
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery('SELECT c FROM SiceBundle:SeCama c WHERE c.camCodigo>0 ORDER BY c.sala,c.camEnum');
        return $consulta->getResult();
    }
}
