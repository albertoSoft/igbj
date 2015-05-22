<?php

namespace Gastro\SiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeSala
 *
 * @ORM\Table(name="se_sala")
 * @ORM\Entity
 */
class SeSala
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
     * @ORM\Column(name="SA_CODIGO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $saCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="SA_ENUM", type="string", length=15, nullable=true)
     */
    private $saEnum;

    /**
     * @var string
     *
     * @ORM\Column(name="SA_DESCRIPCION", type="text", nullable=true)
     */
    private $saDescripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="VGRUCODIGO", type="integer", nullable=true)
     */
    private $vgrucodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="SA_PISO", type="string", length=2, nullable=true)
     */
    private $saPiso;



    /**
     * Set empCodigo
     *
     * @param integer $empCodigo
     * @return SeSala
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
     * Get saCodigo
     *
     * @return integer 
     */
    public function getSaCodigo()
    {
        return $this->saCodigo;
    }

    /**
     * Set saEnum
     *
     * @param string $saEnum
     * @return SeSala
     */
    public function setSaEnum($saEnum)
    {
        $this->saEnum = $saEnum;

        return $this;
    }

    /**
     * Get saEnum
     *
     * @return string 
     */
    public function getSaEnum()
    {
        return $this->saEnum;
    }

    /**
     * Set saDescripcion
     *
     * @param string $saDescripcion
     * @return SeSala
     */
    public function setSaDescripcion($saDescripcion)
    {
        $this->saDescripcion = $saDescripcion;

        return $this;
    }

    /**
     * Get saDescripcion
     *
     * @return string 
     */
    public function getSaDescripcion()
    {
        return $this->saDescripcion;
    }

    /**
     * Set vgrucodigo
     *
     * @param integer $vgrucodigo
     * @return SeSala
     */
    public function setVgrucodigo($vgrucodigo)
    {
        $this->vgrucodigo = $vgrucodigo;

        return $this;
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
     * Set saPiso
     *
     * @param string $saPiso
     * @return SeSala
     */
    public function setSaPiso($saPiso)
    {
        $this->saPiso = $saPiso;

        return $this;
    }

    /**
     * Get saPiso
     *
     * @return string 
     */
    public function getSaPiso()
    {
        return $this->saPiso;
    }
}
