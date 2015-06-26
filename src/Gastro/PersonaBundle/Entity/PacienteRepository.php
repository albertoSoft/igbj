<?php

namespace Gastro\PersonaBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Gastro\HospitalizacionBundle\Util\Util;
use Symfony\Component\HttpFoundation\Session\Session;

use Gastro\PersonaBundle\Entity\Paciente;
use Gastro\SiceBundle\Entity\SeHc;
use Gastro\HospitalizacionBundle\Entity\Cama;

use Gastro\CensoBundle\Entity\AdmisionCama;

class PacienteRepository extends EntityRepository
{
    public function importarHcSice($hc=NULL)
    {
        $em=  $this->getEntityManager();
        $emSice=$GLOBALS['kernel']->getContainer()->get('doctrine')->getManager('sice');  //$this->getEntityManager("sice");

        $pacienteSice=new SeHc();
        $pacienteSice=$emSice->getRepository('SiceBundle:SeHc')->findOneByHclCodigo($hc);
        if($pacienteSice!=NULL){
            $paciente=new Paciente();
            $paciente->setHc($pacienteSice->getHclCodigo());
            $paciente->setAppat($pacienteSice->getHclAppat());
            $paciente->setApmat($pacienteSice->getHclApmat());
            $paciente->setNombre($pacienteSice->getHclNombre());
            $paciente->setFechanac($pacienteSice->getHclFecnac());
            $paciente->setSexo($pacienteSice->getHclSexo());
            $paciente->setCi($pacienteSice->getHclNumci());

            $paciente->setEstciv($pacienteSice->getHclEstciv());
            $paciente->setDirecc($pacienteSice->getHclDirecc());
            $paciente->setTeldom($pacienteSice->getHclTeldom());

            $paciente->setInternado(FALSE);
            $paciente->setRutafoto('');

            $em->persist($paciente);
            $em->flush();
            
            return $paciente;
        }
        else{
            return NULL;
        }
    }
    
