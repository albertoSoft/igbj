<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Gastro\CensoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Admision
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gastro\CensoBundle\Entity\AdmisionAltaRepository")
 * @UniqueEntity("admisionPaciente")
 */
class AdmisionAlta 
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
     * @ORM\Column(name="fecharegistro", type="datetime")
     * @Assert\NotBlank()
     * @Assert\NotNull()
     * 
     */
    private $fechaRegistro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaalta", type="datetime")
     * 
     */
    private $fechaAlta;
    
    /** @ORM\ManyToOne(targetEntity="Gastro\CensoBundle\Entity\AdmisionPaciente") */
    private $admisionPaciente;

    /** @ORM\ManyToOne(targetEntity="Gastro\CensoBundle\Entity\TipoAlta") */
    private $tipoAlta;


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
     * @return AdmisionAlta
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }

    /**
     * Get fechaRegistro
     *
     * @return \DateTime 
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

     /**
     * Set fechaAlta
     *
     * @param \DateTime $fecha
     * @return AdmisionAlta
     */
    public function setFecha($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fechaAlta;
    }

    /**
     * Set admisionPaciente
     *
     * @param string $admisionPaciente
     * @return AdmisionCama
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
     * Set tipoAlta
     *
     * @param string $tipoAlta
     * @return AdmisionAlta
     */
    public function setTipoAlta($tipoAlta)
    {
        $this->tipoAlta = $tipoAlta;

        return $this;
    }

    /**
     * Get tipoAlta
     *
     * @return string 
     */
    public function getTipoAlta()
    {
        return $this->tipoAlta;
    }
}
