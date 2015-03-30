<?php
namespace Gastro\HospitalizacionBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gastro\HospitalizacionBundle\Entity\Servicio;

class Servicios implements FixtureInterface {
    public function load(ObjectManager $manager) {   

        $servicios = array(
            array('nombre' => 'Medicina') ,
            array('nombre' => 'Cirugia') ,
            array('nombre' => 'Unidad de terapia Intensiva') ,
            // ...
        );

        foreach ($servicios as $servicio) {
            $entidad = new Servicio() ;
            
            $entidad->setNombre($servicio['nombre' ] );

            $manager->persist($entidad) ;
        }
        $manager->flush() ;

    }
    
}
