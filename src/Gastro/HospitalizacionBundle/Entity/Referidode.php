<?php

namespace Gastro\HospitalizacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Referidode
 *
 * @ORM\Table()
 * @ORM\Entity
 * @UniqueEntity(fields = {"establecimiento", "admision"})
 */
class Referidode
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
     * @ORM\Column(name="tipo", type="string", length=255)
     * 
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="establecimiento", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $establecimiento;

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
     * Set tipo
     *
     * @param string $tipo
     * @return Referidode
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }
    
    /**
     * Set establecimiento
     *
     * @param string $establecimiento
     * @return Referidode
     */
    public function setEstablecimiento($establecimiento)
    {
        $this->establecimiento = $establecimiento;

        return $this;
    }

    /**
     * Get establecimiento
     *
     * @return string 
     */
    public function getEstablecimiento()
    {
        return $this->establecimiento;
    }

    /**
     * Set admision
     *
     * @param string $admision
     * @return Referidode
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
