<?php
namespace Gastro\HospitalizacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Gastro\CensoBundle\Entity\AdmisionPaciente;
use Gastro\CensoBundle\Entity\AdmisionCama;
use Gastro\CensoBundle\Form\AdmisionPacienteType;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\JsonResponse;

use Gastro\CensoBundle\Entity\AdmisionFecha;
use Gastro\CensoBundle\Form\AdmisionFechaType;

use Gastro\CensoBundle\Entity\AdmisionDiagnostico;
use Gastro\CensoBundle\Form\AdmisionDiagnosticoType;

use Gastro\HospitalizacionBundle\Util\Util;

class CensoprocesoController extends Controller
{
    public function camacambiaAction($cama_id){
        
        return $this->render('HospitalizacionBundle:Censo:camacambia.html.twig',array('cama_id'=>$cama_id));
    }
    public function liberarcamaAction($cama_id) 
    {
        $em=$this->getDoctrine()->getManager();
        $cama=$em->getRepository('HospitalizacionBundle:Cama')->find($cama_id);
        
        $em->getRepository('HospitalizacionBundle:Cama')->cambiarEstadoPacienteAPendiente($cama);
        $cama->setOcupada(FALSE);$em->persist($cama);$em->flush();
        $em->getRepository('CensoBundle:Verificacioncama')->verificarCama($cama);

        return $this->redirect($this->generateUrl('pagina_inicial'));
    }
    
    public function registrarPacienteAction($cama_id)
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
     //       $pacienteAnterior=$em->getRepository('HospitalizacionBundle:Cama')->findPacienteEnCama($cama);
            $paciente=$admisionPaciente->getPaciente();
            if($paciente->getInternado()){
                $mismaCamaPaciente=$em->getRepository('PersonaBundle:Paciente')->comprobarPacienteEstaEnCama($paciente,$cama);
                if(!$em->getRepository('PersonaBundle:Paciente')->pacienteEstaPendiente($paciente)){
                    if($mismaCamaPaciente){
                        $this->get('session')->getFlashBag() ->add('error',"Paciente: $paciente ya se encuentra en la cama $cama ");
                    }
                    // Si el Paciente esta internado en otra cama se realiza el TRASLADO de cama
                    else {
                        $this->get('session')->getFlashBag() ->add('error',"Paciente: $paciente esta internado(a) en la cama ".$em->getRepository('PersonaBundle:Paciente')->findCamaDelPaciente($paciente));
                        $trasladarPaciente=TRUE;
                    }
                }
                // Paciente internado pero Pendiente - Se puede registrar Paciente porque esta internado pero esta pendiente
                else{
                   // SI registrar - Si es la misma cama del paciente Pendiente entonces pendiente=false
                    
                    if($mismaCamaPaciente){
                        if($em->getRepository('PersonaBundle:Paciente')->cambiarEstadoPacienteANoPendiente($paciente)){
                            $this->get('session')->getFlashBag() ->add('info',"Paciente pendiente $paciente volvió a la MISMA CAMA $cama");
                            $cama->setOcupada(TRUE);$em->persist($cama);$em->flush();
                        }
                        //***** aqui termina esto ya no es necesario FORMULARIO
                    }
                    // SI esta pendiente pero otra cama - se mantiene la AdmisionPaciente
                    else{
                         $em->getRepository('PersonaBundle:Paciente')->trasladarPacienteInternado($paciente,$cama);
                    }
                }
            }
            //paciente NO esta Internado Se puede registrar
            else {
                if($em->getRepository('CensoBundle:AdmisionPaciente')->findAdmisionPacienteVigente($paciente)==NULL){
                    $em->persist($admisionPaciente);$em->flush();
                    $em->getRepository('CensoBundle:AdmisionCama')->asignarCamaAdmision($admisionPaciente,$cama);
                    $em->getRepository('CensoBundle:Verificacioncama')->verificarCama($cama);
                    $paciente->setInternado(TRUE);$em->persist($paciente);$em->flush();
                    $this->get('session')->getFlashBag()->add('info',"Paciente $paciente fue internado a la cama $cama");
                }else{
                    $this->get('session')->getFlashBag() ->add('error','El paciente tiene una internación anterior que no fue dada de alta - ¡No se puede volver a internar!');
                }
            }
            
