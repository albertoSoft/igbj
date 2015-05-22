<?php

namespace Gastro\HospitalizacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Sala
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Sala
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
     * @ORM\Column(name="nombre", type="string", length=50)
     * @Assert\NotBlank()
     */
    private $nombre;

    /** @ORM\ManyToOne(targetEntity="Gastro\HospitalizacionBundle\Entity\Servicio") */
    private $servicio;
    
    /**
     *
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    Private $enumeracion;

     /**
     *
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    Private $piso;
    
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
     * Set nombre
     *
     * @param string $nombre
     * @return Sala
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set servicio
     *
     * @param string $servicio
     * @return Sala
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
    public function __toString() {
        return $this->getNombre().' de '.$this->getServicio();
    }

    /**
     * Set enumeracion
     *
     * @param integer $enumeracion
     * @return Sala
     */
    public function setEnumeracion($enumeracion)
    {
        $this->enumeracion = $enumeracion;

        return $this;
    }

    /**
     * Get enumeracion
     *
     * @return integer 
     */
    public function getEnumeracion()
    {
        return $this->enumeracion;
    }

    /**
     * Set piso
     *
     * @param integer $piso
     * @return Sala
     */
    public function setPiso($piso)
    {
        $this->piso = $piso;

        return $this;
    }

    /**
     * Get piso
     *
     * @return integer 
     */
    public function getPiso()
    {
        return $this->piso;
    }
}
