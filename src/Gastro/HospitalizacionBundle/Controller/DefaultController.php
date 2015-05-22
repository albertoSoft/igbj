<?php

namespace Gastro\HospitalizacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Gastro\HospitalizacionBundle\Entity\Cama;
use Gastro\HospitalizacionBundle\Form\CamaType;

use Gastro\HospitalizacionBundle\Entity\Admision;
use Gastro\HospitalizacionBundle\Form\admisionType;

use Gastro\HospitalizacionBundle\Entity\Asignacioncama;
use Gastro\HospitalizacionBundle\Form\asignacioncamaType;

use Gastro\PersonaBundle\Entity\Paciente;
use Gastro\PersonaBundle\Entity\Persona;

use Gastro\HospitalizacionBundle\Entity\Referidode;
use Gastro\HospitalizacionBundle\Form\ReferidodeType;

use Symfony\Component\HttpFoundation\JsonResponse;
//use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function inicioAction()
    {
        $em=$this->getDoctrine()->getManager();
        $salas=  $em->getRepository('HospitalizacionBundle:Sala')->findAll();

        foreach ($salas as $sala) {
            $camas[$sala->getId()]=$em->getRepository('HospitalizacionBundle:Cama')->findBySala($sala);
            foreach ($camas[$sala->getId()] as $cama) {
                $pacientes[$cama->getId()]=$em->getRepository('HospitalizacionBundle:Cama')->findPacienteEnCama($cama->getId());
                $camasVerificadas[$cama->getId()]=$em->getRepository('CensoBundle:Verificacioncama')->camaVerificada($cama->getId());
            }
        }
        return $this->render('HospitalizacionBundle:Default:inicio.html.twig',array('salas'=>$salas,'camas'=>$camas,'pacientes'=>$pacientes,'camasVerificadas'=>$camasVerificadas));
    }
    
    public function admisionAction(Request $request)
    {     
        $em=  $this->getDoctrine()->getManager();

        $asignacioncama=new Asignacioncama();
        $asignacioncama->setFecha(new \DateTime('today'));
        $admision=new Admision();$admision->setPendiente(FALSE);
        $asignacioncama->setAdmision($admision);
        
        $formulario= $this->createForm(new asignacioncamaType(),$asignacioncama );
        
        $formulario->handleRequest($request);
        
        if($formulario->isValid()){
            $cama=new Cama();
            $cama=$asignacioncama->getCama();
            
            if($cama->getOcupada()==FALSE){
                $paciente=new Paciente();
                $paciente=$asignacioncama->getAdmision()->getPaciente();
                
               if($paciente->getInternado()==FALSE){
                    $em->getRepository('HospitalizacionBundle:Asignacioncama')->registrarAdmisionycama($asignacioncama);
                    // **** Codigo para cama confirmada
                    $em->getRepository('CensoBundle:Verificacioncama')->verificarCama($cama->getId());


                    $this->get('session')->getFlashBag() ->add('info','¡Registro correcto! nueva admisión registrada. ');

                    if ($formulario->get('referido')->getData()==1){
                        return $this->redirect($this->generateUrl('nueva_admision_referida',array('asignacioncama_id'=>$asignacioncama->getId())));
                    }elseif($formulario->get('referido')->getData()==2){
                        return $this->redirect($this->generateUrl('nueva_admision'));
                    } 
                }
                else {
                    $this->get('session')->getFlashBag() ->add('error','REGISTRO INCORRECTO¡ EL PACIENTE "'.$paciente.'" ACTUALMENTE ESTA INTERNADO!');
                }
            }  else {
                $this->get('session')->getFlashBag() ->add('error','REGISTRO INCORRECTO¡ LA CAMA  YA ESTA OCUPADA !');
                $paciente=new Paciente();
                $paciente=$asignacioncama->getAdmision()->getPaciente();
                
                if($paciente->getInternado()){
                   $this->get('session')->getFlashBag() ->add('error','y EL PACIENTE "'.$paciente.'" ACTUALMENTE ESTA INTERNADO!');
                }
            }  
        }
        $emSice=  $this->getDoctrine()->getManager('sice');
        $diagnosticos=$em->getRepository('HospitalizacionBundle:Diagnostico')->findAll();
        $pacientes=$em->getRepository('PersonaBundle:Paciente')->findAll();

        $pacientesSice=$emSice->getRepository('SiceBundle:SeHc')->findRecientes();
        $camas=$em->getRepository('HospitalizacionBundle:Cama')->findAll();
        $medicos=$em->getRepository('PersonaBundle:Persona')->findAllMedicos();
        
        return $this->render('HospitalizacionBundle:Default:admision.html.twig', array('formulario' => $formulario->createView(),'diagnosticos'=>$diagnosticos,'pacientes'=>$pacientes,'pacSice'=>$pacientesSice,'camas'=>$camas,'medicos'=>$medicos));
    }
    public function admisionreferidaAction($asignacioncama_id){
        $em=  $this->getDoctrine()->getManager();
        $asignacioncama=$em->getRepository('HospitalizacionBundle:Asignacioncama')->find($asignacioncama_id);
        $admision=$asignacioncama->getAdmision();
        
        $referidode=new Referidode();
        $referidode->setAdmision($admision);
        
        $formulario= $this->createForm(new ReferidodeType(),$referidode );
        /**
        $formulario->handleRequest($request);
        
        if($formulario->isValid()){
            
        }/**/
        
        return $this->render('HospitalizacionBundle:Default:admisionreferida.html.twig',array('formulario' => $formulario->createView(),'admision'=>$admision,'asignacioncama'=>$asignacioncama) );
    }

    public function listardiagnosticosAction($clave=null) {
        
        $em=$this->getDoctrine()->getManager();        
        $diagnosticos=$em->getRepository('HospitalizacionBundle:Diagnostico')->findDiagnosticos($clave);

        return $this->render('HospitalizacionBundle:Default:listardiagnoaticos.html.twig',array('diagnosticos'=>$diagnosticos));
    }
    public function arraydiagnosticosAction(Request $request) {
        try {
            $id=$request->get('term',null);
            
            //$id=$this->getRequest()->get('_term');
            
            $em=$this->getDoctrine()->getManager();
            if ($id!=null){
                $diagnosticos=$em->getRepository('HospitalizacionBundle:Diagnostico')->findDiagnosticos($id);
            }else {
                $diagnosticos=$em->getRepository('HospitalizacionBundle:Diagnostico')->findAll();
            }
            $arrayDiag=array();
            foreach ($diagnosticos as $diagnostico){
                $arrayDiag[]=array('value'=>''.$diagnostico);
            }

            return new JsonResponse($arrayDiag);

        } catch (\Exception $exception) {

            return new JsonResponse([
                'success' => false,
                'code'    => $exception->getCode(),
                'message' => $exception->getMessage(),
            ]);

        }
    }
}
