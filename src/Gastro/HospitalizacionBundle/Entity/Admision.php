<?php

namespace Gastro\HospitalizacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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

    /** @ORM\ManyToOne(targetEntity="Gastro\HospitalizacionBundle\Entity\Diagnostico") */
    private $diagnostico;
    /**
     * @var string
     *
     * @ORM\Column(name="ingresapor", type="string", length=30)
     */
    private $ingresapor;

    /** @ORM\ManyToOne(targetEntity="Gastro\HospitalizacionBundle\Entity\Servicio") */
    private $servicio;

    /**
     * @var string
     *
     * @ORM\Column(name="tipopac", type="string", length=50)
     */
    private $tipopac;

    /** @ORM\ManyToOne(targetEntity="Gastro\PersonaBundle\Entity\Paciente") */
    private $paciente;

    /** @ORM\ManyToOne(targetEntity="Gastro\PersonaBundle\Entity\Medico") */
    private $medico;


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
    public function setIngresapor($ingresapor)
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
     * Set tipopac
     *
     * @param string $tipopac
     * @return Admision
     */
    public function setTipopac($tipopac)
    {
        $this->tipopac = $tipopac;

        return $this;
    }

    /**
     * Get tipopac
     *
     * @return string 
     */
    public function getTipopac()
    {
        return $this->tipopac;
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
    public function setMedico(\Gastro\PersonaBundle\Entity\Medico $medico)
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
    public function __toString() {
        return $this->getPaciente();
    }
}
