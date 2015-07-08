<?php
namespace Gastro\CensoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * AdmisionIngresapor
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class AdmisionIngresapor {
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** @ORM\OneToOne(targetEntity="Gastro\CensoBundle\Entity\AdmisionPaciente")
     * @Assert\NotNull(message="Debe elegir un valor")
     * @Assert\NotBlank(message="Debe elegir algun valor")
     *  */
    private $admisionPaciente;
    
    /**
     * @ORM\ManyToOne(targetEntity="Gastro\HospitalizacionBundle\Entity\Ingresapor")
     * @Assert\NotNull(message="Debe elegir un valor")
     * @Assert\NotBlank(message="Debe elegir algun valor")
     */
    private $ingresapor;
    
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
     * Set ingresapor
     *
     * @param string $ingresapor
     * @return AdmisionIngresapor
     */
    public function setIngresapor(\Gastro\HospitalizacionBundle\Entity\Ingresapor $ingresapor)
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
}
