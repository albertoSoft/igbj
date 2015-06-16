<?php
namespace Gastro\CensoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Gastro\CensoBundle\Entity\Verificacioncama;
use Gastro\HospitalizacionBundle\Form\Datatransformer\StringToCamaTransformer;

class CensoController extends Controller
{
    public function iniciarcamasAction(){
        $camaTransformer=new StringToCamaTransformer();
        
        $emSice= $GLOBALS['kernel']->getContainer()->get('doctrine')->getManager('sice');
        $camasSice=$emSice->getRepository('SiceBundle:SeCama')->findAllOrederBySalaCama();
        $i=1;
        foreach ($camasSice as $cama) {
            $camaSis[$i]=$camaTransformer->reverseTransform(''.$cama);
            $i++;
        }
        
        return $this->render('CensoBundle:Censo:iniciarcamas.html.twig',array('camas'=>$camasSice,'camas2'=>$camaSis));
    }
    public function confirmacamaAction($cama_id,$paciente_id=null) {
        
        ini_set('date.timezone','America/La_Paz'); 
        $horaActual=  date("H:i:s");
        $em=$this->getDoctrine()->getManager();
        
        if($paciente_id!=null){
            $msj='continua internado '.$em->getRepository('PersonaBundle:Paciente')->find($paciente_id);;
        }else{
            $msj=' sigue LIBRE';
        }

        $em->getRepository('CensoBundle:Verificacioncama')->verificarCama($cama_id);
        
        $this->get('session')->getFlashBag() ->add('info','¡Cama confirmada a Hrs. '.$horaActual.' '.$msj);

        return $this->redirect($this->generateUrl('pagina_inicial')); 
    }
}