            //******************** REGISTRO DE ADMISION_PACIENTE SI NO HAY ERRORES BOrrar esto!!!!!!! llenar el else
            if(!$this->get('session')->getFlashbag()->has('error')){
              //   $this->get('session')->getFlashBag() ->add('info','¡¡¡¡¡¡ ....REGISTRO CORRECTO ...!!!  --- REDIREC');
              return $this->redirect($this->generateUrl('pagina_inicial'));
            }
        }
        $pacientes=$emSice->getRepository('SiceBundle:SeHc')->findRecientes();
        return $this->render('HospitalizacionBundle:Censo:pacienteregistro.html.twig', array('formulario' => $formulario->createView(),'pacientes'=>$pacientes,'cama'=>$cama,'paciente'=>$paciente,'traslado'=>$trasladarPaciente));
    }
    public function pacienteconfirmatrasladoAction($cama_id,$paciente_id) {

        $em=$this->getDoctrine()->getManager();
        
        $cama=$em->getRepository('HospitalizacionBundle:Cama')->find($cama_id);
        $paciente=$em->getRepository('PersonaBundle:Paciente')->find($paciente_id);
        
        $em->getRepository('PersonaBundle:Paciente')->trasladarPacienteInternado($paciente,$cama);

        return $this->redirect($this->generateUrl('pagina_inicial'));
    }
    
    
    
// *****************************************************************************    
    public function listaPacienteArrayAction(Request $request) {
        /**/
        try {
            $datoPaciente=$request->get('term',null);
            
            $emSice=$this->getDoctrine()->getManager('sice');
            if ($datoPaciente!=null){
                $pacientesSice=$emSice->getRepository('SiceBundle:SeHc')->findHcPorDato($datoPaciente);
            }else {
                $pacientesSice=$emSice->getRepository('SiceBundle:SeHc')->findHcRecientes();;
            }
            $arrayHc=array();$i=1;
            foreach ($pacientesSice as $hc){
                $arrayHc[]=array('value'=>''.$hc);
                $i++;
            }

            return new JsonResponse($arrayHc);

        } catch (\Exception $exception) {

            return new JsonResponse([
                'success' => false,
                'code'    => $exception->getCode(),
                'message' => $exception->getMessage(),
            ]);
        }/**/
     //return $this->redirect($this->generateUrl('pagina_inicial'));
    }
