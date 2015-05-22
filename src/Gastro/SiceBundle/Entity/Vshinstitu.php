<?php

namespace Gastro\SiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vshinstitu
 *
 * @ORM\Table(name="vshinstitu")
 * @ORM\Entity
 */
class Vshinstitu
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Emp_Codigo", type="integer", nullable=true)
     */
    private $empCodigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="VINSCODIGO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $vinscodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="VINSNOMBRE", type="text", nullable=true)
     */
    private $vinsnombre;

    /**
     * @var string
     *
     * @ORM\Column(name="VINSPORCEN", type="decimal", precision=3, scale=0, nullable=true)
     */
    private $vinsporcen;

    /**
     * @var string
     *
     * @ORM\Column(name="VINSDIRECC", type="text", nullable=true)
     */
    private $vinsdirecc;

    /**
     * @var string
     *
     * @ORM\Column(name="VINSNUMRUC", type="text", nullable=true)
     */
    private $vinsnumruc;

    /**
     * @var integer
     *
     * @ORM\Column(name="Cu_Codigo", type="integer", nullable=true)
     */
    private $cuCodigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="Act_Codigo", type="integer", nullable=true)
     */
    private $actCodigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="VINSCATEGORIA", type="integer", nullable=true)
     */
    private $vinscategoria;

    /**
     * @var integer
     *
     * @ORM\Column(name="vinstipo", type="integer", nullable=true)
     */
    private $vinstipo;

    /**
     * @var string
     *
     * @ORM\Column(name="VINSESTADO", type="string", length=1, nullable=true)
     */
    private $vinsestado;

    /**
     * @var string
     *
     * @ORM\Column(name="VINSInforme", type="string", length=200, nullable=true)
     */
    private $vinsinforme;

    /**
     * @var string
     *
     * @ORM\Column(name="VINSTIPOINS", type="string", length=1, nullable=true)
     */
    private $vinstipoins;



    /**
     * Set empCodigo
     *
     * @param integer $empCodigo
     * @return Vshinstitu
     */
    public function setEmpCodigo($empCodigo)
    {
        $this->empCodigo = $empCodigo;

        return $this;
    }

    /**
     * Get empCodigo
     *
     * @return integer 
     */
    public function getEmpCodigo()
    {
        return $this->empCodigo;
    }

    /**
     * Get vinscodigo
     *
     * @return integer 
     */
    public function getVinscodigo()
    {
        return $this->vinscodigo;
    }

    /**
     * Set vinsnombre
     *
     * @param string $vinsnombre
     * @return Vshinstitu
     */
    public function setVinsnombre($vinsnombre)
    {
        $this->vinsnombre = $vinsnombre;

        return $this;
    }

    /**
     * Get vinsnombre
     *
     * @return string 
     */
    public function getVinsnombre()
    {
        return $this->vinsnombre;
    }

    /**
     * Set vinsporcen
     *
     * @param string $vinsporcen
     * @return Vshinstitu
     */
    public function setVinsporcen($vinsporcen)
    {
        $this->vinsporcen = $vinsporcen;

        return $this;
    }

    /**
     * Get vinsporcen
     *
     * @return string 
     */
    public function getVinsporcen()
    {
        return $this->vinsporcen;
    }

    /**
     * Set vinsdirecc
     *
     * @param string $vinsdirecc
     * @return Vshinstitu
     */
    public function setVinsdirecc($vinsdirecc)
    {
        $this->vinsdirecc = $vinsdirecc;

        return $this;
    }

    /**
     * Get vinsdirecc
     *
     * @return string 
     */
    public function getVinsdirecc()
    {
        return $this->vinsdirecc;
    }

    /**
     * Set vinsnumruc
     *
     * @param string $vinsnumruc
     * @return Vshinstitu
     */
    public function setVinsnumruc($vinsnumruc)
    {
        $this->vinsnumruc = $vinsnumruc;

        return $this;
    }

    /**
     * Get vinsnumruc
     *
     * @return string 
     */
    public function getVinsnumruc()
    {
        return $this->vinsnumruc;
    }

    /**
     * Set cuCodigo
     *
     * @param integer $cuCodigo
     * @return Vshinstitu
     */
    public function setCuCodigo($cuCodigo)
    {
        $this->cuCodigo = $cuCodigo;

        return $this;
    }

    /**
     * Get cuCodigo
     *
     * @return integer 
     */
    public function getCuCodigo()
    {
        return $this->cuCodigo;
    }

    /**
     * Set actCodigo
     *
     * @param integer $actCodigo
     * @return Vshinstitu
     */
    public function setActCodigo($actCodigo)
    {
        $this->actCodigo = $actCodigo;

        return $this;
    }

    /**
     * Get actCodigo
     *
     * @return integer 
     */
    public function getActCodigo()
    {
        return $this->actCodigo;
    }

    /**
     * Set vinscategoria
     *
     * @param integer $vinscategoria
     * @return Vshinstitu
     */
    public function setVinscategoria($vinscategoria)
    {
        $this->vinscategoria = $vinscategoria;

        return $this;
    }

    /**
     * Get vinscategoria
     *
     * @return integer 
     */
    public function getVinscategoria()
    {
        return $this->vinscategoria;
    }

    /**
     * Set vinstipo
     *
     * @param integer $vinstipo
     * @return Vshinstitu
     */
    public function setVinstipo($vinstipo)
    {
        $this->vinstipo = $vinstipo;

        return $this;
    }

    /**
     * Get vinstipo
     *
     * @return integer 
     */
    public function getVinstipo()
    {
        return $this->vinstipo;
    }

    /**
     * Set vinsestado
     *
     * @param string $vinsestado
     * @return Vshinstitu
     */
    public function setVinsestado($vinsestado)
    {
        $this->vinsestado = $vinsestado;

        return $this;
    }

    /**
     * Get vinsestado
     *
     * @return string 
     */
    public function getVinsestado()
    {
        return $this->vinsestado;
    }

    /**
     * Set vinsinforme
     *
     * @param string $vinsinforme
     * @return Vshinstitu
     */
    public function setVinsinforme($vinsinforme)
    {
        $this->vinsinforme = $vinsinforme;

        return $this;
    }

    /**
     * Get vinsinforme
     *
     * @return string 
     */
    public function getVinsinforme()
    {
        return $this->vinsinforme;
    }

    /**
     * Set vinstipoins
     *
     * @param string $vinstipoins
     * @return Vshinstitu
     */
    public function setVinstipoins($vinstipoins)
    {
        $this->vinstipoins = $vinstipoins;

        return $this;
    }

    /**
     * Get vinstipoins
     *
     * @return string 
     */
    public function getVinstipoins()
    {
        return $this->vinstipoins;
    }
}
