<?php

namespace Gastro\HospitalizacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Admision
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Admision
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
     *
     * @ORM\ManyToOne(targetEntity="Gastro\HospitalizacionBundle\Entity\Diagnostico")
     */
    private $diagnostico;

    /**
     * @ORM\ManyToOne(targetEntity="Gastro\HospitalizacionBundle\Entity\Ingresapor")
     */
    private $ingresapor;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Gastro\HospitalizacionBundle\Entity\Servicio")
     * @Assert\NotNull(message="Debe elegir un valor")
     * @Assert\NotBlank(message="Debe elegir algun valor")
     */
    private $servicio;

    /**
     * @ORM\ManyToOne(targetEntity="Gastro\HospitalizacionBundle\Entity\Seguro")
     * @Assert\NotNull(message="Debe elegir un valor")
     * @Assert\NotBlank(message="Debe elegir algun valor")
     */
    private $seguro;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Gastro\PersonaBundle\Entity\Paciente")
     * @Assert\NotNull(message="Debe elegir un paciente")
     */
    private $paciente;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Gastro\PersonaBundle\Entity\Persona")
     */
    private $medico;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pendiente", type="boolean")
     */
    private $pendiente;


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
     * Set diagnostico
     *
     * @param string $diagnostico
     * @return Admision
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
     * Set ingresapor
     *
     * @param string $ingresapor
     * @return Admision
     */
    public function setIngresapor(\Gastro\HospitalizacionBundle\Entity\Ingresapor $ingresapor)
    {
        $this->ingresapor = $ingresapor;

        return $this;
    }

    /**
     * Get ingresapor
     *
     * @return string 
     */
    public function getIngresapor()
    {
        return $this->ingresapor;
    }

    /**
     * Set servicio
     *
     * @param string $servicio
     * @return Admision
     */
    public function setServicio(\Gastro\HospitalizacionBundle\Entity\Servicio $servicio)
    {
        $this->servicio = $servicio;

        return $this;
    }

    /**
     * Get servicio
     *
     * @return string 
     */
    public function getServicio()
    {
        return $this->servicio;
    }

    /**
     * Set seguro
     *
     * @param string $seguro
     * @return Admision
     */
    public function setSeguro(\Gastro\HospitalizacionBundle\Entity\Seguro $seguro)
    {
        $this->seguro = $seguro;

        return $this;
    }

    /**
     * Get seguro
     *
     * @return string 
     */
    public function getSeguro()
    {
        return $this->seguro;
    }

    /**
     * Set paciente
     *
     * @param string $paciente
     * @return Admision
     */
    public function setPaciente(\Gastro\PersonaBundle\Entity\Paciente $paciente)
    {
        $this->paciente = $paciente;

        return $this;
    }

    /**
     * Get paciente
     *
     * @return string 
     */
    public function getPaciente()
    {
        return $this->paciente;
    }

    /**
     * Set medico
     *
     * @param string $medico
     * @return Admision
     */
    public function setMedico(\Gastro\PersonaBundle\Entity\Persona $medico)
    {
        $this->medico = $medico;

        return $this;
    }

    /**
     * Get medico
     *
     * @return string 
     */
    public function getMedico()
    {
        return $this->medico;
    }

    /**
     * Set pendiente
     *
     * @param boolean $pendiente
     * @return Admision
     */
    public function setPendiente($pendiente)
    {
        $this->pendiente = $pendiente;

        return $this;
    }

    /**
     * Get pendiente
     *
     * @return boolean 
     */
    public function getPendiente()
    {
        return $this->pendiente;
    }
    public function __toString() {
        return ''.$this->getId();
    }
}