//**************** Datos Internacion *********************************************************************************************************
    
    public function datosinternacionAction($paciente_id) {
        setlocale(LC_ALL, "ES_ES");
        
        $em=  $this->getDoctrine()->getManager();
        $paciente=$em->getRepository('PersonaBundle:Paciente')->find($paciente_id);
        $admisionPaciente=$em->getRepository('CensoBundle:AdmisionPaciente')->findAdmisionPacienteVigente($paciente);
        $admisionCama=$em->getRepository('CensoBundle:AdmisionCama')->findUltimaAdmisionCama($admisionPaciente);
        $admisionFecha=$em->getRepository('CensoBundle:AdmisionFecha')->findOneByAdmisionPaciente($admisionPaciente);
        $admisionDiagnostico=$em->getRepository('CensoBundle:AdmisionDiagnostico')->findOneByAdmisionPaciente($admisionPaciente);
//        $ndiagnosticos=  count($admisionDiagnosticos);
        
        $fadmi=$admisionFecha!=NULL?Util::fechaEspanolCadena($admisionFecha->getFechainternacion()):'Sin definir - aprox. '.Util::fechaEspanolCadena($admisionPaciente->getFecharegistro());
        $diagnostico=$admisionDiagnostico!=NULL?$admisionDiagnostico->getDiagnostico():'Sin Diagnóstico';
        $medico=$admisionDiagnostico!=NULL?' - '.$admisionDiagnostico->getMedico():'';
        $variables=array('admisionpaciente'=>$admisionPaciente,
            'cama'=>$admisionCama->getCama(),
            'fadmi'=>$fadmi,
            'diagnostico'=>$diagnostico.$medico,
            
             );
        
        return $this->render('HospitalizacionBundle:Censo:datosinternacion.html.twig',$variables);
    }
    public function datosinternacionfechaAction($admisionpaciente_id) {
        
        $request=$this->getRequest();

        $em=  $this->getDoctrine()->getManager();
        $admisionPaciente=$em->getRepository('CensoBundle:AdmisionPaciente')->find($admisionpaciente_id);
        $admisionFecha=$em->getRepository('CensoBundle:AdmisionFecha')->findOneByAdmisionPaciente($admisionPaciente);
        if($admisionFecha==NULL){
            $admisionFecha=new AdmisionFecha();
            $admisionFecha->setAdmisionPaciente($admisionPaciente);
            $admisionFecha->setFechainternacion($admisionPaciente->getFechaRegistro());
        }
        $formulario= $this->createForm(new AdmisionFechaType(),$admisionFecha );
        $formulario->handleRequest($request);
        
        if($formulario->isValid()){
            if($admisionFecha->getFechainternacion()>$admisionPaciente->getFechaRegistro()){
                $this->get ('session')->getFlashBag()->add('error','La fecha de internación no puede ser mayor a la fecha del registro del paciente internado');
            }else{
                $dif=date_diff($admisionPaciente->getFechaRegistro(),$admisionFecha->getFechainternacion());
                $dif=$dif->format('%a')+0;
                if($dif>4)$this->get ('session')->getFlashBag()->add('error','Existe mucha diferencia entre la fecha de registro del paciente y la fecha de internacion. '.$dif.' dias' );
            }
            if(!$this->get ('session')->getFlashBag()->has('error')){
                $em->persist($admisionFecha);$em->flush();
                
                $this->get ('session')->getFlashBag()->add('info','Registro de Fecha de internación correcto');
                return $this->redirect($this->generateUrl('censo_datos_internacion',array('paciente_id'=>$admisionPaciente->getPaciente()->getId())));
            }
        }
        return $this->render('HospitalizacionBundle:Censo:datosinternacionfecha.html.twig',array('formulario' => $formulario->createView(),'admisionPaciente'=>$admisionPaciente));
    }
    public function datosinternaciondiagnosticoAction($admisionpaciente_id) {
        
        $request=$this->getRequest();

        $em=  $this->getDoctrine()->getManager();
        $admisionPaciente=$em->getRepository('CensoBundle:AdmisionPaciente')->find($admisionpaciente_id);
        
        $admisionDiagnostico=$em->getRepository('CensoBundle:AdmisionDiagnostico')->findOneByAdmisionPaciente($admisionPaciente);
        if($admisionDiagnostico==NULL){
            $admisionDiagnostico=new AdmisionDiagnostico();
            $admisionDiagnostico->setAdmisionPaciente($admisionPaciente);
      //      $admisionDiagnostico->setFechainternacion($admisionPaciente->getFechaRegistro());
        }
        $formulario= $this->createForm(new AdmisionDiagnosticoType(),$admisionDiagnostico);
        $formulario->handleRequest($request);
        
        if($formulario->isValid()){
            /** Validaciones
            if($admisionDiagnostico->getFechainternacion()>$admisionPaciente->getFechaRegistro()){
                $this->get ('session')->getFlashBag()->add('error','La fecha de internación no puede ser mayor a la fecha del registro del paciente internado');
            }else{
                $dif=date_diff($admisionPaciente->getFechaRegistro(),$admisionDiagnostico->getFechainternacion());
                $dif=$dif->format('%a')+0;
                if($dif>4)$this->get ('session')->getFlashBag()->add('error','Existe mucha diferencia entre la fecha de registro del paciente y la fecha de internacion. '.$dif.' dias' );
            }/**/
            if(!$this->get ('session')->getFlashBag()->has('error')){
                $em->persist($admisionDiagnostico);$em->flush();
                
                $this->get ('session')->getFlashBag()->add('info','Registro de Dagnostico de internación correcto');
                return $this->redirect($this->generateUrl('censo_datos_internacion',array('paciente_id'=>$admisionPaciente->getPaciente()->getId())));
            }/**/
        }
        $emSice=  $this->getDoctrine()->getManager('sice');
        $medicos=$emSice->getRepository('SiceBundle:Perpersona')->findAllMedicos();
        return $this->render('HospitalizacionBundle:Censo:datosinternaciondiagnostico.html.twig',array('formulario' => $formulario->createView(),'admisionPaciente'=>$admisionPaciente,'medicos'=>$medicos));
    }
}
