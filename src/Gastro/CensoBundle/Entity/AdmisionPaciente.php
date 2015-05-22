<?php

namespace Gastro\CensoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * AdmisionPaciente
 *
 * @ORM\Table(name="admisionpaciente")
 * @ORM\Entity
 * @UniqueEntity(fields = {"paciente", "fechainternacion"})
 */
class AdmisionPaciente {
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
     * @ORM\ManyToOne(targetEntity="Gastro\PersonaBundle\Entity\Paciente")
     */
    private $paciente;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecharegistro", type="datetime")
     * @Assert\NotBlank()
     * 
     */
    private $fecharegistro;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="pendiente", type="boolean")
     */
    private $pendiente; //pendiente ALTA
    
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
     * Set paciente
     *
     * @param string $paciente
     * @return AdmisionPaciente
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return AdmisionPaciente
     */
    public function setFecharegistro($fecha)
    {
        $this->fecharegistro = $fecha;

        return $this;
    }

    /**
     * Get fecharegistro
     *
     * @return \DateTime 
     */
    public function getFecharegistro()
    {
        return $this->fecharegistro;
    }
    
    /**
     * Set pendiente
     *
     * @param boolean $pendiente
     * @return AdmisionPaciente
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
        return $this->getId();
    }
}
