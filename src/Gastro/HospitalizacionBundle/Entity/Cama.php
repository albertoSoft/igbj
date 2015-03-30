<?php

namespace Gastro\HospitalizacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cama
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Cama
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
     */
    private $nombre;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean", name="ocupada")
     */
    private $ocupada=false;

    /** @ORM\ManyToOne(targetEntity="Gastro\HospitalizacionBundle\Entity\Sala") */
    private $sala;

    /**
     *
     * @ORM\Column(type="integer")
     */
    Private $enumeracion;

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
     * @return Cama
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
     * Set ocupada
     *
     * @param boolean $ocupada
     * @return Cama
     */
    public function setOcupada($ocupada)
    {
        $this->ocupada = $ocupada;

        return $this;
    }

    /**
     * Get ocupada
     *
     * @return boolean 
     */
    public function getOcupada()
    {
        return $this->ocupada;
    }

    /**
     * Set sala
     *
     * @param string $sala
     * @return Cama
     */
    public function setSala(\Gastro\HospitalizacionBundle\Entity\Sala $sala)
    {
        $this->sala = $sala;

        return $this;
    }

    /**
     * Get sala
     *
     * @return string 
     */
    public function getSala()
    {
        return $this->sala;
    }

    /**
     * Set enumeracion
     *
     * @param integer $enumeracion
     * @return Cama
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
}
