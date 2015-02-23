<?php

namespace Gastro\PersonaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PersonaBundle:Default:index.html.twig', array('name' => $name));
    }
}
