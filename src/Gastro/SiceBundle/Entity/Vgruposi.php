<?php

namespace Gastro\SiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vgruposi
 *
 * @ORM\Table(name="vgruposi")
 * @ORM\Entity
 */
class Vgruposi
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
     * @ORM\Column(name="VGRUCODIGO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $vgrucodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="VGRUDESCRI", type="text", nullable=true)
     */
    private $vgrudescri;

    /**
     * @var string
     *
     * @ORM\Column(name="VGRUVENSRV", type="string", length=1, nullable=true)
     */
    private $vgruvensrv;

    /**
     * @var integer
     *
     * @ORM\Column(name="ccctCodigo", type="integer", nullable=true)
     */
    private $ccctcodigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="com_anio", type="smallint", nullable=true)
     */
    private $comAnio;

    /**
     * @var integer
     *
     * @ORM\Column(name="CUA_CODIGO", type="integer", nullable=true)
     */
    private $cuaCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="VGRUSIGLA", type="string", length=10, nullable=true)
     */
    private $vgrusigla;

    /**
     * @var integer
     *
     * @ORM\Column(name="vgrucamas", type="integer", nullable=true)
     */
    private $vgrucamas;

    /**
     * @var integer
     *
     * @ORM\Column(name="es_codigo", type="integer", nullable=true)
     */
    private $esCodigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="es_maternidad", type="integer", nullable=true)
     */
    private $esMaternidad;

    /**
     * @var integer
     *
     * @ORM\Column(name="codestabl", type="integer", nullable=true)
     */
    private $codestabl;



    /**
     * Set empCodigo
     *
     * @param integer $empCodigo
     * @return Vgruposi
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
     * Get vgrucodigo
     *
     * @return integer 
     */
    public function getVgrucodigo()
    {
        return $this->vgrucodigo;
    }

    /**
     * Set vgrudescri
     *
     * @param string $vgrudescri
     * @return Vgruposi
     */
    public function setVgrudescri($vgrudescri)
    {
        $this->vgrudescri = $vgrudescri;

        return $this;
    }

    /**
     * Get vgrudescri
     *
     * @return string 
     */
    public function getVgrudescri()
    {
        return $this->vgrudescri;
    }

    /**
     * Set vgruvensrv
     *
     * @param string $vgruvensrv
     * @return Vgruposi
     */
    public function setVgruvensrv($vgruvensrv)
    {
        $this->vgruvensrv = $vgruvensrv;

        return $this;
    }

    /**
     * Get vgruvensrv
     *
     * @return string 
     */
    public function getVgruvensrv()
    {
        return $this->vgruvensrv;
    }

    /**
     * Set ccctcodigo
     *
     * @param integer $ccctcodigo
     * @return Vgruposi
     */
    public function setCcctcodigo($ccctcodigo)
    {
        $this->ccctcodigo = $ccctcodigo;

        return $this;
    }

    /**
     * Get ccctcodigo
     *
     * @return integer 
     */
    public function getCcctcodigo()
    {
        return $this->ccctcodigo;
    }

    /**
     * Set comAnio
     *
     * @param integer $comAnio
     * @return Vgruposi
     */
    public function setComAnio($comAnio)
    {
        $this->comAnio = $comAnio;

        return $this;
    }

    /**
     * Get comAnio
     *
     * @return integer 
     */
    public function getComAnio()
    {
        return $this->comAnio;
    }

    /**
     * Set cuaCodigo
     *
     * @param integer $cuaCodigo
     * @return Vgruposi
     */
    public function setCuaCodigo($cuaCodigo)
    {
        $this->cuaCodigo = $cuaCodigo;

        return $this;
    }

    /**
     * Get cuaCodigo
     *
     * @return integer 
     */
    public function getCuaCodigo()
    {
        return $this->cuaCodigo;
    }

    /**
     * Set vgrusigla
     *
     * @param string $vgrusigla
     * @return Vgruposi
     */
    public function setVgrusigla($vgrusigla)
    {
        $this->vgrusigla = $vgrusigla;

        return $this;
    }

    /**
     * Get vgrusigla
     *
     * @return string 
     */
    public function getVgrusigla()
    {
        return $this->vgrusigla;
    }

    /**
     * Set vgrucamas
     *
     * @param integer $vgrucamas
     * @return Vgruposi
     */
    public function setVgrucamas($vgrucamas)
    {
        $this->vgrucamas = $vgrucamas;

        return $this;
    }

    /**
     * Get vgrucamas
     *
     * @return integer 
     */
    public function getVgrucamas()
    {
        return $this->vgrucamas;
    }

    /**
     * Set esCodigo
     *
     * @param integer $esCodigo
     * @return Vgruposi
     */
    public function setEsCodigo($esCodigo)
    {
        $this->esCodigo = $esCodigo;

        return $this;
    }

    /**
     * Get esCodigo
     *
     * @return integer 
     */
    public function getEsCodigo()
    {
        return $this->esCodigo;
    }

    /**
     * Set esMaternidad
     *
     * @param integer $esMaternidad
     * @return Vgruposi
     */
    public function setEsMaternidad($esMaternidad)
    {
        $this->esMaternidad = $esMaternidad;

        return $this;
    }

    /**
     * Get esMaternidad
     *
     * @return integer 
     */
    public function getEsMaternidad()
    {
        return $this->esMaternidad;
    }

    /**
     * Set codestabl
     *
     * @param integer $codestabl
     * @return Vgruposi
     */
    public function setCodestabl($codestabl)
    {
        $this->codestabl = $codestabl;

        return $this;
    }

    /**
     * Get codestabl
     *
     * @return integer 
     */
    public function getCodestabl()
    {
        return $this->codestabl;
    }
}
