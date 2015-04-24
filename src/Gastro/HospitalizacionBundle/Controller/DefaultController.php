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


class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HospitalizacionBundle:Default:index.html.twig', array('name' => $name));
    }
    public function inicioAction()
    {
        $em=$this->getDoctrine()->getManager();
        $salas=  $em->getRepository('HospitalizacionBundle:Sala')->findAll();

        foreach ($salas as $sala) {
            $camas[$sala->getId()]=$em->getRepository('HospitalizacionBundle:Cama')->findBySala($sala);
            foreach ($camas[$sala->getId()] as $cama) {
                $pacientes[$cama->getId()]=$em->getRepository('HospitalizacionBundle:Cama')->findPacienteEnCama($cama->getId());
            }
        }
        return $this->render('HospitalizacionBundle:Default:inicio.html.twig',array('salas'=>$salas,'camas'=>$camas,'pacientes'=>$pacientes));
    }
    
    public function admisionAction(Request $request)
    {     
        $em=  $this->getDoctrine()->getManager();
        $diagnosticos=$em->getRepository('HospitalizacionBundle:Diagnostico')->findAll();
        $pacientes=$em->getRepository('PersonaBundle:Paciente')->findAll();
        $camas=$em->getRepository('HospitalizacionBundle:Cama')->findAll();
        
        $asignacioncama=new Asignacioncama();
        $asignacioncama->setFecha(new \DateTime('today'));
        
        $formulario= $this->createForm(new asignacioncamaType(),$asignacioncama );
        
        $formulario->handleRequest($request);
        
        if($formulario->isValid()){
            $cama=new Cama();
            $cama=$asignacioncama->getCama();
            
            if($cama->getOcupada()==FALSE){
                $paciente=new Paciente();
                $paciente=$asignacioncama->getAdmision()->getPaciente();
                
               if($paciente->getInternado()==FALSE){
                    $admision=new Admision();
            
                    $admision=$asignacioncama->getAdmision();
                    $em->persist($admision);
                    
                    $asignacioncama->setAdmision($admision);
                    $em->persist($asignacioncama);
                    $em->flush();
                 
                    $cama=new Cama();                   $paciente=new Paciente();
                    $cama=$asignacioncama->getCama();   $paciente=$asignacioncama->getAdmision()->getPaciente();
                    $cama->setOcupada(TRUE);            $paciente->setInternado(TRUE);
                    $em->persist($cama);                $em->persist($paciente);
                   
                    $em->flush();

                    $this->get('session')->getFlashBag() ->add('info','¡Registro correcto! nueva admisión registrada1');

                    return $this->redirect($this->generateUrl('nueva_admision'));
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
        return $this->render('HospitalizacionBundle:Default:admision.html.twig', array('formulario' => $formulario->createView(),'diagnosticos'=>$diagnosticos,'pacientes'=>$pacientes,'camas'=>$camas));
    }
    public function listardiagnosticosAction() {
        
        $em=$this->getDoctrine()->getManager();        
        $diagnosticos=$em->getRepository('HospitalizacionBundle:Diagnostico')->findAll();

        return $this->render('HospitalizacionBundle:Default:listardiagnoaticos.html.twig',array('diagnosticos'=>$diagnosticos));
    }/**
    public function listadiagnosticosAction(Request $request) {
        
        $em=  $this->getDoctrine()->getManager();
        $diagnosticos=$em->getRepository('HospitalizacionBundle:Diagnostico')->findAll();
                
        return new JsonResponse(
            array_map(
                function ($val) {
                    return (string) $val;
                },
                $diagnosticos
            )
        );
    }/**/
}
