<?php

namespace Gastro\HospitalizacionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HospitalizacionBundle:Default:index.html.twig', array('name' => $name));
    }
    public function inicioAction()
    {
        return $this->render('HospitalizacionBundle:Default:inicio.html.twig');
    }
}
