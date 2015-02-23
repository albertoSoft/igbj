<?php

namespace Gastro\PersonaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medico
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Medico
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
     * @ORM\Column(name="ideper", type="string", length=10)
     */
    private $ideper;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="patern", type="string", length=50)
     */
    private $patern;

    /**
     * @var string
     *
     * @ORM\Column(name="matern", type="string", length=50)
     */
    private $matern;

    /**
     * @var integer
     *
     * @ORM\Column(name="swmedi", type="smallint")
     */
    private $swmedi;


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
     * Set ideper
     *
     * @param string $ideper
     * @return Medico
     */
    public function setIdeper($ideper)
    {
        $this->ideper = $ideper;

        return $this;
    }

    /**
     * Get ideper
     *
     * @return string 
     */
    public function getIdeper()
    {
        return $this->ideper;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Medico
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
     * Set patern
     *
     * @param string $patern
     * @return Medico
     */
    public function setPatern($patern)
    {
        $this->patern = $patern;

        return $this;
    }

    /**
     * Get patern
     *
     * @return string 
     */
    public function getPatern()
    {
        return $this->patern;
    }

    /**
     * Set matern
     *
     * @param string $matern
     * @return Medico
     */
    public function setMatern($matern)
    {
        $this->matern = $matern;

        return $this;
    }

    /**
     * Get matern
     *
     * @return string 
     */
    public function getMatern()
    {
        return $this->matern;
    }

    /**
     * Set swmedi
     *
     * @param integer $swmedi
     * @return Medico
     */
    public function setSwmedi($swmedi)
    {
        $this->swmedi = $swmedi;

        return $this;
    }

    /**
     * Get swmedi
     *
     * @return integer 
     */
    public function getSwmedi()
    {
        return $this->swmedi;
    }
    public function __toString()
    {
        return $this->getPatern().' '.$this->getNombre();
    }
}
