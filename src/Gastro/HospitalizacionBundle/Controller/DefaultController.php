<?php

namespace Gastro\HospitalizacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Gastro\HospitalizacionBundle\Entity\Cama;
use Gastro\HospitalizacionBundle\Form\CamaType;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HospitalizacionBundle:Default:index.html.twig', array('name' => $name));
    }
    public function inicioAction()
    {
//        $cama=new Cama();
  //      $formulario=  $this->createForm(new CamaType(),$cama);
        
        $em=$this->getDoctrine()->getManager();
        $salas=  $em->getRepository('HospitalizacionBundle:Sala')->findAll();
        /*
        $formulario = $this->createFormBuilder()->getForm();
        $numsalas=0;*/
        foreach ($salas as $sala) {
            $camas[$sala->getId()]=$em->getRepository('HospitalizacionBundle:Cama')->findBySala($sala);
               
        }
        /**/
        return $this->render('HospitalizacionBundle:Default:inicio.html.twig',array('salas'=>$salas,'camas'=>$camas));//,array('formulario'=>$formulario->createView(),'salas'=>$numsalas));
    }
}
