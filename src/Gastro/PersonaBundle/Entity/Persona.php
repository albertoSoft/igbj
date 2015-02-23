<?php

namespace Gastro\PersonaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Persona
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Persona
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
     * @var integer
     *
     * @ORM\Column(name="hc", type="integer")
     */
    private $hc;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="appat", type="string", length=50)
     */
    private $appat;

    /**
     * @var string
     *
     * @ORM\Column(name="apmat", type="string", length=50)
     */
    private $apmat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechanac", type="datetime")
     */
    private $fechanac;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=1)
     */
    private $sexo;

    /**
     * @var string
     *
     * @ORM\Column(name="ci", type="string", length=20)
     */
    private $ci;

    /**
     * @var string
     *
     * @ORM\Column(name="estciv", type="string", length=1)
     */
    private $estciv;

    /**
     * @var string
     *
     * @ORM\Column(name="teldom", type="string", length=50)
     */
    private $teldom;

    /**
     * @var string
     *
     * @ORM\Column(name="direcc", type="string", length=150)
     */
    private $direcc;


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
     * Set hc
     *
     * @param integer $hc
     * @return Persona
     */
    public function setHc($hc)
    {
        $this->hc = $hc;

        return $this;
    }

    /**
     * Get hc
     *
     * @return integer 
     */
    public function getHc()
    {
        return $this->hc;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return Persona
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
     * Set appat
     *
     * @param string $appat
     * @return Persona
     */
    public function setAppat($appat)
    {
        $this->appat = $appat;

        return $this;
    }

    /**
     * Get appat
     *
     * @return string 
     */
    public function getAppat()
    {
        return $this->appat;
    }

    /**
     * Set apmat
     *
     * @param string $apmat
     * @return Persona
     */
    public function setApmat($apmat)
    {
        $this->apmat = $apmat;

        return $this;
    }

    /**
     * Get apmat
     *
     * @return string 
     */
    public function getApmat()
    {
        return $this->apmat;
    }

    /**
     * Set fechanac
     *
     * @param \DateTime $fechanac
     * @return Persona
     */
    public function setFechanac($fechanac)
    {
        $this->fechanac = $fechanac;

        return $this;
    }

    /**
     * Get fechanac
     *
     * @return \DateTime 
     */
    public function getFechanac()
    {
        return $this->fechanac;
    }

    /**
     * Set sexo
     *
     * @param string $sexo
     * @return Persona
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set ci
     *
     * @param string $ci
     * @return Persona
     */
    public function setCi($ci)
    {
        $this->ci = $ci;

        return $this;
    }

    /**
     * Get ci
     *
     * @return string 
     */
    public function getCi()
    {
        return $this->ci;
    }

    /**
     * Set estciv
     *
     * @param string $estciv
     * @return Persona
     */
    public function setEstciv($estciv)
    {
        $this->estciv = $estciv;

        return $this;
    }

    /**
     * Get estciv
     *
     * @return string 
     */
    public function getEstciv()
    {
        return $this->estciv;
    }

    /**
     * Set teldom
     *
     * @param string $teldom
     * @return Persona
     */
    public function setTeldom($teldom)
    {
        $this->teldom = $teldom;

        return $this;
    }

    /**
     * Get teldom
     *
     * @return string 
     */
    public function getTeldom()
    {
        return $this->teldom;
    }

    /**
     * Set direcc
     *
     * @param string $direcc
     * @return Persona
     */
    public function setDirecc($direcc)
    {
        $this->direcc = $direcc;

        return $this;
    }

    /**
     * Get direcc
     *
     * @return string 
     */
    public function getDirecc()
    {
        return $this->direcc;
    }
    public function __toString()
    {
        return $this->getNombre().' '.$this->getAppat();
    }
}
