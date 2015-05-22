<?php
namespace Gastro\PersonaBundle\Entity;

use Doctrine\ORM\EntityRepository;

class PersonaRepository extends EntityRepository
{
    public function findAllMedicos() {
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery('SELECT p '
                . 'FROM PersonaBundle:Persona p '
                . 'WHERE p.swmedi=:cod_med '
                . 'ORDER BY p.patern,p.matern,p.nombre DESC');
        $consulta->setParameter('cod_med', 1);

        return $consulta->getResult();
    }
}
