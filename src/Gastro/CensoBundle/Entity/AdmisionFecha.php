<?php

namespace Gastro\CensoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * AdmisionPaciente
 *
 * @ORM\Table(name="admisionfecha")
 * @ORM\Entity
 * @UniqueEntity("admisionPaciente")
 */
class AdmisionFecha
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /** @ORM\ManyToOne(targetEntity="Gastro\CensoBundle\Entity\AdmisionPaciente") */
    private $admisionPaciente;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechainternacion", type="datetime")
     * @Assert\NotBlank()
     * 
     */
    private $fechainternacion;
    
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
     * Set admisionPaciente
     *
     * @param string $admisionPaciente
     * @return AdmisionFecha
     */
    public function setAdmisionPaciente(\Gastro\CensoBundle\Entity\AdmisionPaciente $admisionPaciente)
    {
        $this->admisionPaciente = $admisionPaciente;

        return $this;
    }

    /**
     * Get admisionPaciente
     *
     * @return string 
     */
    public function getAdmisionPaciente()
    {
        return $this->admisionPaciente;
    }
    
     /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return AdmisionFecha
     */
    public function setFechainternacion($fecha)
    {
        $this->fechainternacion = $fecha;

        return $this;
    }

    /**
     * Get fechainternacion
     *
     * @return \DateTime 
     */
    public function getFechainternacion()
    {
        return $this->fechainternacion;
    }
}
