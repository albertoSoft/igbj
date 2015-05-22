<?php

namespace Gastro\SiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeOratencab
 *
 * @ORM\Table(name="se_oratencab")
 * @ORM\Entity
 */
class SeOratencab
{
    /**
     * @var integer
     *
     * @ORM\Column(name="EMP_CODIGO", type="integer", nullable=true)
     */
    private $empCodigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="ORAT_CODIGO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $oratCodigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="VTPACODIGO", type="integer", nullable=true)
     */
    private $vtpacodigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="VRECCODCLI", type="integer", nullable=true)
     */
    private $vreccodcli;

    /**
     * @var integer
     *
     * @ORM\Column(name="ORAT_PROV", type="integer", nullable=true)
     */
    private $oratProv;

    /**
     * @var integer
     *
     * @ORM\Column(name="REFD_CODIGO", type="integer", nullable=true)
     */
    private $refdCodigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="REFA_CODIGO", type="integer", nullable=true)
     */
    private $refaCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="ORAT_OBSI", type="text", nullable=true)
     */
    private $oratObsi;

    /**
     * @var string
     *
     * @ORM\Column(name="ORAT_OBSS", type="text", nullable=true)
     */
    private $oratObss;

    /**
     * @var integer
     *
     * @ORM\Column(name="HCL_CODIGO", type="integer", nullable=true)
     */
    private $hclCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="ORAT_CONDI", type="string", length=1, nullable=true)
     */
    private $oratCondi;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ORAT_FECHAOI", type="datetime", nullable=true)
     */
    private $oratFechaoi;

    /**
     * @var string
     *
     * @ORM\Column(name="ORAT_TIPO", type="string", length=1, nullable=true)
     */
    private $oratTipo;

    /**
     * @var string
     *
     * @ORM\Column(name="cod_estbl", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $codEstbl;



    /**
     * Set empCodigo
     *
     * @param integer $empCodigo
     * @return SeOratencab
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
     * Get oratCodigo
     *
     * @return integer 
     */
    public function getOratCodigo()
    {
        return $this->oratCodigo;
    }

    /**
     * Set vtpacodigo
     *
     * @param integer $vtpacodigo
     * @return SeOratencab
     */
    public function setVtpacodigo($vtpacodigo)
    {
        $this->vtpacodigo = $vtpacodigo;

        return $this;
    }

    /**
     * Get vtpacodigo
     *
     * @return integer 
     */
    public function getVtpacodigo()
    {
        return $this->vtpacodigo;
    }

    /**
     * Set vreccodcli
     *
     * @param integer $vreccodcli
     * @return SeOratencab
     */
    public function setVreccodcli($vreccodcli)
    {
        $this->vreccodcli = $vreccodcli;

        return $this;
    }

    /**
     * Get vreccodcli
     *
     * @return integer 
     */
    public function getVreccodcli()
    {
        return $this->vreccodcli;
    }

    /**
     * Set oratProv
     *
     * @param integer $oratProv
     * @return SeOratencab
     */
    public function setOratProv($oratProv)
    {
        $this->oratProv = $oratProv;

        return $this;
    }

    /**
     * Get oratProv
     *
     * @return integer 
     */
    public function getOratProv()
    {
        return $this->oratProv;
    }

    /**
     * Set refdCodigo
     *
     * @param integer $refdCodigo
     * @return SeOratencab
     */
    public function setRefdCodigo($refdCodigo)
    {
        $this->refdCodigo = $refdCodigo;

        return $this;
    }

    /**
     * Get refdCodigo
     *
     * @return integer 
     */
    public function getRefdCodigo()
    {
        return $this->refdCodigo;
    }

    /**
     * Set refaCodigo
     *
     * @param integer $refaCodigo
     * @return SeOratencab
     */
    public function setRefaCodigo($refaCodigo)
    {
        $this->refaCodigo = $refaCodigo;

        return $this;
    }

    /**
     * Get refaCodigo
     *
     * @return integer 
     */
    public function getRefaCodigo()
    {
        return $this->refaCodigo;
    }

    /**
     * Set oratObsi
     *
     * @param string $oratObsi
     * @return SeOratencab
     */
    public function setOratObsi($oratObsi)
    {
        $this->oratObsi = $oratObsi;

        return $this;
    }

    /**
     * Get oratObsi
     *
     * @return string 
     */
    public function getOratObsi()
    {
        return $this->oratObsi;
    }

    /**
     * Set oratObss
     *
     * @param string $oratObss
     * @return SeOratencab
     */
    public function setOratObss($oratObss)
    {
        $this->oratObss = $oratObss;

        return $this;
    }

    /**
     * Get oratObss
     *
     * @return string 
     */
    public function getOratObss()
    {
        return $this->oratObss;
    }

    /**
     * Set hclCodigo
     *
     * @param integer $hclCodigo
     * @return SeOratencab
     */
    public function setHclCodigo($hclCodigo)
    {
        $this->hclCodigo = $hclCodigo;

        return $this;
    }

    /**
     * Get hclCodigo
     *
     * @return integer 
     */
    public function getHclCodigo()
    {
        return $this->hclCodigo;
    }

    /**
     * Set oratCondi
     *
     * @param string $oratCondi
     * @return SeOratencab
     */
    public function setOratCondi($oratCondi)
    {
        $this->oratCondi = $oratCondi;

        return $this;
    }

    /**
     * Get oratCondi
     *
     * @return string 
     */
    public function getOratCondi()
    {
        return $this->oratCondi;
    }

    /**
     * Set oratFechaoi
     *
     * @param \DateTime $oratFechaoi
     * @return SeOratencab
     */
    public function setOratFechaoi($oratFechaoi)
    {
        $this->oratFechaoi = $oratFechaoi;

        return $this;
    }

    /**
     * Get oratFechaoi
     *
     * @return \DateTime 
     */
    public function getOratFechaoi()
    {
        return $this->oratFechaoi;
    }

    /**
     * Set oratTipo
     *
     * @param string $oratTipo
     * @return SeOratencab
     */
    public function setOratTipo($oratTipo)
    {
        $this->oratTipo = $oratTipo;

        return $this;
    }

    /**
     * Get oratTipo
     *
     * @return string 
     */
    public function getOratTipo()
    {
        return $this->oratTipo;
    }

    /**
     * Set codEstbl
     *
     * @param string $codEstbl
     * @return SeOratencab
     */
    public function setCodEstbl($codEstbl)
    {
        $this->codEstbl = $codEstbl;

        return $this;
    }

    /**
     * Get codEstbl
     *
     * @return string 
     */
    public function getCodEstbl()
    {
        return $this->codEstbl;
    }
}
