<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Gastro\SiceBundle\Entity;
use Doctrine\ORM\EntityRepository;
/**
 * Description of SeHcRepository
 *
 * @author EstadisticaIS
 */
class SeHcRepository extends EntityRepository
{
    public function findRecientes() {
        $liminferior=90000;
        $limsuperior=900000;
        $em=  $this->getEntityManager();
        $dql="SELECT hc.hclCodigo,hc.hclAppat,hc.hclApmat,hc.hclNombre FROM SiceBundle:SeHc hc WHERE hc.hclCodigo>:liminf AND hc.hclCodigo<:limsup ORDER BY hc.hclCodigo DESC";
        $consulta=$em->createQuery($dql);
        $consulta->setParameter('liminf', $liminferior);
        $consulta->setParameter('limsup', $limsuperior);
        $consulta->setMaxResults(100000);
        
        return $consulta->getResult();
    }
}
