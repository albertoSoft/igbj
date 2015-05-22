<?php

namespace Gastro\SiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeCie10
 *
 * @ORM\Table(name="se_cie10")
 * @ORM\Entity
 */
class SeCie10
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CIE_CODIGO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cieCodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="CIE_ALFA", type="string", length=5, nullable=true)
     */
    private $cieAlfa;

    /**
     * @var string
     *
     * @ORM\Column(name="CIE_DESCRIPCION", type="string", length=200, nullable=true)
     */
    private $cieDescripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="CIE_GRUPO", type="integer", nullable=true)
     */
    private $cieGrupo;

    /**
     * @var string
     *
     * @ORM\Column(name="CIE_TIPO", type="string", length=20, nullable=true)
     */
    private $cieTipo;

    /**
     * @var string
     *
     * @ORM\Column(name="cie_otradescripcion", type="text", nullable=true)
     */
    private $cieOtradescripcion;



    /**
     * Get cieCodigo
     *
     * @return integer 
     */
    public function getCieCodigo()
    {
        return $this->cieCodigo;
    }

    /**
     * Set cieAlfa
     *
     * @param string $cieAlfa
     * @return SeCie10
     */
    public function setCieAlfa($cieAlfa)
    {
        $this->cieAlfa = $cieAlfa;

        return $this;
    }

    /**
     * Get cieAlfa
     *
     * @return string 
     */
    public function getCieAlfa()
    {
        return $this->cieAlfa;
    }

    /**
     * Set cieDescripcion
     *
     * @param string $cieDescripcion
     * @return SeCie10
     */
    public function setCieDescripcion($cieDescripcion)
    {
        $this->cieDescripcion = $cieDescripcion;

        return $this;
    }

    /**
     * Get cieDescripcion
     *
     * @return string 
     */
    public function getCieDescripcion()
    {
        return $this->cieDescripcion;
    }

    /**
     * Set cieGrupo
     *
     * @param integer $cieGrupo
     * @return SeCie10
     */
    public function setCieGrupo($cieGrupo)
    {
        $this->cieGrupo = $cieGrupo;

        return $this;
    }

    /**
     * Get cieGrupo
     *
     * @return integer 
     */
    public function getCieGrupo()
    {
        return $this->cieGrupo;
    }

    /**
     * Set cieTipo
     *
     * @param string $cieTipo
     * @return SeCie10
     */
    public function setCieTipo($cieTipo)
    {
        $this->cieTipo = $cieTipo;

        return $this;
    }

    /**
     * Get cieTipo
     *
     * @return string 
     */
    public function getCieTipo()
    {
        return $this->cieTipo;
    }

    /**
     * Set cieOtradescripcion
     *
     * @param string $cieOtradescripcion
     * @return SeCie10
     */
    public function setCieOtradescripcion($cieOtradescripcion)
    {
        $this->cieOtradescripcion = $cieOtradescripcion;

        return $this;
    }

    /**
     * Get cieOtradescripcion
     *
     * @return string 
     */
    public function getCieOtradescripcion()
    {
        return $this->cieOtradescripcion;
    }
}
