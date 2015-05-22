<?php
namespace Gastro\CensoBundle\Entity;
use Doctrine\ORM\EntityRepository;

class VerificacioncamaRepository extends EntityRepository
{
    //***** funcion devuelva verdadero  si la cama ha sido verificada
    public function camaVerificada($cama_id) {
        
        $em=  $this->getEntityManager();
        $turnoActual=$em->getRepository('CensoBundle:Turnoverificacion')->findTurnoActual();
        $dql='SELECT vc,c FROM CensoBundle:Verificacioncama vc JOIN vc.cama c WHERE vc.fecha=:hoy AND vc.turnoverificacion=:turno AND c.id=:cama_id';
        $consulta=$em->createQuery($dql);
        $consulta->setParameter('cama_id', $cama_id);
        $consulta->setParameter('hoy', new \DateTime('today'));
        $consulta->setParameter('turno', $turnoActual);
        $consulta->setMaxResults(1);
        
        if($consulta->getOneOrNullResult()==null)
            return FALSE;
        else
            return TRUE;

    }
    public function verificarCama($cama_id) {
        $camaVerificada=  $this->camaVerificada($cama_id);
        if (!$camaVerificada){
            $em=  $this->getEntityManager();
            $verificacionCama=new Verificacioncama();
            $verificacionCama->setCama($em->getRepository('HospitalizacionBundle:Cama')->find($cama_id));
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
