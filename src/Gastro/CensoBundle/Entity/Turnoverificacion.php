<?php

namespace Gastro\CensoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Turnoverificacion
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Gastro\CensoBundle\Entity\TurnoverificacionRepository")
 */
class Turnoverificacion
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
     * @ORM\Column(name="nombre", type="string", length=100)
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horainicio", type="time")
     */
    private $horainicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horafinal", type="time")
     */
    private $horafinal;


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
     * @return Turnoverificacion
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
     * Set horainicio
     *
     * @param \DateTime $horainicio
     * @return Turnoverificacion
     */
    public function setHorainicio($horainicio)
    {
        $this->horainicio = $horainicio;

        return $this;
    }

    /**
     * Get horainicio
     *
     * @return \DateTime 
     */
    public function getHorainicio()
    {
        return $this->horainicio;
    }

    /**
     * Set horafinal
     *
     * @param \DateTime $horafinal
     * @return Turnoverificacion
     */
    public function setHorafinal($horafinal)
    {
        $this->horafinal = $horafinal;

        return $this;
    }

    /**
     * Get horafinal
     *
     * @return \DateTime 
     */
    public function getHorafinal()
    {
        return $this->horafinal;
    }
}
