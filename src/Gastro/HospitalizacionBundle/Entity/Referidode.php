<?php

namespace Gastro\HospitalizacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Referidode
 *
 * @ORM\Table()
 * @ORM\Entity
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
     * @ORM\Column(name="establecimiento", type="string", length=255)
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
