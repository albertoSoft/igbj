<?php

namespace Gastro\CensoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Gastro\CensoBundle\Entity\Verificacioncama;

class CensoController extends Controller
{    
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
