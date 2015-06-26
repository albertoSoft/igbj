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
        $liminferior=95000;
        $limsuperior=900000;
        $em=  $this->getEntityManager();
        $dql="SELECT hc.hclCodigo,hc.hclAppat,hc.hclApmat,hc.hclNombre FROM SiceBundle:SeHc hc WHERE hc.hclCodigo>:liminf AND hc.hclCodigo<:limsup ORDER BY hc.hclAppat,hc.hclApmat,hc.hclNombre,hc.hclCodigo DESC";
        $consulta=$em->createQuery($dql);
        $consulta->setParameter('liminf', $liminferior);
        $consulta->setParameter('limsup', $limsuperior);
        $consulta->setMaxResults(100000);
        
        return $consulta->getResult();
    }
    public function findHcRecientes() {
        $liminferior=95000;
        $limsuperior=900000;
        $em=  $this->getEntityManager();
        $dql="SELECT hc FROM SiceBundle:SeHc hc WHERE hc.hclCodigo>:liminf AND hc.hclCodigo<:limsup ORDER BY hc.hclAppat,hc.hclApmat,hc.hclNombre,hc.hclCodigo DESC";
        $consulta=$em->createQuery($dql);
        $consulta->setParameter('liminf', $liminferior);
        $consulta->setParameter('limsup', $limsuperior);
        $consulta->setMaxResults(1000);
        
        return $consulta->getResult();
    }
    public function findHcPorDato($datoPaciente) {
        $em=  $this->getEntityManager();
        $datoPaciente=  trim($datoPaciente);
        
        
        if (strlen($datoPaciente)>0) {
            $primera=  strstr($datoPaciente,' ',TRUE); $segunda=false; $tercera=false;
            if ($primera!=FALSE){
                $resto=  trim(strstr($datoPaciente,' '));
                $segunda=strstr($resto,' ',true);
                if ($segunda!=FALSE)    $tercera=  trim(strstr($resto,' '));
                               else     $segunda=  $resto;               
            }  else $primera=$datoPaciente;
            
            if ($tercera!=false){
                $sql="SELECT hc FROM SiceBundle:SeHc hc WHERE (hc.hclAppat LIKE :primera AND hc.hclApmat LIKE :segunda AND hc.hclNombre LIKE :tercera)";
                $consulta=$em->createQuery($sql);
                $consulta->setParameter('primera', $primera.'%');
                $consulta->setParameter('segunda', $segunda.'%');
                $consulta->setParameter('tercera', $tercera.'%');
                
            }elseif ($segunda!=false) {
                $sql="SELECT hc FROM SiceBundle:SeHc hc WHERE (hc.hclAppat LIKE :primera AND hc.hclNombre LIKE :segunda) OR (hc.hclAppat LIKE :primera AND hc.hclApmat LIKE :segunda)";
                $consulta=$em->createQuery($sql);
                $consulta->setParameter('primera', $primera.'%');
                $consulta->setParameter('segunda', $segunda.'%');
            }else {
                if (is_numeric($primera)){
                    $sql="SELECT hc FROM SiceBundle:SeHc hc WHERE hc.hclCodigo LIKE :primera";
                }else{
                    $sql="SELECT hc FROM SiceBundle:SeHc hc WHERE hc.hclNombre LIKE :primera OR hc.hclAppat LIKE :primera";
                }
                $consulta=$em->createQuery($sql);
                $consulta->setParameter('primera', $primera.'%');
            }
            
            
        /**
            $datos=array();
            while($row=  mysqli_fetch_array($resultado,MYSQL_ASSOC)){
                $datos[]=array('value'=>$row['appat'].' '
                                       .$row['apmat'].' '
                                       .$row['nombre'].' - '
                                        .$row['hc'],
                                'id'=>$row['id']);
            }/**/
        }
        $consulta->setMaxResults(50);   
        return $consulta->getResult();
    }
}
