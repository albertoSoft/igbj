<?php
//namespace Gastro\HospitalizacionBundle\Util ;

//use Gastro\HospitalizacionBundle\Entity\Diagnostico;
use Gastro\HospitalizacionBundle\Entity\DiagnosticoRepository;
/**
use Doctrine\ORM\EntityManager;

$em=  \Doctrine\ORM\Mapping\Entity::
/**/
$diagnostico=new DiagnosticoRepository();

echo json_encode($diagnostico->findDiagnosticos($_GET['term']));