<?php
namespace Gastro\HospitalizacionBundle\Entity;

use Doctrine\ORM\EntityRepository;


class DiagnosticoRepository extends EntityRepository
{
    public function findDiagnosticos($nombre=null){

        $em=  $this->getEntityManager();

        $consulta=$em->createQuery('SELECT d FROM HospitalizacionBundle:Diagnostico d WHERE d.nombre LIKE :nombre OR d.codigo LIKE :nombre');
        $consulta->setParameter('nombre', '%'.$nombre.'%');
        
     return $consulta->getResult();
    }
}
