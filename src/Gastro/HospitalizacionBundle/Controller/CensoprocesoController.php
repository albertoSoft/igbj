<?php
namespace Gastro\HospitalizacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Gastro\CensoBundle\Entity\AdmisionPaciente;
use Gastro\CensoBundle\Form\AdmisionPacienteType;

use Symfony\Component\HttpFoundation\Session\Session;

class CensoprocesoController extends Controller
{
    public function camacambiaAction($cama_id) {
        
        return $this->render('HospitalizacionBundle:Censo:camacambia.html.twig',array('cama_id'=>$cama_id));
    }
    public function liberarcamaAction($cama_id) 
    {
        $em=$this->getDoctrine()->getManager();
        $cama=$em->getRepository('HospitalizacionBundle:Cama')->find($cama_id);
        $admisioncama=$em->getRepository('HospitalizacionBundle:Cama')->findPacienteEnCama($cama);
        /**
        $sesion=new Session();
        $sesion->getFlashBag()->add('error','Paciente: '.$admisioncama->getAdmisionPaciente()->getPaciente());
        /**/
        $admisioncama->getAdmisionPaciente()->setPendiente(TRUE);
        $em->persist($admisioncama);
        $em->flush();/**/
        return $this->redirect($this->generateUrl('pagina_inicial'));
    }
    public function pacienteAction($cama_id)
    {
        $trasladarPaciente=FALSE;
        $paciente=null;
        $request=$this->getRequest();
        
        $em=  $this->getDoctrine()->getManager();
        $emSice=  $this->getDoctrine()->getManager('sice');
        $cama=$em->getRepository('HospitalizacionBundle:Cama')->find($cama_id);
        $admisionPaciente=new AdmisionPaciente();//$admision=new Admision();
        $admisionPaciente->setFecharegistro(new \Datetime('today'));

        $formulario= $this->createForm(new AdmisionPacienteType(),$admisionPaciente );
        $formulario->handleRequest($request);
        
        if($formulario->isValid()){
            $paciente=$admisionPaciente->getPaciente();
            if($paciente->getInternado()){
                if($em->getRepository('PersonaBundle:Paciente')->comprobarPacienteEstaEnCama($paciente,$cama->getSigla())){
                    $this->get('session')->getFlashBag() ->add('error',"Paciente: $paciente ya se encuentra en la cama $cama ");
                }
                else {
                    $this->get('session')->getFlashBag() ->add('error',"Paciente: $paciente esta internado(a) en la cama ".$em->getRepository('PersonaBundle:Paciente')->findCamaDelPaciente($paciente));
                    $trasladarPaciente=TRUE;
                }
            }
            
            //******************** REGISTRO DE ADMISION SI NO HAY ERRORES
            if(!$this->get('session')->getFlashbag()->has('error')){
                
            }
        }
        $pacientes=$emSice->getRepository('SiceBundle:SeHc')->findRecientes();
        return $this->render('HospitalizacionBundle:Censo:pacienteregistro.html.twig', array('formulario' => $formulario->createView(),'pacientes'=>$pacientes,'cama'=>$cama,'paciente'=>$paciente,'traslado'=>$trasladarPaciente));
    }
    public function pacienteconfirmatrasladoAction($cama_id,$paciente_id) {
        return $this->render('HospitalizacionBundle:censo:pacienteregistroconf.html.twig');
    }
}
