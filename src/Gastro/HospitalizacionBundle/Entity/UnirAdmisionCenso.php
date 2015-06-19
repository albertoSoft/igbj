<?php
namespace Gastro\CensoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * AdmisionCama
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gastro\CensoBundle\Entity\UnirAdmisionCensoRepository")
 */
class UnirAdmisionCenso
{
    /*
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Gastro\HospitalizacionBundle\Entity\Admision") */
    private $admision;
    
    /*
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Gastro\CensoBundle\Entity\AdmisionPaciente") */
    private $admisionPaciente;
    
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
