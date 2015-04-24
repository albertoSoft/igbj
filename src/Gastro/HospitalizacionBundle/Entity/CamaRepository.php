<?php
namespace Gastro\HospitalizacionBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CamaRepository extends EntityRepository
{
    public function findPacienteEnCama($cama_id) {
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery('SELECT p,ac,c,ad '
                . 'FROM HospitalizacionBundle:AsignacionCama ac '
                . 'JOIN ac.cama c JOIN ac.admision ad JOIN ad.paciente p '
                . 'WHERE c.id=:cama_id AND c.ocupada=1'
                . 'ORDER BY ac.fecha DESC');
        
        $consulta->setParameter('cama_id', $cama_id);
        $consulta->setMaxResults(1);
        
        
        
        return $consulta->getOneOrNullResult();
    }
    
    public function findOneBySalaCama($sala,$cama) {
        $em=$this->getEntityManager();
        $consulta=$em->createQuery('SELECT c,s FROM HospitalizacionBundle:Cama c JOIN c.sala s  WHERE s.enumeracion=:s_num AND c.nombre=:c_nom');
        
        $consulta->setParameter('s_num',$sala);
        $consulta->setParameter('c_nom',$cama);
        $consulta->setMaxResults(1);
        
        return $consulta->getSingleResult();
    }
}
