<?php

namespace Gastro\CensoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Verificacioncama
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gastro\CensoBundle\Entity\VerificacioncamaRepository")
 * @UniqueEntity(fields={"cama", "fecha", "turnoverificacion"})
 */
class Verificacioncama
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Gastro\HospitalizacionBundle\Entity\Cama")
     * @Assert\NotBlank()
     */
    private $cama;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     * @Assert\NotBlank()
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\ManyToOne(targetEntity="Gastro\CensoBundle\Entity\Turnoverificacion")
     * @Assert\NotBlank()
     */
    private $turnoverificacion;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cama
     *
     * @param string $cama
     * @return Verificacioncama
     */
    public function setCama(\Gastro\HospitalizacionBundle\Entity\Cama $cama)
    {
        $this->cama = $cama;

        return $this;
    }

    /**
     * Get cama
     *
     * @return string 
     */
    public function getCama()
    {
        return $this->cama;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Verificacioncama
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set turnoverificacion
     *
     * @param string $turnoverificacion
     * @return Verificacioncama
     */
    public function setTurnoverificacion(\Gastro\CensoBundle\Entity\Turnoverificacion $turnoverificacion)
    {
        $this->turnoverificacion = $turnoverificacion;

        return $this;
    }

    /**
     * Get turnoverificacion
     *
     * @return string 
     */
    public function getTurnoverificacion()
    {
        return $this->turnoverificacion;
    }
}
