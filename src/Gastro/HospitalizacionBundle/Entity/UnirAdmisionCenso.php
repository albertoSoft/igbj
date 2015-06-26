<?php
namespace Gastro\HospitalizacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * AdmisionCama
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gastro\HospitalizacionBundle\Entity\UnirAdmisionCensoRepository")
 * @UniqueEntity(fields={"admision", "admisionPaciente"}, message="solo deve existir una union entre Admision y Censo")
 */
class UnirAdmisionCenso
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /** @ORM\ManyToOne(targetEntity="Gastro\HospitalizacionBundle\Entity\Admision") */
    private $admision;
    
    /** @ORM\ManyToOne(targetEntity="Gastro\CensoBundle\Entity\AdmisionPaciente") */
    private $admisionPaciente;
    
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
     * Set admision
     *
     * @param string $admision
     * @return UnirAdmisionCenso
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
     * Set admisionPaciente
     *
     * @param string $admisionPaciente
     * @return UnirAdmisionCenso
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
}
