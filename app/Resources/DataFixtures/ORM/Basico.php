<?php

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Gastro\HospitalizacionBundle\Entity\Servicio;
use Gastro\HospitalizacionBundle\Entity\Sala;
use Gastro\HospitalizacionBundle\Entity\Cama;

use \Gastro\PersonaBundle\Entity\Paciente;
use Gastro\PersonaBundle\Entity\Persona;

class Basico implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    public function load(ObjectManager $manager)
    {
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
        
        // Crear las 18 salas ()
        $servicios = $manager->getRepository('HospitalizacionBundle:Servicio')->findAll();

        $servicio = current($servicios);
        for ($i=1;$i<=18;$i++){
            $sala = new Sala() ;
            $sala->setNombre('Sala'.$i);
            $sala->setPiso(2);
            $sala->setEnumeracion($i);
            $sala->setServicio($servicio);
                
            $manager->persist($sala);
                
            if ($i==12){
                $servicio=next($servicios);
            }
            elseif ($i==17) {
                $servicio=next($servicios);
            }
        }
        $manager->flush() ;
        
        // Crear 2 camas por sala
        $salas = $manager->getRepository('HospitalizacionBundle:Sala')->findAll();
        
        
        foreach ($salas as $sala){
            $numCama=1;
            for ($i=1;$i<=2;$i++){
                $cama= new Cama();
                $cama->setEnumeracion($numCama);
                $cama->setNombre('Cama-'.$numCama);
                $cama->setOcupada(FALSE);
                $cama->setSala($sala);
                
                $manager->persist($cama);
                
                $numCama++;
            }
        }
        
        $manager->flush() ;
        
        $pacientes=array(
            array('hc'=>'1','nombre'=>'Juan Jose','appat'=>'Perez','apmat'=>'Quiroga','fechanac'=>new \DateTime('2005-01-01'),'sexo'=>'2','ci'=>'0','estciv'=>'soltero','teldom'=>'6455551','direcc'=>'junin #3'),
            array('hc'=>'2','nombre'=>'Jorge','appat'=>'Lopez','apmat'=>'Ortega','fechanac'=>new \DateTime('1990-06-15'),'sexo'=>'1','ci'=>'7654321','estciv'=>'casado','teldom'=>'6444444','direcc'=>'junin #152')
//            array('hc'=>'','nombre'=>'','appat'=>'','apmat'=>'','fechanac'=>'','sexo'=>'','ci'=>'','estciv'=>'','teldom'=>'','direcc'=>'junin#3')
            
        );
        foreach ($pacientes as $paciente) {
            $entidad=new Paciente();
            
            $entidad->setHc($paciente['hc']);
            $entidad->setAppat($paciente['appat']);
            $entidad->setApmat($paciente['apmat']);
            $entidad->setNombre($paciente['nombre']);
            $entidad->setCi($paciente['ci']);
            $entidad->setDirecc($paciente['direcc']);
            $entidad->setEstciv($paciente['estciv']);
            $entidad->setFechanac($paciente['fechanac']);
            $entidad->setSexo($paciente['sexo']);
            $entidad->setTeldom($paciente['teldom']);
            
            $manager->persist($entidad);
        }
        $manager->flush();
        
        $personas=array(
            array('ideper'=>'1','nombre'=>'Carlos Moises','patern'=>'Baldivieso','matern'=>'Jinés','swmedi'=>'1'),
            array('ideper'=>'7','nombre'=>'Maria Lux','patern'=>'Guzman','matern'=>'Polanco','swmedi'=>'2')
//            array('ideper'=>'','nombre'=>'','patern'=>'','matern'=>'','swmedi'=>'')
        );
        
        foreach ($personas as $persona) {
            $entidad=new Persona();
            
            $entidad->setIdeper($persona['ideper']);
            $entidad->setNombre($persona['nombre']);
            $entidad->setPatern($persona['patern']);
            $entidad->setMatern($persona['matern']);
            $entidad->setSwmedi($persona['swmedi']);
            
            $manager->persist($entidad);
        }
        $manager->flush();
    }
}