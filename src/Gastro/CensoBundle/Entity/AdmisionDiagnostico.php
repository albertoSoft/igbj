<?php
namespace Gastro\CensoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * AdmisionDiagnostico
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class AdmisionDiagnostico {
    
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
     *
     * @ORM\ManyToOne(targetEntity="Gastro\HospitalizacionBundle\Entity\Diagnostico")
     * @Assert\NotNull(message="Debe elegir un valor")
     * @Assert\NotBlank(message="Debe elegir algun valor")
     */
    private $diagnostico;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Gastro\PersonaBundle\Entity\Persona")
     * @Assert\NotNull(message="Debe elegir un valor")
     * @Assert\NotBlank(message="Debe elegir algun valor")
     */
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
     * Set admisionPaciente
     *
     * @param string $admisionPaciente
     * @return AdmisionDiagnostico
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
     * Set diagnostico
     *
     * @param string $diagnostico
     * @return AdmisionDiagnostico
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
     * Set medico
     *
     * @param string $medico
     * @return AdmisionDiagnostico
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
}
