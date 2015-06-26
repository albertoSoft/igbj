<?php

namespace Gastro\SiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeHc
 *
 * @ORM\Table(name="se_hc")
 * @ORM\Entity(repositoryClass="Gastro\SiceBundle\Entity\SeHcRepository")
 */
class SeHc
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
     * @ORM\Column(name="HCL_CODIGO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $hclCodigo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HCL_FECHA", type="datetime", nullable=true)
     */
    private $hclFecha;

    /**
     * @var string
     *
     * @ORM\Column(name="HCL_APPAT", type="text", nullable=true)
     */
    private $hclAppat;

    /**
     * @var string
     *
     * @ORM\Column(name="HCL_APMAT", type="text", nullable=true)
     */
    private $hclApmat;

    /**
     * @var string
     *
     * @ORM\Column(name="HCL_NOMBRE", type="text", nullable=true)
     */
    private $hclNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="HCL_NUMCI", type="text", nullable=true)
     */
    private $hclNumci;

    /**
     * @var string
     *
     * @ORM\Column(name="HCL_SEXO", type="text", nullable=true)
     */
    private $hclSexo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HCL_FECNAC", type="datetime", nullable=true)
     */
    private $hclFecnac;

    /**
     * @var integer
     *
     * @ORM\Column(name="DEP_CODIGO_RES", type="integer", nullable=true)
     */
    private $depCodigoRes;

    /**
     * @var integer
     *
     * @ORM\Column(name="PRO_CODIGO_RES", type="integer", nullable=true)
     */
    private $proCodigoRes;

    /**
     * @var integer
     *
     * @ORM\Column(name="MUN_CODIGO_RES", type="integer", nullable=true)
     */
    private $munCodigoRes;

    /**
     * @var string
     *
     * @ORM\Column(name="HCL_ESTCIV", type="string", length=1, nullable=true)
     */
    private $hclEstciv;

    /**
     * @var string
     *
     * @ORM\Column(name="HCL_DIRECC", type="text", nullable=true)
     */
    private $hclDirecc;

    /**
     * @var string
     *
     * @ORM\Column(name="HCL_TELDOM", type="text", nullable=true)
     */
    private $hclTeldom;

    /**
     * @var integer
     *
     * @ORM\Column(name="PProCodPro", type="integer", nullable=true)
     */
    private $pprocodpro;

    /**
     * @var string
     *
     * @ORM\Column(name="HCL_LUGTRA", type="text", nullable=true)
     */
    private $hclLugtra;

    /**
     * @var string
     *
     * @ORM\Column(name="HCL_DIRTRA", type="text", nullable=true)
     */
    private $hclDirtra;

    /**
     * @var string
     *
     * @ORM\Column(name="HCL_TELTRA", type="text", nullable=true)
     */
    private $hclTeltra;

    /**
     * @var string
     *
     * @ORM\Column(name="HCL_NOMFAM", type="text", nullable=true)
     */
    private $hclNomfam;

    /**
     * @var string
     *
     * @ORM\Column(name="HCL_TELFAM", type="text", nullable=true)
     */
    private $hclTelfam;

    /**
     * @var string
     *
     * @ORM\Column(name="HCL_NOMPAD", type="text", nullable=true)
     */
    private $hclNompad;

    /**
     * @var string
     *
     * @ORM\Column(name="HCL_NOMMAD", type="text", nullable=true)
     */
    private $hclNommad;

    /**
     * @var string
     *
     * @ORM\Column(name="HCL_CodCSB", type="text", nullable=true)
     */
    private $hclCodcsb;

    /**
     * @var string
     *
     * @ORM\Column(name="HCL_CodSegSoc", type="text", nullable=true)
     */
    private $hclCodsegsoc;

    /**
     * @var integer
     *
     * @ORM\Column(name="HCL_CODFAM", type="integer", nullable=true)
     */
    private $hclCodfam;

    /**
     * @var integer
     *
     * @ORM\Column(name="DEP_CODIGO_LN", type="integer", nullable=true)
     */
    private $depCodigoLn;

    /**
     * @var integer
     *
     * @ORM\Column(name="HCL_CODMEDICO", type="integer", nullable=true)
     */
    private $hclCodmedico;

    /**
     * @var integer
     *
     * @ORM\Column(name="zon_codigo", type="integer", nullable=true)
     */
    private $zonCodigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="HCL_USUMOD", type="integer", nullable=true)
     */
    private $hclUsumod;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HCL_FECMOD", type="datetime", nullable=true)
     */
    private $hclFecmod;

    /**
     * @var integer
     *
     * @ORM\Column(name="DEP_CODIGO_NAC", type="integer", nullable=true)
     */
    private $depCodigoNac;

    /**
     * @var integer
     *
     * @ORM\Column(name="PRO_CODIGO_NAC", type="integer", nullable=true)
     */
    private $proCodigoNac;

    /**
     * @var integer
     *
     * @ORM\Column(name="MUN_CODIGO_NAC", type="integer", nullable=true)
     */
    private $munCodigoNac;

    /**
     * @var string
     *
     * @ORM\Column(name="hc_alfa", type="string", length=1, nullable=true)
     */
    private $hcAlfa;

    /**
     * @var integer
     *
     * @ORM\Column(name="hc_NivelEstudio", type="integer", nullable=true)
     */
    private $hcNivelestudio;

    /**
     * @var string
     *
     * @ORM\Column(name="HCL_SUMI", type="string", length=1, nullable=true)
     */
    private $hclSumi;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="HCL_SUMI_FECHA", type="datetime", nullable=true)
     */
    private $hclSumiFecha;

    /**
     * @var string
     *
     * @ORM\Column(name="HCL_ESTADO", type="string", length=1, nullable=true)
     */
    private $hclEstado;

    /**
     * @var integer
     *
     * @ORM\Column(name="HCL_TIPODOC", type="integer", nullable=true)
     */
    private $hclTipodoc;

    /**
     * @var string
     *
     * @ORM\Column(name="hcl_migrado", type="string", length=1, nullable=true)
     */
    private $hclMigrado;

    /**
     * @var integer
     *
     * @ORM\Column(name="af_codigo", type="integer", nullable=true)
     */
    private $afCodigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="af_mun_cod", type="integer", nullable=true)
     */
    private $afMunCod;

    /**
     * @var string
     *
     * @ORM\Column(name="fa_codificacion", type="text", nullable=true)
     */
    private $faCodificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hcl_Fum", type="datetime", nullable=true)
     */
    private $hclFum;

    /**
     * @var integer
     *
     * @ORM\Column(name="hcl_NroEmbarazo", type="integer", nullable=true)
     */
    private $hclNroembarazo;

    /**
     * @var integer
     *
     * @ORM\Column(name="idioma", type="integer", nullable=true)
     */
    private $idioma;

    /**
     * @var integer
     *
     * @ORM\Column(name="idiomamaterno", type="integer", nullable=true)
     */
    private $idiomamaterno;

    /**
     * @var integer
     *
     * @ORM\Column(name="autopertenencia", type="integer", nullable=true)
     */
    private $autopertenencia;

    /**
     * @var integer
     *
     * @ORM\Column(name="lugarexpedicion", type="integer", nullable=true)
     */
    private $lugarexpedicion;



    /**
     * Set empCodigo
     *
     * @param integer $empCodigo
     * @return SeHc
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
     * Get hclCodigo
     *
     * @return integer 
     */
    public function getHclCodigo()
    {
        return $this->hclCodigo;
    }

    /**
     * Set hclFecha
     *
     * @param \DateTime $hclFecha
     * @return SeHc
     */
    public function setHclFecha($hclFecha)
    {
        $this->hclFecha = $hclFecha;

        return $this;
    }

    /**
     * Get hclFecha
     *
     * @return \DateTime 
     */
    public function getHclFecha()
    {
        return $this->hclFecha;
    }

    /**
     * Set hclAppat
     *
     * @param string $hclAppat
     * @return SeHc
     */
    public function setHclAppat($hclAppat)
    {
        $this->hclAppat = $hclAppat;

        return $this;
    }

    /**
     * Get hclAppat
     *
     * @return string 
     */
    public function getHclAppat()
    {
        return $this->hclAppat;
    }

    /**
     * Set hclApmat
     *
     * @param string $hclApmat
     * @return SeHc
     */
    public function setHclApmat($hclApmat)
    {
        $this->hclApmat = $hclApmat;

        return $this;
    }

    /**
     * Get hclApmat
     *
     * @return string 
     */
    public function getHclApmat()
    {
        return $this->hclApmat;
    }

    /**
     * Set hclNombre
     *
     * @param string $hclNombre
     * @return SeHc
     */
    public function setHclNombre($hclNombre)
    {
        $this->hclNombre = $hclNombre;

        return $this;
    }

    /**
     * Get hclNombre
     *
     * @return string 
     */
    public function getHclNombre()
    {
        return $this->hclNombre;
    }

    /**
     * Set hclNumci
     *
     * @param string $hclNumci
     * @return SeHc
     */
    public function setHclNumci($hclNumci)
    {
        $this->hclNumci = $hclNumci;

        return $this;
    }

    /**
     * Get hclNumci
     *
     * @return string 
     */
    public function getHclNumci()
    {
        return $this->hclNumci;
    }

    /**
     * Set hclSexo
     *
     * @param string $hclSexo
     * @return SeHc
     */
    public function setHclSexo($hclSexo)
    {
        $this->hclSexo = $hclSexo;

        return $this;
    }

    /**
     * Get hclSexo
     *
     * @return string 
     */
    public function getHclSexo()
    {
        return $this->hclSexo;
    }

    /**
     * Set hclFecnac
     *
     * @param \DateTime $hclFecnac
     * @return SeHc
     */
    public function setHclFecnac($hclFecnac)
    {
        $this->hclFecnac = $hclFecnac;

        return $this;
    }

    /**
     * Get hclFecnac
     *
     * @return \DateTime 
     */
    public function getHclFecnac()
    {
        return $this->hclFecnac;
    }

    /**
     * Set depCodigoRes
     *
     * @param integer $depCodigoRes
     * @return SeHc
     */
    public function setDepCodigoRes($depCodigoRes)
    {
        $this->depCodigoRes = $depCodigoRes;

        return $this;
    }

    /**
     * Get depCodigoRes
     *
     * @return integer 
     */
    public function getDepCodigoRes()
    {
        return $this->depCodigoRes;
    }

    /**
     * Set proCodigoRes
     *
     * @param integer $proCodigoRes
     * @return SeHc
     */
    public function setProCodigoRes($proCodigoRes)
    {
        $this->proCodigoRes = $proCodigoRes;

        return $this;
    }

    /**
     * Get proCodigoRes
     *
     * @return integer 
     */
    public function getProCodigoRes()
    {
        return $this->proCodigoRes;
    }

    /**
     * Set munCodigoRes
     *
     * @param integer $munCodigoRes
     * @return SeHc
     */
    public function setMunCodigoRes($munCodigoRes)
    {
        $this->munCodigoRes = $munCodigoRes;

        return $this;
    }

    /**
     * Get munCodigoRes
     *
     * @return integer 
     */
    public function getMunCodigoRes()
    {
        return $this->munCodigoRes;
    }

    /**
     * Set hclEstciv
     *
     * @param string $hclEstciv
     * @return SeHc
     */
    public function setHclEstciv($hclEstciv)
    {
        $this->hclEstciv = $hclEstciv;

        return $this;
    }

    /**
     * Get hclEstciv
     *
     * @return string 
     */
    public function getHclEstciv()
    {
        return $this->hclEstciv;
    }

    /**
     * Set hclDirecc
     *
     * @param string $hclDirecc
     * @return SeHc
     */
    public function setHclDirecc($hclDirecc)
    {
        $this->hclDirecc = $hclDirecc;

        return $this;
    }

    /**
     * Get hclDirecc
     *
     * @return string 
     */
    public function getHclDirecc()
    {
        return $this->hclDirecc;
    }

    /**
     * Set hclTeldom
     *
     * @param string $hclTeldom
     * @return SeHc
     */
    public function setHclTeldom($hclTeldom)
    {
        $this->hclTeldom = $hclTeldom;

        return $this;
    }

    /**
     * Get hclTeldom
     *
     * @return string 
     */
    public function getHclTeldom()
    {
        return $this->hclTeldom;
    }

    /**
     * Set pprocodpro
     *
     * @param integer $pprocodpro
     * @return SeHc
     */
    public function setPprocodpro($pprocodpro)
    {
        $this->pprocodpro = $pprocodpro;

        return $this;
    }

    /**
     * Get pprocodpro
     *
     * @return integer 
     */
    public function getPprocodpro()
    {
        return $this->pprocodpro;
    }

    /**
     * Set hclLugtra
     *
     * @param string $hclLugtra
     * @return SeHc
     */
    public function setHclLugtra($hclLugtra)
    {
        $this->hclLugtra = $hclLugtra;

        return $this;
    }

    /**
     * Get hclLugtra
     *
     * @return string 
     */
    public function getHclLugtra()
    {
        return $this->hclLugtra;
    }

    /**
     * Set hclDirtra
     *
     * @param string $hclDirtra
     * @return SeHc
     */
    public function setHclDirtra($hclDirtra)
    {
        $this->hclDirtra = $hclDirtra;

        return $this;
    }

    /**
     * Get hclDirtra
     *
     * @return string 
     */
    public function getHclDirtra()
    {
        return $this->hclDirtra;
    }

    /**
     * Set hclTeltra
     *
     * @param string $hclTeltra
     * @return SeHc
     */
    public function setHclTeltra($hclTeltra)
    {
        $this->hclTeltra = $hclTeltra;

        return $this;
    }

    /**
     * Get hclTeltra
     *
     * @return string 
     */
    public function getHclTeltra()
    {
        return $this->hclTeltra;
    }

    /**
     * Set hclNomfam
     *
     * @param string $hclNomfam
     * @return SeHc
     */
    public function setHclNomfam($hclNomfam)
    {
        $this->hclNomfam = $hclNomfam;

        return $this;
    }

    /**
     * Get hclNomfam
     *
     * @return string 
     */
    public function getHclNomfam()
    {
        return $this->hclNomfam;
    }

    /**
     * Set hclTelfam
     *
     * @param string $hclTelfam
     * @return SeHc
     */
    public function setHclTelfam($hclTelfam)
    {
        $this->hclTelfam = $hclTelfam;

        return $this;
    }

    /**
     * Get hclTelfam
     *
     * @return string 
     */
    public function getHclTelfam()
    {
        return $this->hclTelfam;
    }

    /**
     * Set hclNompad
     *
     * @param string $hclNompad
     * @return SeHc
     */
    public function setHclNompad($hclNompad)
    {
        $this->hclNompad = $hclNompad;

        return $this;
    }

    /**
     * Get hclNompad
     *
     * @return string 
     */
    public function getHclNompad()
    {
        return $this->hclNompad;
    }

    /**
     * Set hclNommad
     *
     * @param string $hclNommad
     * @return SeHc
     */
    public function setHclNommad($hclNommad)
    {
        $this->hclNommad = $hclNommad;

        return $this;
    }

    /**
     * Get hclNommad
     *
     * @return string 
     */
    public function getHclNommad()
    {
        return $this->hclNommad;
    }

    /**
     * Set hclCodcsb
     *
     * @param string $hclCodcsb
     * @return SeHc
     */
    public function setHclCodcsb($hclCodcsb)
    {
        $this->hclCodcsb = $hclCodcsb;

        return $this;
    }

    /**
     * Get hclCodcsb
     *
     * @return string 
     */
    public function getHclCodcsb()
    {
        return $this->hclCodcsb;
    }

    /**
     * Set hclCodsegsoc
     *
     * @param string $hclCodsegsoc
     * @return SeHc
     */
    public function setHclCodsegsoc($hclCodsegsoc)
    {
        $this->hclCodsegsoc = $hclCodsegsoc;

        return $this;
    }

    /**
     * Get hclCodsegsoc
     *
     * @return string 
     */
    public function getHclCodsegsoc()
    {
        return $this->hclCodsegsoc;
    }

    /**
     * Set hclCodfam
     *
     * @param integer $hclCodfam
     * @return SeHc
     */
    public function setHclCodfam($hclCodfam)
    {
        $this->hclCodfam = $hclCodfam;

        return $this;
    }

    /**
     * Get hclCodfam
     *
     * @return integer 
     */
    public function getHclCodfam()
    {
        return $this->hclCodfam;
    }

    /**
     * Set depCodigoLn
     *
     * @param integer $depCodigoLn
     * @return SeHc
     */
    public function setDepCodigoLn($depCodigoLn)
    {
        $this->depCodigoLn = $depCodigoLn;

        return $this;
    }

    /**
     * Get depCodigoLn
     *
     * @return integer 
     */
    public function getDepCodigoLn()
    {
        return $this->depCodigoLn;
    }

    /**
     * Set hclCodmedico
     *
     * @param integer $hclCodmedico
     * @return SeHc
     */
    public function setHclCodmedico($hclCodmedico)
    {
        $this->hclCodmedico = $hclCodmedico;

        return $this;
    }

    /**
     * Get hclCodmedico
     *
     * @return integer 
     */
    public function getHclCodmedico()
    {
        return $this->hclCodmedico;
    }

    /**
     * Set zonCodigo
     *
     * @param integer $zonCodigo
     * @return SeHc
     */
    public function setZonCodigo($zonCodigo)
    {
        $this->zonCodigo = $zonCodigo;

        return $this;
    }

    /**
     * Get zonCodigo
     *
     * @return integer 
     */
    public function getZonCodigo()
    {
        return $this->zonCodigo;
    }

    /**
     * Set hclUsumod
     *
     * @param integer $hclUsumod
     * @return SeHc
     */
    public function setHclUsumod($hclUsumod)
    {
        $this->hclUsumod = $hclUsumod;

        return $this;
    }

    /**
     * Get hclUsumod
     *
     * @return integer 
     */
    public function getHclUsumod()
    {
        return $this->hclUsumod;
    }

    /**
     * Set hclFecmod
     *
     * @param \DateTime $hclFecmod
     * @return SeHc
     */
    public function setHclFecmod($hclFecmod)
    {
        $this->hclFecmod = $hclFecmod;

        return $this;
    }

    /**
     * Get hclFecmod
     *
     * @return \DateTime 
     */
    public function getHclFecmod()
    {
        return $this->hclFecmod;
    }

    /**
     * Set depCodigoNac
     *
     * @param integer $depCodigoNac
     * @return SeHc
     */
    public function setDepCodigoNac($depCodigoNac)
    {
        $this->depCodigoNac = $depCodigoNac;

        return $this;
    }

    /**
     * Get depCodigoNac
     *
     * @return integer 
     */
    public function getDepCodigoNac()
    {
        return $this->depCodigoNac;
    }

    /**
     * Set proCodigoNac
     *
     * @param integer $proCodigoNac
     * @return SeHc
     */
    public function setProCodigoNac($proCodigoNac)
    {
        $this->proCodigoNac = $proCodigoNac;

        return $this;
    }

    /**
     * Get proCodigoNac
     *
     * @return integer 
     */
    public function getProCodigoNac()
    {
        return $this->proCodigoNac;
    }

    /**
     * Set munCodigoNac
     *
     * @param integer $munCodigoNac
     * @return SeHc
     */
    public function setMunCodigoNac($munCodigoNac)
    {
        $this->munCodigoNac = $munCodigoNac;

        return $this;
    }

    /**
     * Get munCodigoNac
     *
     * @return integer 
     */
    public function getMunCodigoNac()
    {
        return $this->munCodigoNac;
    }

    /**
     * Set hcAlfa
     *
     * @param string $hcAlfa
     * @return SeHc
     */
    public function setHcAlfa($hcAlfa)
    {
        $this->hcAlfa = $hcAlfa;

        return $this;
    }

    /**
     * Get hcAlfa
     *
     * @return string 
     */
    public function getHcAlfa()
    {
        return $this->hcAlfa;
    }

    /**
     * Set hcNivelestudio
     *
     * @param integer $hcNivelestudio
     * @return SeHc
     */
    public function setHcNivelestudio($hcNivelestudio)
    {
        $this->hcNivelestudio = $hcNivelestudio;

        return $this;
    }

    /**
     * Get hcNivelestudio
     *
     * @return integer 
     */
    public function getHcNivelestudio()
    {
        return $this->hcNivelestudio;
    }

    /**
     * Set hclSumi
     *
     * @param string $hclSumi
     * @return SeHc
     */
    public function setHclSumi($hclSumi)
    {
        $this->hclSumi = $hclSumi;

        return $this;
    }

    /**
     * Get hclSumi
     *
     * @return string 
     */
    public function getHclSumi()
    {
        return $this->hclSumi;
    }

    /**
     * Set hclSumiFecha
     *
     * @param \DateTime $hclSumiFecha
     * @return SeHc
     */
    public function setHclSumiFecha($hclSumiFecha)
    {
        $this->hclSumiFecha = $hclSumiFecha;

        return $this;
    }

    /**
     * Get hclSumiFecha
     *
     * @return \DateTime 
     */
    public function getHclSumiFecha()
    {
        return $this->hclSumiFecha;
    }

    /**
     * Set hclEstado
     *
     * @param string $hclEstado
     * @return SeHc
     */
    public function setHclEstado($hclEstado)
    {
        $this->hclEstado = $hclEstado;

        return $this;
    }

    /**
     * Get hclEstado
     *
     * @return string 
     */
    public function getHclEstado()
    {
        return $this->hclEstado;
    }

    /**
     * Set hclTipodoc
     *
     * @param integer $hclTipodoc
     * @return SeHc
     */
    public function setHclTipodoc($hclTipodoc)
    {
        $this->hclTipodoc = $hclTipodoc;

        return $this;
    }

    /**
     * Get hclTipodoc
     *
     * @return integer 
     */
    public function getHclTipodoc()
    {
        return $this->hclTipodoc;
    }

    /**
     * Set hclMigrado
     *
     * @param string $hclMigrado
     * @return SeHc
     */
    public function setHclMigrado($hclMigrado)
    {
        $this->hclMigrado = $hclMigrado;

        return $this;
    }

    /**
     * Get hclMigrado
     *
     * @return string 
     */
    public function getHclMigrado()
    {
        return $this->hclMigrado;
    }

    /**
     * Set afCodigo
     *
     * @param integer $afCodigo
     * @return SeHc
     */
    public function setAfCodigo($afCodigo)
    {
        $this->afCodigo = $afCodigo;

        return $this;
    }

    /**
     * Get afCodigo
     *
     * @return integer 
     */
    public function getAfCodigo()
    {
        return $this->afCodigo;
    }

    /**
     * Set afMunCod
     *
     * @param integer $afMunCod
     * @return SeHc
     */
    public function setAfMunCod($afMunCod)
    {
        $this->afMunCod = $afMunCod;

        return $this;
    }

    /**
     * Get afMunCod
     *
     * @return integer 
     */
    public function getAfMunCod()
    {
        return $this->afMunCod;
    }

    /**
     * Set faCodificacion
     *
     * @param string $faCodificacion
     * @return SeHc
     */
    public function setFaCodificacion($faCodificacion)
    {
        $this->faCodificacion = $faCodificacion;

        return $this;
    }

    /**
     * Get faCodificacion
     *
     * @return string 
     */
    public function getFaCodificacion()
    {
        return $this->faCodificacion;
    }

    /**
     * Set hclFum
     *
     * @param \DateTime $hclFum
     * @return SeHc
     */
    public function setHclFum($hclFum)
    {
        $this->hclFum = $hclFum;

        return $this;
    }

    /**
     * Get hclFum
     *
     * @return \DateTime 
     */
    public function getHclFum()
    {
        return $this->hclFum;
    }

    /**
     * Set hclNroembarazo
     *
     * @param integer $hclNroembarazo
     * @return SeHc
     */
    public function setHclNroembarazo($hclNroembarazo)
    {
        $this->hclNroembarazo = $hclNroembarazo;

        return $this;
    }

    /**
     * Get hclNroembarazo
     *
     * @return integer 
     */
    public function getHclNroembarazo()
    {
        return $this->hclNroembarazo;
    }

    /**
     * Set idioma
     *
     * @param integer $idioma
     * @return SeHc
     */
    public function setIdioma($idioma)
    {
        $this->idioma = $idioma;

        return $this;
    }

    /**
     * Get idioma
     *
     * @return integer 
     */
    public function getIdioma()
    {
        return $this->idioma;
    }

    /**
     * Set idiomamaterno
     *
     * @param integer $idiomamaterno
     * @return SeHc
     */
    public function setIdiomamaterno($idiomamaterno)
    {
        $this->idiomamaterno = $idiomamaterno;

        return $this;
    }

    /**
     * Get idiomamaterno
     *
     * @return integer 
     */
    public function getIdiomamaterno()
    {
        return $this->idiomamaterno;
    }

    /**
     * Set autopertenencia
     *
     * @param integer $autopertenencia
     * @return SeHc
     */
    public function setAutopertenencia($autopertenencia)
    {
        $this->autopertenencia = $autopertenencia;

        return $this;
    }

    /**
     * Get autopertenencia
     *
     * @return integer 
     */
    public function getAutopertenencia()
    {
        return $this->autopertenencia;
    }

    /**
     * Set lugarexpedicion
     *
     * @param integer $lugarexpedicion
     * @return SeHc
     */
    public function setLugarexpedicion($lugarexpedicion)
    {
        $this->lugarexpedicion = $lugarexpedicion;

        return $this;
    }

    /**
     * Get lugarexpedicion
     *
     * @return integer 
     */
    public function getLugarexpedicion()
    {
        return $this->lugarexpedicion;
    }
    public function __toString() {
        return $this->getHclAppat().' '.$this->getHclApmat().' '.$this->getHclNombre().' '.$this->getHclCodigo();
    }
}
