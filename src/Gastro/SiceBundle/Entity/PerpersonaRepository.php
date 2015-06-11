<?php
namespace Gastro\SiceBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Gastro\PersonaBundle\Entity\Persona;

class PerpersonaRepository extends EntityRepository
{
    public function findAllMedicos() {
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery('SELECT p '
                . 'FROM SiceBundle:Perpersona p '
                . 'WHERE p.pperswmedi=:cod_med '
                . 'ORDER BY p.pperpatern,p.ppermatern,p.ppernombre DESC');
        $consulta->setParameter('cod_med', 1);

        return $consulta->getResult();
    }
    public function importarPersonaSice($ideper)
    {
        $emSice=  $this->getEntityManager();
        try{
            $personaSice=$emSice->getRepository('SiceBundle:Perpersona')->find($ideper);
        }
        catch(Exception $e){
            $personaSice=NULL;
        }
                
        
        if($personaSice!=NULL){
            $persona=new Persona();
            $persona->setIdeper($personaSice->getPpercodper());
            $persona->setPatern($personaSice->getPperpatern() );
            $persona->setMatern($personaSice->getPpermatern() );
            $persona->setNombre($personaSice->getPpernombre() );
            $persona->setSwmedi($personaSice->getPperswmedi() );
            
            $em=$GLOBALS['kernel']->getContainer()->get('doctrine')->getManager();
            $em->persist($persona);
            $em->flush();
        }else{
            $persona=NULL;
        }
        return $persona;
    }
}
