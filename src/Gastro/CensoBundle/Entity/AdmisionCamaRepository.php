<?php

namespace Gastro\CensoBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Gastro\HospitalizacionBundle\Entity\Cama;
use Gastro\CensoBundle\Entity\AdmisionCama;
use Gastro\CensoBundle\Entity\AdmisionPaciente;
use Symfony\Component\HttpFoundation\Session\Session;

class AdmisionCamaRepository extends EntityRepository
{
    //***** CLAVE ---ESTO DEBE FUNCIONAR PARA TODOS LOS CASOS
    public function findAdmisionCamaVigenteByCama(Cama $cama,$fecha=NULL){
        $sesion=new Session();
        $fecha=($fecha!=NULL)?$fecha:new \DateTime('today');
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery('SELECT ac,ap,p FROM CensoBundle:AdmisionCama ac JOIN ac.admisionPaciente ap JOIN ap.paciente p  WHERE ac.cama=:cama_id AND ac.fecha<=:fecha ORDER BY ac.id DESC, ac.fecha DESC');
        $consulta->setParameter('cama_id', $cama);// $cama->getId() o $cama es igual para la consulta
        $consulta->setParameter('fecha', $fecha);
        $consulta->setMaxResults(1);
        
        $admisioncama= $consulta->getOneOrNullResult(); //$em->getRepository('CensoBundle:AdmisionCama')->findOneByCama($cama);
        if($admisioncama!=null){
//            $sesion->getFlashBag()->add('error', 'findAdmisionCamaVigenteByCama: Valor de AdmisionCama No NULO para cama '.$admisioncama->getcama());
            if(!$this->tieneAdmisionCamaPosterior($admisioncama,$fecha)){
//                $sesion->getFlashBag()->add('error', 'findAdmisionCamaVigenteByCama: No tiene AdmiCama Posterior ID:'.$admisioncama->getId());
                $consulta=$em->createQuery('SELECT aa FROM CensoBundle:AdmisionAlta aa WHERE aa.admisionPaciente=:ap_id ');
                $consulta->setParameter('ap_id',$admisioncama->getAdmisionPaciente()->getId());
                $consulta->setMaxResults(1);
                $alta=$consulta->getOneOrNullResult();
                if ($alta!=NULL){
                    $admisioncama=NULL;
                    
                }/**
                else{
//                    $sesion->getFlashBag()->add('error', 'findAdmisionCamaVigenteByCama: No tiene Alta');
                    if($admisioncama->getAdmisionPaciente()->getPendiente()==TRUE){
                        
                        $sesion->getFlashBag()->add('error', 'findAdmisionCamaVigenteByCama: aqui se anula Cama: '.$admisioncama->getCama());
                        $admisioncama=NULL;
                    }    
                }/**/
            }  else {
                $admisioncama=NULL;
            }
            
        }
//        $sesion->getFlashBag()->add('error', 'Valor de AdmisionCama por Cama: '.$admisioncama!=NULL?var_dump($admisioncama):'NULO');
        return $admisioncama;
        
    }
    //// ********* No siempre devuelve AdmisionCama Vigente
    public function findAdmisionCamaUltimaByPaciente(\Gastro\PersonaBundle\Entity\Paciente $paciente, $fecha=NULL){
        $sesion=new Session();
        $fecha=($fecha!=NULL)?$fecha:new \DateTime('today');
        $em=  $this->getEntityManager();
        $cama=$em->getRepository('HospitalizacionBundle:Paciente')->findCamaDelPaciente($paciente);
        $consulta=$em->createQuery('SELECT ac,ap,p FROM CensoBundle:AdmisionCama ac JOIN ac.admisionPaciente ap JOIN ap.paciente p  WHERE ac.cama=:cama_id AND ap.paciente=:paciente AND ac.fecha<=:fecha ORDER BY ac.id DESC, ac.fecha DESC');
        $consulta->setParameter('cama_id', $cama);// $cama->getId() o $cama es igual para la consulta
        $consulta->setParameter('paciente', $paciente);
        $consulta->setParameter('fecha', $fecha);
        $consulta->setMaxResults(1);
        
        //$em->getRepository('CensoBundle:AdmisionCama')->findOneByCama($cama);
        return $consulta->getOneOrNullResult();
        
    }
    public function tieneAdmisionCamaPosterior(AdmisionCama $admisionCama,$fecha=NULL) {
        $fecha=($fecha!=NULL)?$fecha:new \DateTime('today');
        
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery('SELECT ac FROM CensoBundle:AdmisionCama  ac WHERE ac.admisionPaciente=:ap_id and ac.id>:id and ac.fecha<=:fecha');
        $consulta->setParameter('ap_id', $admisionCama->getAdmisionPaciente());
        $consulta->setParameter('id', $admisionCama->getId());
        $consulta->setParameter('fecha', $fecha);
        $consulta->setMaxResults(1);
        
        if($consulta->getOneOrNullResult()==NULL)
            return FALSE;
        else
            return TRUE;
        
    }
    public function findUltimaAdmisionCama(AdmisionPaciente $admisionPaciente) {
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery('SELECT ac FROM CensoBundle:AdmisionCama ac WHERE ac.admisionPaciente=:ap_id ORDER BY ac.id DESC, ac.fecha DESC');
        $consulta->setParameter('ap_id', $admisionPaciente->getId());
        $consulta->setMaxResults(1);
        
        return $consulta->getOneOrNullResult();
    }
    public function findAdmisionUnida(AdmisionCama $admisionCama) {
        $em=  $this->getEntityManager();
                
        $consulta=$em->createQuery('SELECT u,a FROM HospitalizacionBundle:UnirAdmisionCenso u JOIN u.admision a WHERE u.admisionPaciente=:ap_id');
        $consulta->setParameter('ap_id', $admisionCama->getAdmisionPaciente()->getId());
        $consulta->setMaxResults(1);
        
        return $consulta->getOneOrNullResult();
    }
    public function encontrarAdmisionCamaIgual(AdmisionCama $ac){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery('SELECT ac FROM CensoBundle:AdmisionCama ac WHERE ac.cama=:cama and ac.fecha=:fecha AND ac.admisionPaciente=:ap AND ac.id<>:id ORDER BY ac.id ASC');
        $consulta->setParameter('ap', $ac->getAdmisionPaciente());
        $consulta->setParameter('cama', $ac->getCama());
        $consulta->setParameter('fecha', $ac->getFecha());
        $consulta->setParameter('id', $ac->getId());
        $consulta->setMaxResults(1);
        
        return $consulta->getOneOrNullResult();
    }
    public function eliminarAdmisiónCamaMedios(AdmisionCama $acIgual, AdmisionCama $ac){
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery('SELECT ac FROM CensoBundle:AdmisionCama ac WHERE ac.fecha=:fecha AND ac.admisionPaciente=:ap AND ac.id>=:idmenor AND ac.id<:idmayor');
        $consulta->setParameter('ap', $ac->getAdmisionPaciente());
        $consulta->setParameter('fecha', $ac->getFecha());
        $consulta->setParameter('idmenor', $acIgual->getId());
        $consulta->setParameter('idmayor', $ac->getId());
        
        $acMedios=$consulta->getResult();
        if($acMedios!=NULL){
            foreach ($acMedios as $acm){
                $em->remove($acm);
                $em->flush();
            }
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    
    public function asignarCamaAdmision(AdmisionPaciente $admisionPaciente, Cama $cama, \DateTime $fecha=NULL) {
        $fecha=$fecha!=null?$fecha:new \DateTime('today');
        $em=  $this->getEntityManager();
        $admisionCama=new AdmisionCama();
        $admisionCama->setAdmisionPaciente($admisionPaciente);
        $admisionCama->setCama($cama);
        $admisionCama->setFecha($fecha);
        
        $em->persist($admisionCama);
        $em->flush();
        
        return $admisionCama;
    }
}
