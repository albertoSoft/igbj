<?php
namespace Gastro\CensoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * AdmisionTipoAtencion
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class AdmisionTipoAtencion {
    
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
     * @ORM\ManyToOne(targetEntity="Gastro\HospitalizacionBundle\Entity\Seguro")
     * @Assert\NotNull(message="Debe elegir un valor")
     * @Assert\NotBlank(message="Debe elegir algun valor")
     */
    private $seguro;
    
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
     * @return AdmisionTipoAtencion
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
     * Set seguro
     *
     * @param string $seguro
     * @return AdmisionTipoAtencion
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
}
