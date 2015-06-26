<?php

namespace Gastro\CensoBundle\Entity;

use Doctrine\ORM\EntityRepository;

class AdmisionPacienteRepository extends EntityRepository
{
    public function findAdmisionPacienteVigente(\Gastro\PersonaBundle\Entity\Paciente $paciente) {
        
            $em=  $this->getEntityManager();
           /** modo correcto investigar NOT IN en Doctrine
            $sql='SELECT ap '
                    . 'FROM CensoBundle:AdmisionPaciente ap '
                    . 'WHERE ap.paciente=:paciente_id AND ap.id NOT IN (SELECT aa.admisionPaciente FROM CensoBundle:AdmisionAlta aa) '
                    . 'ORDER BY ap.fechaRegistro DESC'/**/
            
            $consulta=$em->createQuery('SELECT ap '
                    . 'FROM CensoBundle:AdmisionPaciente ap '
                    . 'WHERE ap.paciente=:paciente_id '
                    . 'ORDER BY ap.id DESC,ap.fechaRegistro DESC');
            $consulta->setParameter('paciente_id', $paciente->getId());
            $consulta->setMaxResults(1);
            $admisionPaciente=$consulta->getOneOrNullResult();
            if($admisionPaciente!=NULL){
                $consultaTieneAlta=$em->createQuery('SELECT aa '
                        . 'FROM CensoBundle:AdmisionAlta aa '
                        . 'WHERE aa.admisionPaciente=:admisionpaciente_id ');
                $consultaTieneAlta->setParameter('admisionpaciente_id', $admisionPaciente->getId());
                $consultaTieneAlta->setMaxResults(1);
                if($consultaTieneAlta->getOneOrNullResult()!=NULL)$admisionPaciente==NULL;
                
                 if($admisionPaciente!=NULL && !$paciente->getInternado()){
                     $sesion=new \Symfony\Component\HttpFoundation\Session\Session();
                     $sesion->getFlashBag()->add('error', "INCONSISTENCIA EN LA INFORMACION: Paciente $paciente tiene Admisión vigente pero estado No Internado");
                 }
            }
        
        return $admisionPaciente;
    }
    /**
    public function findAdmisionPacienteVigenteByCamaPaciente(\Gastro\HospitalizacionBundle\Entity\Cama $cama,  \Gastro\PersonaBundle\Entity\Paciente $paciente){
        $em=  $this->getEntityManager();
        $admisionCama=$em->getRepository('CensoBundle:AdmisionCama')->findAdmisionCamaultimaByCamaPaciente($cama,$paciente);
        return $admisionCama!=null?$admisionCama->getAdmisionPaciente():NULL;
    }/**/
}
