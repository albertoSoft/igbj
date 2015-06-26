<?php
namespace Gastro\CensoBundle\Entity;
use Doctrine\ORM\EntityRepository;
use Gastro\HospitalizacionBundle\Entity\Cama;

class VerificacioncamaRepository extends EntityRepository
{
    //***** funcion devuelva verdadero  si la cama ha sido verificada
    public function camaVerificada(Cama $cama) {
        
        $em=  $this->getEntityManager();
        $turnoActual=$em->getRepository('CensoBundle:Turnoverificacion')->findTurnoActual();
        
        $consulta=$em->createQuery('SELECT vc,c '
                                    . 'FROM CensoBundle:Verificacioncama vc JOIN vc.cama c '
                                    . 'WHERE vc.fecha=:hoy '
                                    . 'AND vc.turnoverificacion=:turno '
                                    . 'AND c.id=:cama_id');
        $consulta->setParameter('cama_id', $cama->getId());
        $consulta->setParameter('hoy', new \DateTime('today'));
        $consulta->setParameter('turno', $turnoActual);
        $consulta->setMaxResults(1);
        
        if($consulta->getOneOrNullResult()==null)
            return FALSE;
        else
            return TRUE;

    }
    public function verificarCama(Cama $cama) {
        
        if (!$this->camaVerificada($cama)){
            $em=  $this->getEntityManager();
            $verificacionCama=new Verificacioncama();
            $verificacionCama->setCama($cama);
            $verificacionCama->setTurnoverificacion($em->getRepository('CensoBundle:Turnoverificacion')->findTurnoActual());
            $verificacionCama->setFecha(new \DateTime('today'));
            $em->persist($verificacionCama);
            $em->flush();
            
//            $this->get('session')->getFlashBag() ->add('info','¡Cama '.$cama.' confirmada a Hrs. '.$horaActual.' '.$msj);
            return true;
        }else{
//            $this->get('session')->getFlashBag() ->add('error','Esta cama ya estaba confirmada...');
            return false;
        }
    }
}
