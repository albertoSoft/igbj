<?php
namespace Gastro\HospitalizacionBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Gastro\HospitalizacionBundle\Entity\Sala;

class Salas implements FixtureInterface {
    public function load(ObjectManager $manager) {   

        $salas = array(
            array('nombre' => 'Madrid' , 'slug' => 'madrid' ) ,
            array('nombre' => 'Barcelona' , 'slug' => 'barcelona' ) ,
            // ...
        );

        foreach ($salas as $sala) {
            $sala = new Sala() ;
            $sala->setNombre($ciudad['nombre' ] ) ;
            $sala->setSlug($ciudad['slug' ] ) ;

            $manager->persist($sala) ;
        }
        $manager->flush() ;

    }
    
}
