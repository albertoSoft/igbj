<?php
namespace Gastro\CensoBundle\Entity;
use Doctrine\ORM\EntityRepository;

class TurnoverificacionRepository extends EntityRepository
{
    public function findTurnoActual() {
        ini_set('date.timezone','America/La_Paz'); 
        $horaActual=  date("H:i:s");
        $em=  $this->getEntityManager();
        
        $consulta=$em->createQuery('SELECT tv FROM CensoBundle:TurnoVerificacion tv WHERE :horaactual BETWEEN tv.horainicio AND tv.horafinal');
        $consulta->setParameter('horaactual', $horaActual);
        
        $turnoActual=$consulta->getOneOrNullResult();
        if ($turnoActual==NULL) {
            
            $consulta=$em->createQuery('SELECT tv FROM CensoBundle:Turnoverificacion tv where tv.horafinal<:horaactual order by tv.horafinal desc');
            $consulta->setParameter('horaactual', $horaActual);
            $turnoActual=$consulta->getOneOrNullResult();
            
            if ($turnoActual==NULL) {
                $a='SELECT * FROM igbjbase.turnoverificacion where horainicio>00:10:00 order by horainicio asc;';
                $consulta=$em->createQuery('SELECT tv FROM CensoBundle:Turnoverificacion tv where tv.horainicio>:horaactual order by tv.horainicio asc');
                $consulta->setParameter('horaactual', $horaActual);
                
                return $consulta->getOneOrNullResult();
            }
            else{
                return $turnoActual;
            }
        }
        else{
            return $turnoActual;
        }
    }
}
