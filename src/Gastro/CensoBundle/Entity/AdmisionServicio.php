<?php
namespace Gastro\CensoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * AdmisionServicio
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class AdmisionServicio {
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** @ORM\OneToOne(targetEntity="Gastro\CensoBundle\Entity\AdmisionPaciente") */
    private $admisionPaciente;
    
    /**
     *
     * @ORM\ManyToOne(targetEntity="Gastro\HospitalizacionBundle\Entity\Servicio")
     * @Assert\NotNull(message="Debe elegir un valor")
     * @Assert\NotBlank(message="Debe elegir algun valor")
     */
    private $servicio;
    
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
     * Set servicio
     *
     * @param string $servicio
     * @return AdmisionServicio
     */
    public function setServicio(\Gastro\HospitalizacionBundle\Entity\Servicio $servicio)
    {
        $this->servicio = $servicio;

        return $this;
    }

    /**
     * Get servicio
     *
     * @return string 
     */
    public function getServicio()
    {
        return $this->servicio;
    }
}
