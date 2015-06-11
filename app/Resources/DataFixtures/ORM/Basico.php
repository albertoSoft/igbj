<?php

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Gastro\HospitalizacionBundle\Entity\Servicio;
use Gastro\HospitalizacionBundle\Entity\Sala;
use Gastro\HospitalizacionBundle\Entity\Cama;
use Gastro\HospitalizacionBundle\Entity\Seguro;

use Gastro\PersonaBundle\Entity\Paciente;
use Gastro\PersonaBundle\Entity\Persona;
use Gastro\HospitalizacionBundle\Entity\Diagnostico;
use Gastro\HospitalizacionBundle\Entity\Admision;
use Gastro\HospitalizacionBundle\Entity\Asignacioncama;

use Gastro\CensoBundle\Entity\Turnoverificacion;

class Basico implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    public function load(ObjectManager $manager)
    {
        $turnosverificacion=array(
            array('nombre'=>'mañana','horainicio'=>new \DateTime('0000-00-00 08:00:00'),'horafinal'=>new \DateTime('0000-00-00 14:00:0')),
            array('nombre'=>'tarde','horainicio'=>new \DateTime('0000-00-00 14:00:01'),'horafinal'=>new \DateTime('0000-00-00 19:00:00')),
//            array('nombre'=>'','horainicio'=>'','horafinal'=>''),
        );
        foreach ($turnosverificacion as $turno){
            $entidad= new Turnoverificacion();

            $entidad->setNombre($turno['nombre']);
            $entidad->setHorainicio($turno['horainicio']);
            $entidad->setHorafinal($turno['horafinal']);
            
            $manager->persist($entidad);
        }
        $seguros= array(
            array('sigla'=>'INSTITUCIONAL','nombre'=>'INSTITUCIONAL'),
/*            array('numero'=>'1','sigla'=>'P.P.S.S','nombre'=>'PROGRAMA DE PROTECCION SOCIAL EN SALUD'),
            array('numero'=>'2','sigla'=>'S.P.S (LEY 475)','nombre'=>'SEGURO PÚBLICON DE SALUD'),
            array('numero'=>'3','sigla'=>'S.C.C','nombre'=>'Seguro regional Caja Cordes'),
//            array('numero'=>'','sigla'=>'','nombre'=>''), /**/
        );
        foreach ($seguros as $seguro) {
            $entidad = new Seguro() ;
            
            $entidad->setSigla($seguro['sigla' ] );
            $entidad->setNombre($seguro['nombre' ] );

            $manager->persist($entidad) ;
        }
        $servicios = array(
            array('nombre' => 'H. CIRUGIA') ,
            array('nombre' => 'H. MEDICINA') ,
            array('nombre' => 'H. UTI') ,
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
            $letraCama=array(1=>'A',2=>'B',3=>'C',4=>'D',5=>'E',6=>'F',7=>'G',8=>'H',9=>'I');
            for ($i=1;$i<=2;$i++){
                $cama= new Cama();
                $cama->setEnumeracion($numCama);
                $cama->setNombre($letraCama[$numCama]);
                $cama->setOcupada(FALSE);
                $cama->setSala($sala);
                
                $manager->persist($cama);
                
                $numCama++;
            }
        }
        
        $manager->flush() ;
/*        
        $pacientes=array(
            array('hc'=>'1','nombre'=>'Juan Jose','appat'=>'Perez','apmat'=>'Quiroga','fechanac'=>new \DateTime('2005-01-01'),'sexo'=>'1','ci'=>'0','estciv'=>'soltero','teldom'=>'6455551','direcc'=>'junin #3'),
            array('hc'=>'2','nombre'=>'Jorge','appat'=>'Lopez','apmat'=>'Ortega','fechanac'=>new \DateTime('1990-06-15'),'sexo'=>'1','ci'=>'7654321','estciv'=>'casado','teldom'=>'6444444','direcc'=>'junin #152'),
            array('hc'=>'3','nombre'=>'Joaquina','appat'=>'Apaza','apmat'=>'Sainz','fechanac'=>new \DateTime('1970-03-11'),'sexo'=>'2','ci'=>'0','estciv'=>'viuda','teldom'=>'6453188','direcc'=>'Lapaz # 32'),
            array('hc'=>'4','nombre'=>'Josefa','appat'=>'Mujía','apmat'=>'Apaza','fechanac'=>new \DateTime('1977-08-21'),'sexo'=>'2','ci'=>'1026012','estciv'=>'divorciada','teldom'=>'6455726','direcc'=>'Ballivian #76'),
            array('hc'=>'5','nombre'=>'Elias','appat'=>'Colque','apmat'=>'Mendez','fechanac'=>new \DateTime('1988-05-14'),'sexo'=>'1','ci'=>'4235842','estciv'=>'concubinado','teldom'=>'6452230','direcc'=>'Calama # 12')
//            array('hc'=>'','nombre'=>'','appat'=>'','apmat'=>'','fechanac'=>,'sexo'=>'','ci'=>'','estciv'=>'','teldom'=>'','direcc'=>'junin#3')
            
        );
        foreach ($pacientes as $paciente) {
            $entidad=new Paciente();
            
            $entidad->setHc($paciente['hc']);
            $entidad->setAppat($paciente['appat']);
            $entidad->setApmat($paciente['apmat']);
            $entidad->setNombre($paciente['nombre']);
            $entidad->setRutafoto('foto'.$paciente['hc'].'.jpg');
            $entidad->setCi($paciente['ci']);
            $entidad->setDirecc($paciente['direcc']);
            $entidad->setEstciv($paciente['estciv']);
            $entidad->setFechanac($paciente['fechanac']);
            $entidad->setSexo($paciente['sexo']);
            $entidad->setTeldom($paciente['teldom']);
            $entidad->setInternado(FALSE);
            
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
        /**/
        $enfermedades=array(
            array('nombre'=>'ABDOMEN AGUDO','codigo'=>'R100'),
            array('nombre'=>'APENDICITIS AGUDA','codigo'=>'K35'),
            array('nombre'=>'OTROS TIPOS DE APENDICE','codigo'=>'K36'),
            array('nombre'=>'C.A. GASTRICO','codigo'=>'C16'),
            array('nombre'=>'C.A. ESTOMAGO','codigo'=>'C162')
//            array('nombre'=>'','codigo'=>''),
        );
        /**/
        foreach ($enfermedades as $enfermedad) {
            $diagnostico=new Diagnostico();
            
            $diagnostico->setNombre($enfermedad['nombre']);
            $diagnostico->setCodigo($enfermedad['codigo']);
            
            $manager->persist($diagnostico);
        }
        $manager->flush();/**/
        /**
        
        $ingresaPor='consulta externa';$tipoPac='SPS';unset($diagnostico);
//        for($i=1;$i<=1;$i++){
            
            $diagnostico_=new Diagnostico();$nd=  rand(1,5);
            $diagnostico_=$manager->getRepository('HospitalizacionBundle:Diagnostico')->find($nd);
            $servicio=new Servicio();
            $servicio=$manager->getRepository('HospitalizacionBundle:Servicio')->find(rand(1,3));
            $paciente=new Paciente();
            $paciente=$manager->getRepository('PersonaBundle:Paciente')->find(rand(1,5));
            $medico=new Persona();
            $medico=$manager->getRepository('PersonaBundle:Persona')->find(1);
            
            $admision=new Admision();
            
            $admision->setDiagnostico($diagnostico_);
            $admision->setServicio($servicio);
            $admision->setPaciente($paciente);
            $admision->setPersona($medico);
            $admision->setIngresapor($ingresaPor);
            $admision->setTipopac($tipoPac);
            
            $manager->persist($admision);
//        }
            $manager->flush();
            
            $cama=new Cama();
            $cama=$manager->getRepository('HospitalizacionBundle:Cama')->findOneById(rand(1,36));
            
            $asignacion=new Asignacioncama();
            $asignacion->setCama($cama);
            $asignacion->setAdmision($admision);
            $asignacion->setFecha(new \DateTime('today'));
            $asignacion->setHora(new \DateTime('today'));
            
            $manager->persist($asignacion);
            
            $manager->flush();
            
            $cama->setOcupada(TRUE);$paciente->setInternado(TRUE);
            $manager->persist($cama);$manager->persist($paciente);
            $manager->flush();
            /**/
            
    }
}