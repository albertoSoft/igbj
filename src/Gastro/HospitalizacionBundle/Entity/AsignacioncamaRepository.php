<?php
namespace Gastro\HospitalizacionBundle\Entity;

use Doctrine\ORM\EntityRepository;

use Gastro\PersonaBundle\Entity\Paciente;
use Gastro\CensoBundle\Entity\AdmisionPaciente;
use Gastro\CensoBundle\Entity\AdmisionCama;
use Gastro\CensoBundle\Entity\AdmisionFecha;

class AsignacioncamaRepository extends EntityRepository
{
    public function registrarAdmisionycama(\Gastro\HospitalizacionBundle\Entity\Asignacioncama $asignacioncama) {
        //***** Admision y asignacion de cama
        $em=  $this->getEntityManager();
        $admision=new Admision();
            
        $admision=$asignacioncama->getAdmision();
        $em->persist($admision);
                    
        $asignacioncama->setAdmision($admision);
        $em->persist($asignacioncama);
        $em->flush();
                 
        $cama=new Cama();                   $paciente=new Paciente();
        $cama=$asignacioncama->getCama();   $paciente=$admision->getPaciente();
        $cama->setOcupada(TRUE);            $paciente->setInternado(TRUE);
        $em->persist($cama);                $em->persist($paciente);
                    
        $em->flush();
        
        //***** AdmisionPaciente
        $admisionPaciente= new AdmisionPaciente();
        $admisionPaciente->setFecharegistro(new \DateTime('today'));
        $admisionPaciente->setPendiente(FALSE);
//        $admisionPaciente->setFechainternacion($asignacioncama->getFecha());
        $admisionPaciente->setPaciente($admision->getPaciente());
        $em->persist($admisionPaciente);
        $em->flush();
        
        //******* AdmisionCama
        $admisionCama=new AdmisionCama();
        $admisionCama->setCama($asignacioncama->getCama());
        $admisionCama->setFecha($asignacioncama->getFecha());
        $admisionCama->setAdmisionPaciente($admisionPaciente);
        $em->persist($admisionCama);
        
        
        //**** AdmisionFecha
        $admisionFecha=new AdmisionFecha();
        $admisionFecha->setAdmisionPaciente($admisionPaciente);
        $admisionFecha->setFechainternacion($asignacioncama->getFecha());
        $em->persist($admisionFecha);
        $em->flush();
        
        //********* AdmisionTipoPac
    }
}