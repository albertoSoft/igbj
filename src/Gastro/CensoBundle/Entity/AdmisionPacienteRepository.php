<?php

namespace Gastro\CensoBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AdmisionPacienteRepository extends EntityRepository
{
    public function findAdmisionPacienteVigente(\Gastro\PersonaBundle\Entity\Paciente $paciente) {
        if($paciente->getInternado()==TRUE){
            $em=  $this->getEntityManager();
           /** modo correcto
            $sql='SELECT ap '
                    . 'FROM CensoBundle:AdmisionPaciente ap '
                    . 'WHERE ap.paciente=:paciente_id AND ap.id NOT IN (SELECT aa.admisionPaciente FROM CensoBundle:AdmisionAlta aa) '
                    . 'ORDER BY ap.fechaRegistro DESC'/**/
            
            $consulta=$em->createQuery('SELECT ap '
                    . 'FROM CensoBundle:AdmisionPaciente ap '
                    . 'WHERE ap.paciente=:paciente_id '
                    . 'ORDER BY ap.fechaRegistro DESC');
            $consulta->setParameter('paciente_id', $paciente->getId());
            $consulta->setMaxResults(1);
            $admisionPaciente=$consulta->getOneOrNullResult();
            
            $consulta=$em->createQuery('SELECT aa '
                    . 'FROM CensoBundle:AdmisionAlta aa '
                    . 'WHERE aa.admisionPaciente=:admisionpaciente_id '
                    . 'ORDER BY aa.fechaRegistro DESC');
            $consulta->setParameter('admisionpaciente_id', $admisionPaciente->getId());
            $consulta->setMaxResults(1);
            if($consulta->getOneOrNullResult()==NULL)
                return $admisionPaciente;
        }
        return NULL;
    }
}
