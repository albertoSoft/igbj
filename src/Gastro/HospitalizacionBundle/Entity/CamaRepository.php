<?php
namespace Gastro\HospitalizacionBundle\Entity;

use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityRepository;

use Gastro\SiceBundle\Entity\SeCama;
use Gastro\SiceBundle\Entity\SeSala;
use Gastro\CensoBundle\Entity\AdmisionCama;
use Gastro\HospitalizacionBundle\Entity\Cama;

use Gastro\SiceBundle\Util\Util;

class CamaRepository extends EntityRepository
{
    public function findPacienteEnCama(Cama $cama,$fecha=null){
        $fecha=($fecha!=NULL)?$fecha:new \DateTime('today');
        $em=  $this->getEntityManager();
        $admisioncama=$em->getRepository('CensoBundle:AdmisionCama')->findAdmisionCamaVigenteByCama($cama,$fecha);
        if($admisioncama!=null){
            if($admisioncama->getAdmisionPaciente()->getPendiente()==TRUE){
                $paciente=NULL;
            }else{
                $paciente=$admisioncama->getAdmisionPaciente()->getPaciente();
            }
        }else{
            $paciente=NULL;
        }
        
        return $paciente;
        
    }
    
    public function existeCama($salaEnum,$camaLetra) {
        $em=  $this->getEntityManager();
        $camaEnum=Util::devolverEnumeracionCama($camaLetra);
        $sala=$em->getRepository('HospitalizacionBundle:Sala')->findOneByEnumeracion($salaEnum);
        $cama=$em->getRepository('HospitalizacionBundle:Cama')->findOneBy(array('sala'=>$sala->getId(),'enumeracion'=>$camaEnum));
        return $cama;
    }
    public function importarCamaSice($salaEnum,$camaLetra)
    {
        $cama=$this->existeCama($salaEnum, $camaLetra);
        if(!$cama){
            $camaEnum=Util::devolverEnumeracionCama($camaLetra);

            $em=  $this->getEntityManager();
            $emSice=$GLOBALS['kernel']->getContainer()->get('doctrine')->getManager('sice');

            $camaSice=new SeCama();
            $salaSice=$emSice->getRepository('SiceBundle:SeSala')->findOneBy(array('saEnum'=>$salaEnum));
            $camaSice=$emSice->getRepository('SiceBundle:SeCama')->findOneBy(array('sala'=>$salaSice->getSaCodigo(),'camEnum'=>$camaEnum));
            if($camaSice!=NULL){
                $cama=new Cama();
                $cama->setEnumeracion($camaSice->getCamEnum());
                $cama->setNombre(Util::devolverLetraCama($camaSice->getCamEnum()));
                $cama->setOcupada(FALSE);

                $sala=$em->getRepository('HospitalizacionBundle:Sala')->findOneByEnumeracion($salaEnum);

                $cama->setSala($sala);

                $em->persist($cama);
                $em->flush();
            }
            else{
               $cama=NULL;
            }
        }
        return $cama;
    }
    
    public function importarCamaSiceVerificando($salaEnum,$camaLetra)
    {
        /**
        $session=new Session();
        if ($salaEnum!=NULL){
           if ($camaEnum!=NULL){
         */
               $cama= $this->importarCamaSice($salaEnum,$camaLetra);
                if($cama!=NULL){
                    return $cama;
                }
                else{
                    $session=new Session();
                    $session->getFlashBag()->add('error','¡Debe introducir una cama válida (seleccione de la lista)... No coincide con cama del SICE).! cama: '.$salaEnum.$camaEnum);
                }
                /**
            }
            else{
                $session->getFlashBag()->add('error','¡Debe introducir una cama válida (de la lista)!...Dato sin Letra de cama)');
            }
        }
        else{
            $session->getFlashBag()->add('error','¡Debe introducir una sala válida (de la lista)!... ¡Dato sin numero de Sala.!.');
        }
                 * 
                 */
        return NULL;
    }
    
    public function comprobarCama($cama) {
        if($cama!=NULL){
            if($cama->getOcupada()==TRUE){
                $session=new Session();
                $session->getFlashBag() ->add('error',"REGISTRO INCORRECTO¡ LA CAMA $cama YA ESTA OCUPADA !");}
        }
    }
    
    public function cambiarEstadoPacienteAPendiente(Cama $cama) {
        $em=  $this->getEntityManager();
        $admisioncama=$em->getRepository('CensoBundle:AdmisionCama')->findAdmisionCamaVigenteByCama($cama);
        if($admisioncama!=NULL){
            $admisioncama->getAdmisionPaciente()->setPendiente(TRUE);
            $em->persist($admisioncama);

            $unir=$em->getRepository('CensoBundle:AdmisionCama')->findAdmisionUnida($admisioncama);
            if($unir!=null){
                $unir->getAdmision()->setPendiente(TRUE);
                $em->persist($unir);
            }
            $em->flush();
            $sesion=new Session();
            $sesion->getFlashBag()->add('info', 'El paciente '.$admisioncama->getAdmisionPaciente()->getPaciente().' pasa a la lista PENDIENTE');
            return TRUE;
        }
        else {
            return FALSE;
        }
    }
    /*
     *esta funcion existe por defecto llamada con :   findOneBy(array('sala'=>$sala,'nombre'=>$cama)) 
     *
    public function findOneOrNullBySalaCama($sala,$cama){
        try {
            $em=$this->getEntityManager();
            $consulta=$em->createQuery('SELECT c,s FROM HospitalizacionBundle:Cama c JOIN c.sala s  WHERE s.enumeracion=:s_num AND c.nombre=:c_nom');

            $consulta->setParameter('s_num',$sala);
            $consulta->setParameter('c_nom',$cama);
            $consulta->setMaxResults(1);

            return $consulta->getSingleResult();

        }
        catch(\Doctrine\ORM\NoResultException $e) {
            return NULL;
        }
    }/**/
}
