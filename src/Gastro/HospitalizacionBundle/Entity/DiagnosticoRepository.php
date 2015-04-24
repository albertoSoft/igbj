<?php
namespace Gastro\HospitalizacionBundle\Entity;

use Doctrine\ORM\EntityRepository;


class DiagnosticoRepository extends EntityRepository
{
    public function findDiagnosticos($nombre) {
        $datos=array();
        $em=  $this->getEntityManager();

        $dql="SELECT d FROM HospitalizacionBundle:Diagnostico d WHERE d.nombre LIKE ':nombre%' OR d.codigo LIKE ':nombre%'";
        $consulta=$em->createQuery($dql);
        $consulta->setParameter('nombre', $nombre);
        
        $resultados= $consulta->getResult();
        foreach ($resultados as $diagnostico) {
            $datos[]=array('value'=>$diagnostico->getNombre().' - '
                                   .$diagnostico->getCodigo(),
                            'id'=>$diagnostico->getId());
        }
        return $datos;
    }
}
