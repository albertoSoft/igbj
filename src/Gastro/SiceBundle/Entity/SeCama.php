<?php

namespace Gastro\SiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeCama
 *
 * @ORM\Table(name="se_cama")
 * @ORM\Entity
 */
class SeCama
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
     * @ORM\Column(name="CAM_CODIGO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $camCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="CAM_ENUM", type="string", length=15, nullable=true)
     */
    private $camEnum;

    /**
     * @var integer
     *
     * @ORM\Column(name="SA_CODIGO", type="integer", nullable=true)
     */
    private $saCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="CAM_DESCRIPCION", type="string", length=50, nullable=true)
     */
    private $camDescripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="CAM_ESTADO", type="string", length=1, nullable=true)
     */
    private $camEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="CAM_REAL", type="string", length=1, nullable=true)
     */
    private $camReal;

    /**
     * @var integer
     *
     * @ORM\Column(name="cam_cor", type="smallint", nullable=true)
     */
    private $camCor;



    /**
     * Set empCodigo
     *
     * @param integer $empCodigo
     * @return SeCama
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
     * Get camCodigo
     *
     * @return integer 
     */
    public function getCamCodigo()
    {
        return $this->camCodigo;
    }

    /**
     * Set camEnum
     *
     * @param string $camEnum
     * @return SeCama
     */
    public function setCamEnum($camEnum)
    {
        $this->camEnum = $camEnum;

        return $this;
    }

    /**
     * Get camEnum
     *
     * @return string 
     */
    public function getCamEnum()
    {
        return $this->camEnum;
    }

    /**
     * Set saCodigo
     *
     * @param integer $saCodigo
     * @return SeCama
     */
    public function setSaCodigo($saCodigo)
    {
        $this->saCodigo = $saCodigo;

        return $this;
    }

    /**
     * Get saCodigo
     *
     * @return integer 
     */
    public function getSaCodigo()
    {
        return $this->saCodigo;
    }

    /**
     * Set camDescripcion
     *
     * @param string $camDescripcion
     * @return SeCama
     */
    public function setCamDescripcion($camDescripcion)
    {
        $this->camDescripcion = $camDescripcion;

        return $this;
    }

    /**
     * Get camDescripcion
     *
     * @return string 
     */
    public function getCamDescripcion()
    {
        return $this->camDescripcion;
    }

    /**
     * Set camEstado
     *
     * @param string $camEstado
     * @return SeCama
     */
    public function setCamEstado($camEstado)
    {
        $this->camEstado = $camEstado;

        return $this;
    }

    /**
     * Get camEstado
     *
     * @return string 
     */
    public function getCamEstado()
    {
        return $this->camEstado;
    }

    /**
     * Set camReal
     *
     * @param string $camReal
     * @return SeCama
     */
    public function setCamReal($camReal)
    {
        $this->camReal = $camReal;

        return $this;
    }

    /**
     * Get camReal
     *
     * @return string 
     */
    public function getCamReal()
    {
        return $this->camReal;
    }

    /**
     * Set camCor
     *
     * @param integer $camCor
     * @return SeCama
     */
    public function setCamCor($camCor)
    {
        $this->camCor = $camCor;

        return $this;
    }

    /**
     * Get camCor
     *
     * @return integer 
     */
    public function getCamCor()
    {
        return $this->camCor;
    }
}
