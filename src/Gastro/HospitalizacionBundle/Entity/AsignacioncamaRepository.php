<?php
namespace Gastro\HospitalizacionBundle\Entity;

use Doctrine\ORM\EntityRepository;

use Gastro\PersonaBundle\Entity\Paciente;
use Gastro\CensoBundle\Entity\AdmisionPaciente;
use Gastro\CensoBundle\Entity\AdmisionCama;
use Gastro\CensoBundle\Entity\AdmisionFecha;
use Gastro\CensoBundle\Entity\AdmisionTipoAtencion;
use Gastro\CensoBundle\Entity\AdmisionDiagnostico;
use Gastro\CensoBundle\Entity\AdmisionServicio;
use Gastro\CensoBundle\Entity\AdmisionIngresapor;
use Gastro\HospitalizacionBundle\Entity\UnirAdmisionCenso;

class AsignacioncamaRepository extends EntityRepository
{
    public function registrarAdmisionycama(\Gastro\HospitalizacionBundle\Entity\Asignacioncama $asignacioncama) {
        //***** Admision y asignacion de cama
        $em=  $this->getEntityManager();
//        $admision=new Admision();
        $admision=$asignacioncama->getAdmision();
        $em->persist($admision);
                    
        $asignacioncama->setAdmision($admision);
        $em->persist($asignacioncama);
        $em->flush();
                 
//        $cama=new Cama();                   $paciente=new Paciente();
        $cama=$asignacioncama->getCama();   $paciente=$admision->getPaciente();
        $cama->setOcupada(TRUE);            $paciente->setInternado(TRUE);
        $em->persist($cama);                $em->persist($paciente);
                    
        $em->flush();
        
        /**/
        //***** AdmisionPaciente
        $admisionPaciente= new AdmisionPaciente();
        $admisionPaciente->setFecharegistro(new \DateTime('today'));
        $admisionPaciente->setPendiente(FALSE);
//        $admisionPaciente->setFechainternacion($asignacioncama->getFecha());
        $admisionPaciente->setPaciente($admision->getPaciente());
        $em->persist($admisionPaciente);
        $em->flush();
        
        //*************** Unir Admision con Censo
        $unir=new UnirAdmisionCenso();
        $unir->setAdmision($admision);
        $unir->setAdmisionPaciente($admisionPaciente);
        $em->persist($unir);
//        $em->flush();
        
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
//        $em->flush();
        /**/
        //********* AdmisionTipoPac
        $admisionTipoAtencion=new AdmisionTipoAtencion();
        $admisionTipoAtencion->setAdmisionPaciente($admisionPaciente);
        $admisionTipoAtencion->setSeguro($asignacioncama->getAdmision()->getSeguro());
        $em->persist($admisionTipoAtencion);
//        $em->flush();
        
        //**********AdmisionDiagnostico
        $admisionDiagnostico=new AdmisionDiagnostico();
        $admisionDiagnostico->setAdmisionPaciente($admisionPaciente);
        $admisionDiagnostico->setDiagnostico($asignacioncama->getAdmision()->getDiagnostico());
        $admisionDiagnostico->setMedico($asignacioncama->getAdmision()->getMedico());
        $em->persist($admisionDiagnostico);
//        $em->flush();
        
        //********* AdmisionServicio
        $admisionServicio=new AdmisionServicio();
        $admisionServicio->setAdmisionPaciente($admisionPaciente);
        $admisionServicio->setServicio($asignacioncama->getAdmision()->getServicio());
        $em->persist($admisionServicio);
//        $em->flush();
        
        //********* AdmisionIngresapor
        $admisionIngresapor=new AdmisionIngresapor();
        $admisionIngresapor->setAdmisionPaciente($admisionPaciente);
        $admisionIngresapor->setIngresapor($asignacioncama->getAdmision()->getIngresapor());
        $em->persist($admisionIngresapor);
        $em->flush();
    }
    public function cambiarSeguro(Asignacioncama $asignacioncama,  Seguro $seguro) {
        $admisionAux=$asignacioncama->getAdmision();
        $admisionAux->setSeguro($seguro);
        $asignacioncama->setAdmision($admisionAux);
        
    }
}
