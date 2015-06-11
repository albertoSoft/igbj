<?php
namespace Gastro\SiceBundle\Entity;
use Doctrine\ORM\EntityRepository;

class VshinstituRepository extends EntityRepository
{
    public function devolverListaArray() {
        
        $em= $this->getEntityManager();
        $seguros=$em->getRepository('SiceBundle:Vshinstitu')->findAll();
        foreach ($seguros as $seguro) {
            $array[$seguro->getVinscodigo()]=trim($seguro->getVinsnombre());
        }
        
        return $array;
    }
}
