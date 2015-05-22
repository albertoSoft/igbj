<?php

namespace Gastro\SiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SiceBundle:Default:index.html.twig', array('name' => $name));
    }
}
