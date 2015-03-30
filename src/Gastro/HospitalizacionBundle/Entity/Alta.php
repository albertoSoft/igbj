<?php

namespace Gastro\HospitalizacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alta
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Alta
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
     */
    private $fecha;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="time")
     */
    private $hora;

    /** @ORM\ManyToOne(targetEntity="Gastro\PersonaBundle\Entity\Persona") */
    private $medico;

    /** @ORM\ManyToOne(targetEntity="Gastro\HospitalizacionBundle\Entity\Diagnostico") */
    private $diagnostico;

    /** @ORM\ManyToOne(targetEntity="Gastro\HospitalizacionBundle\Entity\Admision") */
    private $admision;


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
     * @return Alta
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
     * Set medico
     *
     * @param string $medico
     * @return Alta
     */
     /**
     * Set hora
     *
     * @param \DateTime $hora
     * @return Alta
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime 
     */
    public function getHora()
    {
        return $this->hora;
    }
    
    public function setPersona(\Gastro\PersonaBundle\Entity\Persona $medico)
    {
        $this->medico = $medico;

        return $this;
    }

    /**
     * Get medico
     *
     * @return string 
     */
    public function getPersona()
    {
        return $this->medico;
    }

    /**
     * Set diagnostico
     *
     * @param string $diagnostico
     * @return Alta
     */
    public function setDiagnostico(\Gastro\HospitalizacionBundle\Entity\Diagnostico $diagnostico)
    {
        $this->diagnostico = $diagnostico;

        return $this;
    }

    /**
     * Get diagnostico
     *
     * @return string 
     */
    public function getDiagnostico()
    {
        return $this->diagnostico;
    }

    /**
     * Set admision
     *
     * @param string $admision
     * @return Alta
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
}
