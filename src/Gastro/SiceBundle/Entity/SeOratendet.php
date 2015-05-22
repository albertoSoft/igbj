<?php

namespace Gastro\SiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeOratendet
 *
 * @ORM\Table(name="se_oratendet")
 * @ORM\Entity
 */
class SeOratendet
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
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $oratCodigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="ORATDET_CODIGO", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $oratdetCodigo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ORATDET_FECHAI", type="datetime", nullable=true)
     */
    private $oratdetFechai;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ORATDET_FECHAS", type="datetime", nullable=true)
     */
    private $oratdetFechas;

    /**
     * @var integer
     *
     * @ORM\Column(name="PPERCODPER_DOCI", type="integer", nullable=true)
     */
    private $ppercodperDoci;

    /**
     * @var integer
     *
     * @ORM\Column(name="PPERCODPER_DOCS", type="integer", nullable=true)
     */
    private $ppercodperDocs;

    /**
     * @var integer
     *
     * @ORM\Column(name="PPERCODPER_ENFI", type="integer", nullable=true)
     */
    private $ppercodperEnfi;

    /**
     * @var integer
     *
     * @ORM\Column(name="PPERCODPER_ENFS", type="integer", nullable=true)
     */
    private $ppercodperEnfs;

    /**
     * @var integer
     *
     * @ORM\Column(name="TIP_CODIGO", type="integer", nullable=true)
     */
    private $tipCodigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="CIEI_CODIGO", type="integer", nullable=true)
     */
    private $cieiCodigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="CIEE_CODIGO", type="integer", nullable=true)
     */
    private $cieeCodigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="CAM_CODIGO", type="integer", nullable=true)
     */
    private $camCodigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="VGRUCODIGO", type="integer", nullable=true)
     */
    private $vgrucodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="ORATDET_EST", type="string", length=1, nullable=true)
     */
    private $oratdetEst;

    /**
     * @var integer
     *
     * @ORM\Column(name="MED_TRAT1", type="integer", nullable=true)
     */
    private $medTrat1;

    /**
     * @var integer
     *
     * @ORM\Column(name="MED_TRAT2", type="integer", nullable=true)
     */
    private $medTrat2;

    /**
     * @var integer
     *
     * @ORM\Column(name="CIEI_CODIGO1", type="integer", nullable=true)
     */
    private $cieiCodigo1;

    /**
     * @var integer
     *
     * @ORM\Column(name="CIEI_CODIGO2", type="integer", nullable=true)
     */
    private $cieiCodigo2;

    /**
     * @var integer
     *
     * @ORM\Column(name="CIEI_CODIGO3", type="integer", nullable=true)
     */
    private $cieiCodigo3;

    /**
     * @var integer
     *
     * @ORM\Column(name="CIEE_CODIGO1", type="integer", nullable=true)
     */
    private $cieeCodigo1;

    /**
     * @var integer
     *
     * @ORM\Column(name="CIEE_CODIGO2", type="integer", nullable=true)
     */
    private $cieeCodigo2;

    /**
     * @var integer
     *
     * @ORM\Column(name="CIEE_CODIGO3", type="integer", nullable=true)
     */
    private $cieeCodigo3;

    /**
     * @var integer
     *
     * @ORM\Column(name="DAT_FILA", type="integer", nullable=true)
     */
    private $datFila;

    /**
     * @var string
     *
     * @ORM\Column(name="ORAT_USUARIOI", type="text", nullable=true)
     */
    private $oratUsuarioi;

    /**
     * @var string
     *
     * @ORM\Column(name="ORAT_USUARIOE", type="text", nullable=true)
     */
    private $oratUsuarioe;

    /**
     * @var integer
     *
     * @ORM\Column(name="ORAT_FNANIOI", type="smallint", nullable=true)
     */
    private $oratFnanioi;

    /**
     * @var integer
     *
     * @ORM\Column(name="ORAT_FNMESI", type="smallint", nullable=true)
     */
    private $oratFnmesi;

    /**
     * @var integer
     *
     * @ORM\Column(name="ORAT_FNDIAI", type="smallint", nullable=true)
     */
    private $oratFndiai;

    /**
     * @var integer
     *
     * @ORM\Column(name="ORAT_FNANIOE", type="smallint", nullable=true)
     */
    private $oratFnanioe;

    /**
     * @var integer
     *
     * @ORM\Column(name="ORAT_FNMESE", type="smallint", nullable=true)
     */
    private $oratFnmese;

    /**
     * @var integer
     *
     * @ORM\Column(name="ORAT_FNDIAE", type="smallint", nullable=true)
     */
    private $oratFndiae;

    /**
     * @var integer
     *
     * @ORM\Column(name="ORAT_SEXO", type="smallint", nullable=true)
     */
    private $oratSexo;



    /**
     * Set empCodigo
     *
     * @param integer $empCodigo
     * @return SeOratendet
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
     * Set oratCodigo
     *
     * @param integer $oratCodigo
     * @return SeOratendet
     */
    public function setOratCodigo($oratCodigo)
    {
        $this->oratCodigo = $oratCodigo;

        return $this;
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
     * Set oratdetCodigo
     *
     * @param integer $oratdetCodigo
     * @return SeOratendet
     */
    public function setOratdetCodigo($oratdetCodigo)
    {
        $this->oratdetCodigo = $oratdetCodigo;

        return $this;
    }

    /**
     * Get oratdetCodigo
     *
     * @return integer 
     */
    public function getOratdetCodigo()
    {
        return $this->oratdetCodigo;
    }

    /**
     * Set oratdetFechai
     *
     * @param \DateTime $oratdetFechai
     * @return SeOratendet
     */
    public function setOratdetFechai($oratdetFechai)
    {
        $this->oratdetFechai = $oratdetFechai;

        return $this;
    }

    /**
     * Get oratdetFechai
     *
     * @return \DateTime 
     */
    public function getOratdetFechai()
    {
        return $this->oratdetFechai;
    }

    /**
     * Set oratdetFechas
     *
     * @param \DateTime $oratdetFechas
     * @return SeOratendet
     */
    public function setOratdetFechas($oratdetFechas)
    {
        $this->oratdetFechas = $oratdetFechas;

        return $this;
    }

    /**
     * Get oratdetFechas
     *
     * @return \DateTime 
     */
    public function getOratdetFechas()
    {
        return $this->oratdetFechas;
    }

    /**
     * Set ppercodperDoci
     *
     * @param integer $ppercodperDoci
     * @return SeOratendet
     */
    public function setPpercodperDoci($ppercodperDoci)
    {
        $this->ppercodperDoci = $ppercodperDoci;

        return $this;
    }

    /**
     * Get ppercodperDoci
     *
     * @return integer 
     */
    public function getPpercodperDoci()
    {
        return $this->ppercodperDoci;
    }

    /**
     * Set ppercodperDocs
     *
     * @param integer $ppercodperDocs
     * @return SeOratendet
     */
    public function setPpercodperDocs($ppercodperDocs)
    {
        $this->ppercodperDocs = $ppercodperDocs;

        return $this;
    }

    /**
     * Get ppercodperDocs
     *
     * @return integer 
     */
    public function getPpercodperDocs()
    {
        return $this->ppercodperDocs;
    }

    /**
     * Set ppercodperEnfi
     *
     * @param integer $ppercodperEnfi
     * @return SeOratendet
     */
    public function setPpercodperEnfi($ppercodperEnfi)
    {
        $this->ppercodperEnfi = $ppercodperEnfi;

        return $this;
    }

    /**
     * Get ppercodperEnfi
     *
     * @return integer 
     */
    public function getPpercodperEnfi()
    {
        return $this->ppercodperEnfi;
    }

    /**
     * Set ppercodperEnfs
     *
     * @param integer $ppercodperEnfs
     * @return SeOratendet
     */
    public function setPpercodperEnfs($ppercodperEnfs)
    {
        $this->ppercodperEnfs = $ppercodperEnfs;

        return $this;
    }

    /**
     * Get ppercodperEnfs
     *
     * @return integer 
     */
    public function getPpercodperEnfs()
    {
        return $this->ppercodperEnfs;
    }

    /**
     * Set tipCodigo
     *
     * @param integer $tipCodigo
     * @return SeOratendet
     */
    public function setTipCodigo($tipCodigo)
    {
        $this->tipCodigo = $tipCodigo;

        return $this;
    }

    /**
     * Get tipCodigo
     *
     * @return integer 
     */
    public function getTipCodigo()
    {
        return $this->tipCodigo;
    }

    /**
     * Set cieiCodigo
     *
     * @param integer $cieiCodigo
     * @return SeOratendet
     */
    public function setCieiCodigo($cieiCodigo)
    {
        $this->cieiCodigo = $cieiCodigo;

        return $this;
    }

    /**
     * Get cieiCodigo
     *
     * @return integer 
     */
    public function getCieiCodigo()
    {
        return $this->cieiCodigo;
    }

    /**
     * Set cieeCodigo
     *
     * @param integer $cieeCodigo
     * @return SeOratendet
     */
    public function setCieeCodigo($cieeCodigo)
    {
        $this->cieeCodigo = $cieeCodigo;

        return $this;
    }

    /**
     * Get cieeCodigo
     *
     * @return integer 
     */
    public function getCieeCodigo()
    {
        return $this->cieeCodigo;
    }

    /**
     * Set camCodigo
     *
     * @param integer $camCodigo
     * @return SeOratendet
     */
    public function setCamCodigo($camCodigo)
    {
        $this->camCodigo = $camCodigo;

        return $this;
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
     * Set vgrucodigo
     *
     * @param integer $vgrucodigo
     * @return SeOratendet
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
     * Set oratdetEst
     *
     * @param string $oratdetEst
     * @return SeOratendet
     */
    public function setOratdetEst($oratdetEst)
    {
        $this->oratdetEst = $oratdetEst;

        return $this;
    }

    /**
     * Get oratdetEst
     *
     * @return string 
     */
    public function getOratdetEst()
    {
        return $this->oratdetEst;
    }

    /**
     * Set medTrat1
     *
     * @param integer $medTrat1
     * @return SeOratendet
     */
    public function setMedTrat1($medTrat1)
    {
        $this->medTrat1 = $medTrat1;

        return $this;
    }

    /**
     * Get medTrat1
     *
     * @return integer 
     */
    public function getMedTrat1()
    {
        return $this->medTrat1;
    }

    /**
     * Set medTrat2
     *
     * @param integer $medTrat2
     * @return SeOratendet
     */
    public function setMedTrat2($medTrat2)
    {
        $this->medTrat2 = $medTrat2;

        return $this;
    }

    /**
     * Get medTrat2
     *
     * @return integer 
     */
    public function getMedTrat2()
    {
        return $this->medTrat2;
    }

    /**
     * Set cieiCodigo1
     *
     * @param integer $cieiCodigo1
     * @return SeOratendet
     */
    public function setCieiCodigo1($cieiCodigo1)
    {
        $this->cieiCodigo1 = $cieiCodigo1;

        return $this;
    }

    /**
     * Get cieiCodigo1
     *
     * @return integer 
     */
    public function getCieiCodigo1()
    {
        return $this->cieiCodigo1;
    }

    /**
     * Set cieiCodigo2
     *
     * @param integer $cieiCodigo2
     * @return SeOratendet
     */
    public function setCieiCodigo2($cieiCodigo2)
    {
        $this->cieiCodigo2 = $cieiCodigo2;

        return $this;
    }

    /**
     * Get cieiCodigo2
     *
     * @return integer 
     */
    public function getCieiCodigo2()
    {
        return $this->cieiCodigo2;
    }

    /**
     * Set cieiCodigo3
     *
     * @param integer $cieiCodigo3
     * @return SeOratendet
     */
    public function setCieiCodigo3($cieiCodigo3)
    {
        $this->cieiCodigo3 = $cieiCodigo3;

        return $this;
    }

    /**
     * Get cieiCodigo3
     *
     * @return integer 
     */
    public function getCieiCodigo3()
    {
        return $this->cieiCodigo3;
    }

    /**
     * Set cieeCodigo1
     *
     * @param integer $cieeCodigo1
     * @return SeOratendet
     */
    public function setCieeCodigo1($cieeCodigo1)
    {
        $this->cieeCodigo1 = $cieeCodigo1;

        return $this;
    }

    /**
     * Get cieeCodigo1
     *
     * @return integer 
     */
    public function getCieeCodigo1()
    {
        return $this->cieeCodigo1;
    }

    /**
     * Set cieeCodigo2
     *
     * @param integer $cieeCodigo2
     * @return SeOratendet
     */
    public function setCieeCodigo2($cieeCodigo2)
    {
        $this->cieeCodigo2 = $cieeCodigo2;

        return $this;
    }

    /**
     * Get cieeCodigo2
     *
     * @return integer 
     */
    public function getCieeCodigo2()
    {
        return $this->cieeCodigo2;
    }

    /**
     * Set cieeCodigo3
     *
     * @param integer $cieeCodigo3
     * @return SeOratendet
     */
    public function setCieeCodigo3($cieeCodigo3)
    {
        $this->cieeCodigo3 = $cieeCodigo3;

        return $this;
    }

    /**
     * Get cieeCodigo3
     *
     * @return integer 
     */
    public function getCieeCodigo3()
    {
        return $this->cieeCodigo3;
    }

    /**
     * Set datFila
     *
     * @param integer $datFila
     * @return SeOratendet
     */
    public function setDatFila($datFila)
    {
        $this->datFila = $datFila;

        return $this;
    }

    /**
     * Get datFila
     *
     * @return integer 
     */
    public function getDatFila()
    {
        return $this->datFila;
    }

    /**
     * Set oratUsuarioi
     *
     * @param string $oratUsuarioi
     * @return SeOratendet
     */
    public function setOratUsuarioi($oratUsuarioi)
    {
        $this->oratUsuarioi = $oratUsuarioi;

        return $this;
    }

    /**
     * Get oratUsuarioi
     *
     * @return string 
     */
    public function getOratUsuarioi()
    {
        return $this->oratUsuarioi;
    }

    /**
     * Set oratUsuarioe
     *
     * @param string $oratUsuarioe
     * @return SeOratendet
     */
    public function setOratUsuarioe($oratUsuarioe)
    {
        $this->oratUsuarioe = $oratUsuarioe;

        return $this;
    }

    /**
     * Get oratUsuarioe
     *
     * @return string 
     */
    public function getOratUsuarioe()
    {
        return $this->oratUsuarioe;
    }

    /**
     * Set oratFnanioi
     *
     * @param integer $oratFnanioi
     * @return SeOratendet
     */
    public function setOratFnanioi($oratFnanioi)
    {
        $this->oratFnanioi = $oratFnanioi;

        return $this;
    }

    /**
     * Get oratFnanioi
     *
     * @return integer 
     */
    public function getOratFnanioi()
    {
        return $this->oratFnanioi;
    }

    /**
     * Set oratFnmesi
     *
     * @param integer $oratFnmesi
     * @return SeOratendet
     */
    public function setOratFnmesi($oratFnmesi)
    {
        $this->oratFnmesi = $oratFnmesi;

        return $this;
    }

    /**
     * Get oratFnmesi
     *
     * @return integer 
     */
    public function getOratFnmesi()
    {
        return $this->oratFnmesi;
    }

    /**
     * Set oratFndiai
     *
     * @param integer $oratFndiai
     * @return SeOratendet
     */
    public function setOratFndiai($oratFndiai)
    {
        $this->oratFndiai = $oratFndiai;

        return $this;
    }

    /**
     * Get oratFndiai
     *
     * @return integer 
     */
    public function getOratFndiai()
    {
        return $this->oratFndiai;
    }

    /**
     * Set oratFnanioe
     *
     * @param integer $oratFnanioe
     * @return SeOratendet
     */
    public function setOratFnanioe($oratFnanioe)
    {
        $this->oratFnanioe = $oratFnanioe;

        return $this;
    }

    /**
     * Get oratFnanioe
     *
     * @return integer 
     */
    public function getOratFnanioe()
    {
        return $this->oratFnanioe;
    }

    /**
     * Set oratFnmese
     *
     * @param integer $oratFnmese
     * @return SeOratendet
     */
    public function setOratFnmese($oratFnmese)
    {
        $this->oratFnmese = $oratFnmese;

        return $this;
    }

    /**
     * Get oratFnmese
     *
     * @return integer 
     */
    public function getOratFnmese()
    {
        return $this->oratFnmese;
    }

    /**
     * Set oratFndiae
     *
     * @param integer $oratFndiae
     * @return SeOratendet
     */
    public function setOratFndiae($oratFndiae)
    {
        $this->oratFndiae = $oratFndiae;

        return $this;
    }

    /**
     * Get oratFndiae
     *
     * @return integer 
     */
    public function getOratFndiae()
    {
        return $this->oratFndiae;
    }

    /**
     * Set oratSexo
     *
     * @param integer $oratSexo
     * @return SeOratendet
     */
    public function setOratSexo($oratSexo)
    {
        $this->oratSexo = $oratSexo;

        return $this;
    }

    /**
     * Get oratSexo
     *
     * @return integer 
     */
    public function getOratSexo()
    {
        return $this->oratSexo;
    }
}
