<?php
namespace Gastro\HospitalizacionBundle\Entity;

use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityRepository;

use Gastro\SiceBundle\Entity\SeCama;
use Gastro\SiceBundle\Entity\SeSala;

use Gastro\SiceBundle\Util\Util;

class CamaRepository extends EntityRepository
{
    public function findPacienteEnCama($cama_id) {
        // *** falta por fecha
        $em=  $this->getEntityManager();
        $consulta=$em->createQuery('SELECT p,ac,c,ad '
                . 'FROM HospitalizacionBundle:AsignacionCama ac '
                . 'JOIN ac.cama c JOIN ac.admision ad JOIN ad.paciente p '
                . 'WHERE c.id=:cama_id AND c.ocupada=1'
                . 'ORDER BY ac.fecha DESC');
        
        $consulta->setParameter('cama_id', $cama_id);
        $consulta->setMaxResults(1);
        
        return $consulta->getOneOrNullResult();
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
