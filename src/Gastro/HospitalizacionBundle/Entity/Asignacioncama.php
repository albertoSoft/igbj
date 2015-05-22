<?php

namespace Gastro\HospitalizacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Asignacioncama
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gastro\HospitalizacionBundle\Entity\AsignacioncamaRepository")
 * @UniqueEntity(fields = {"admision", "cama"})
 */
class Asignacioncama
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
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime")
     * @Assert\NotBlank()
     * 
     */
    private $fecha;

    /** @ORM\ManyToOne(targetEntity="Gastro\HospitalizacionBundle\Entity\Admision") */
    private $admision;

    /** @ORM\ManyToOne(targetEntity="Gastro\HospitalizacionBundle\Entity\Cama") */
    private $cama;


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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Asignacioncama
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
     * Set admision
     *
     * @param string $admision
     * @return Asignacioncama
     */
    public function setAdmision(\Gastro\HospitalizacionBundle\Entity\Admision $admision)
    {
        $this->admision = $admision;

        return $this;
    }

    /**
     * Get admision
     *
     * @return string 
     */
    public function getAdmision()
    {
        return $this->admision;
    }

    /**
     * Set cama
     *
     * @param string $cama
     * @return Asignacioncama
     */
    public function setCama($cama)
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
}