    public function importarHcSiceVerificando($hc=NULL)
    {  /**
                    $session=new Session();
                    if ($hc!=NULL){ /**/
                        $paciente= $this->importarHcSice($hc);
                        if($paciente!=NULL){
                            return $paciente;
                        }
                        else{
                            $session=new Session();
                            $session->getFlashBag()->add('error','¡Debe introducir un paciente válido (existente en la lista)... No coincide H.C con paciente.!.');
                        }/**
                    }
                    else{
                        $session->getFlashBag()->add('error','¡Debe introducir un paciente válido (de la lista)!... ¡Dato sin H.C.!.');
                    }/**/
                    return NULL;
    }
    /**/
    public function comprobarPacienteEstaInternado(Paciente $paciente) {
        if($paciente!=NULL){
            if($paciente->getInternado()==TRUE){
                return true;
            }
        }
        return false;
    }/**/
    public function comprobarPacienteEstaEnCama(Paciente $paciente,Cama $camaComparativa) {
        if($paciente->getInternado()==TRUE){
            $cama=$this->findCamaDelPaciente($paciente);
            if ($cama!=NULL)
                if($cama->getSigla()==$camaComparativa->getSigla())
                    return TRUE;
        }
        return FALSE;
    }
    // Encuentra cama del paciente Internado(si tiene alta retorna NULL) sin importar si esta pendiente o no 
    public function findCamaDelPaciente(Paciente $paciente) {
        
        if($paciente->getInternado()){
/*            $pendiente=$this->pacienteEstaPendiente($paciente);
            if(!$pendiente){/**/
                $em=  $this->getEntityManager();
                $admisionPaciente=$em->getRepository('CensoBundle:AdmisionPaciente')->findAdmisionPacienteVigente($paciente);
                $admisionCama=$em->getRepository('CensoBundle:AdmisionCama')->findUltimaAdmisionCama($admisionPaciente);
                return $admisionCama!=NULL?$admisionCama->getCama():NULL;
//            }
            
        }
        return NULL;
    }
    public function pacienteEstaPendiente(Paciente $paciente) {
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery('SELECT ap FROM CensoBundle:AdmisionPaciente ap WHERE ap.paciente=:pac_id order by ap.fechaRegistro DESC');
        $consulta->setParameter('pac_id',$paciente->getId());
        $consulta->setMaxResults(1);
        $admisionPaciente=$consulta->getOneOrNullResult();
        if ($admisionPaciente!=NULL){
            $pendiente=$admisionPaciente->getPendiente();
        }else{
            $pendiente=FALSE;
        }
        return $pendiente;
    }
    public function cambiarEstadoPacienteANoPendiente(Paciente $paciente) {
        $em=  $this->getEntityManager();
        $admisionPaciente=$em->getRepository('CensoBundle:AdmisionPaciente')->findOneByPaciente($paciente);
        
        if($admisionPaciente!=NULL){
            $admisionPaciente->setPendiente(FALSE);
            $em->persist($admisionPaciente);

            $unir=$em->getRepository('HospitalizacionBundle:UnirAdmisionCenso')->findOneByAdmisionPaciente($admisionPaciente);
            if($unir!=null){
                $unir->getAdmision()->setPendiente(FALSE);
                $em->persist($unir);
            }
            $em->flush();
            
            return TRUE;
        }
        else {
            return FALSE;
        }
        
    }
    public function trasladarPacienteInternado(Paciente $paciente, \Gastro\HospitalizacionBundle\Entity\Cama $cama) {
      if($paciente->getInternado()){
        $sesion=new Session();
        $em=$this->getEntityManager();
        // Extraer la cama del paciente antes de asignarle a otra cama
        $camaPaciente=  $this->findCamaDelPaciente($paciente);
        
        
        $admisionPaciente=$em->getRepository('CensoBundle:AdmisionPaciente')->findAdmisionPacienteVigente($paciente);
 //       $admisionPacientePorCama=$em->getRepository('CensoBundle:AdmisionPaciente')->findAdmisionPacienteVigenteByCamaPaciente($camaPaciente,$paciente);
        
//        $sesion->getFlashBag()->add('error', "para traslado Paciente: $paciente su cama:$camaPaciente cama traslado:$cama ");
        
        if($admisionPaciente!=NULL){
                if($admisionPaciente->getPaciente()->getInternado()){
                    /* ******   SI EXISTE PACIENTE EN LA CAMA CAMBIAR SU ESTADO A PENDIENTE   ****** */
                    $em->getRepository('HospitalizacionBundle:Cama')->cambiarEstadoPacienteAPendiente($cama);
                    
                    /**  REGISTRAR A NUEVO PACIENTE EN CAMA*/
                    $admisionCama=$em->getRepository('CensoBundle:AdmisionCama')->asignarCamaAdmision($admisionPaciente,$cama);

                    // Si Existe otro ac igual en todo (mismo dia, cama y admision) eliminar los del medio porque ha dado vueltas el paciente y termina en la misma cama
                    $admisionCamaIgual=$em->getRepository('CensoBundle:AdmisionCama')->encontrarAdmisionCamaIgual($admisionCama);
                    if($admisionCamaIgual!=NULL)$em->getRepository('CensoBundle:AdmisionCama')->eliminarAdmisiónCamaMedios($admisionCamaIgual,$admisionCama);
                    
                    
                    // cama actual Ocupada y verificada
                    $cama->setOcupada(TRUE);$em->persist($cama);
                    $em->getRepository('CensoBundle:Verificacioncama')->verificarCama($cama);

                    if($em->getRepository('PersonaBundle:Paciente')->pacienteEstaPendiente($paciente)){
                        $em->getRepository('PersonaBundle:Paciente')->cambiarEstadoPacienteANoPendiente($paciente);
                        $mensaje="Paciente  $paciente registrado en la cama $cama";
                    }else{
                        $camaPaciente->setOcupada(FALSE);$em->persist($camaPaciente);
                        $mensaje="Se traslado a Paciente $paciente a cama: $cama";
                    }
                    $em->flush();
                    $sesion->getFlashBag()->add('info', $mensaje);
                }else {
                    $sesion->getFlashBag()->add('error', "INCONSISTENCIA DE DATOS - Paciente ".$admisionPaciente->getPaciente()." tiene Admision Vigente pero esta NO INTERNADO ");
                }
         
        }else{
            $sesion->getFlashBag()->add('error', "ERROR DE INCONSISTENCIA Paciente no tiene admisión - AdmisionPaciente Nulo");
        }
      }
    }
    /**funcion para extraer directamente del formulario --- No esta en uso porque el trasformer reemplaza esto
     * 
     *
    public function findPacienteDelFormulario($datosFormulario) {
        // ecuperamos HC del formulario llenado
                    $hc=  Util::devolverHcPaciente($datosFormulario);
                    $session=new Session();
                    if ($hc!=NULL){
                        $em=  $this->getEntityManager();
                        $paciente= $this->importarHcSice($hc);
                        if($paciente!=NULL){
                            return $paciente;
                        }
                        else{
                            
                            $session->getFlashBag()->add('error','¡Debe introducir un paciente válido (existente en la lista)... No coincide H.C con paciente.!.');
                        }
                    }
                    else{
                        $session->getFlashBag()->add('error','¡Debe introducir un paciente válido (de la lista)!... ¡Dato sin H.C.!.');
                    }
                    return NULL;
    }/**/
 
}
