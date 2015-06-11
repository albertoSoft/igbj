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
use Gastro\SiceBundle\Entity\SeHc;

use Gastro\PersonaBundle\Entity\Persona;

use Gastro\HospitalizacionBundle\Entity\Referidode;
use Gastro\HospitalizacionBundle\Form\ReferidodeType;

use Symfony\Component\HttpFoundation\JsonResponse;
use Gastro\HospitalizacionBundle\Util\Util;

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
        // para usar esto quitar Request $request    $request=$this->getRequest();
        $em=  $this->getDoctrine()->getManager();
        $emSice=  $this->getDoctrine()->getManager('sice');

        $asignacioncama=new Asignacioncama(); $asignacioncama->setFecha(new \DateTime('today'));
        $admision=new Admision();$admision->setPendiente(FALSE);
        $asignacioncama->setAdmision($admision);
        
        $formulario= $this->createForm(new asignacioncamaType(),$asignacioncama );
        
        $formulario->handleRequest($request);
        
        if($formulario->isValid()){
            // ****** PACIENTE
            $paciente=$em->getRepository('PersonaBundle:Paciente')->comprobarPaciente($asignacioncama->getAdmision()->getPaciente());
            
            // *************** CAMA
            $em->getRepository('HospitalizacionBundle:Cama')->comprobarCama($asignacioncama->getCama());
            
            //**************** SEGURO si se utiliza el listado SELECT con valores del SICE
            $seguro=$em->getRepository('HospitalizacionBundle:Seguro')->encontrarSeguroDesdeListaSice($formulario->get('admision')->get('tipoPaciente')->getData(),$formulario->get('admision')->get('seguro')->getData());
            if($seguro!=NULL)
                $em->getRepository('HospitalizacionBundle:Asignacioncama')->cambiarSeguro($asignacioncama,$seguro);
            else {
                $this->get('session')->getFlashBag() ->add('error','¡Registro correcto! seguro NULO tipopac: '.$formulario->get('admision')->get('tipoPaciente')->getData().' - Seguro: '.$formulario->get('admision')->get('seguro')->getData());
            }
            
            //******************** REGISTRO DE ADMISION SI NO HAY ERRORES
            if(!$this->get('session')->getFlashbag()->has('error')){
                $em->getRepository('HospitalizacionBundle:Asignacioncama')->registrarAdmisionycama($asignacioncama);
                // **** Codigo para cama confirmada
                $em->getRepository('CensoBundle:Verificacioncama')->verificarCama($asignacioncama->getCama()->getId());
                $this->get('session')->getFlashBag() ->add('info','¡Registro correcto! nueva admisión registrada. Paciente: '.$paciente);

                if ($formulario->get('referido')->getData()==1){
                    return $this->redirect($this->generateUrl('nueva_admision_referida',array('asignacioncama_id'=>$asignacioncama->getId())));
                }elseif($formulario->get('referido')->getData()==2){
                    return $this->redirect($this->generateUrl('nueva_admision'));
                } 
            }
        }
        $diagnosticos=$em->getRepository('HospitalizacionBundle:Diagnostico')->findAll();
        $pacientesSice=$emSice->getRepository('SiceBundle:SeHc')->findRecientes();
        $camas=$emSice->getRepository('SiceBundle:SeCama')->findAll();
        $medicos=$emSice->getRepository('SiceBundle:Perpersona')->findAllMedicos();
        $convenios=$emSice->getRepository('SiceBundle:Vshinstitu')->findAll();
        
        return $this->render('HospitalizacionBundle:Default:admision.html.twig', array('formulario' => $formulario->createView(),'diagnosticos'=>$diagnosticos,'pacSice'=>$pacientesSice,'camas'=>$camas,'medicos'=>$medicos,'convenios'=>$convenios));
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
    
    
    //***************** funciones auxiliares ... ¿llevar a Util?
    
    private function exportarHcSiceWeb($hc)
    {
        $em=  $this->getDoctrine()->getManager();
        $emSice=  $this->getDoctrine()->getManager('sice');

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
}
