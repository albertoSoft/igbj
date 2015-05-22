<?php
namespace Gastro\HospitalizacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Gastro\CensoBundle\Entity\AdmisionPaciente;
use Gastro\CensoBundle\Form\AdmisionPacienteType;

class CensoprocesoController extends Controller
{
    public function camacambiaAction() {
        return $this->render('HospitalizacionBundle:Censo:camacambia.html.twig');
    }
    public function camaliberarAction($cama_id) {
        
    }
    public function pacienteAction()
    {
        $em=  $this->getDoctrine()->getManager();
        $admisionPaciente=new AdmisionPaciente();//$admision=new Admision();
        $admisionPaciente->setFecharegistro(new \Datetime('today'));

        $formulario= $this->createForm(new AdmisionPacienteType(),$admisionPaciente );
        $pacientes=$em->getRepository('PersonaBundle:Paciente')->findAll();
        return $this->render('HospitalizacionBundle:Censo:pacienteregistro.html.twig', array('formulario' => $formulario->createView(),'pacientes'=>$pacientes));
    }
}
