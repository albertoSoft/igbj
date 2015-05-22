<?php

namespace Gastro\SiceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Perpersona
 *
 * @ORM\Table(name="perpersona")
 * @ORM\Entity
 */
class Perpersona
{
    /**
     * @var integer
     *
     * @ORM\Column(name="pperCodPer", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ppercodper;

    /**
     * @var integer
     *
     * @ORM\Column(name="pempCodEmp", type="smallint", nullable=true)
     */
    private $pempcodemp;

    /**
     * @var string
     *
     * @ORM\Column(name="pperIdePer", type="text", nullable=true)
     */
    private $pperideper;

    /**
     * @var string
     *
     * @ORM\Column(name="pperNombre", type="text", nullable=true)
     */
    private $ppernombre;

    /**
     * @var string
     *
     * @ORM\Column(name="pperPatern", type="text", nullable=true)
     */
    private $pperpatern;

    /**
     * @var string
     *
     * @ORM\Column(name="pperMatern", type="text", nullable=true)
     */
    private $ppermatern;

    /**
     * @var integer
     *
     * @ORM\Column(name="ptidCodTid", type="smallint", nullable=true)
     */
    private $ptidcodtid;

    /**
     * @var string
     *
     * @ORM\Column(name="pperDocIde", type="text", nullable=true)
     */
    private $pperdocide;

    /**
     * @var string
     *
     * @ORM\Column(name="pperTelDom", type="text", nullable=true)
     */
    private $pperteldom;

    /**
     * @var string
     *
     * @ORM\Column(name="pperTelCel", type="text", nullable=true)
     */
    private $ppertelcel;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pperFecNac", type="datetime", nullable=true)
     */
    private $pperfecnac;

    /**
     * @var integer
     *
     * @ORM\Column(name="pperEdadpe", type="smallint", nullable=true)
     */
    private $pperedadpe;

    /**
     * @var integer
     *
     * @ORM\Column(name="pperSexope", type="smallint", nullable=true)
     */
    private $ppersexope;

    /**
     * @var string
     *
     * @ORM\Column(name="pperEstCiv", type="string", length=1, nullable=true)
     */
    private $pperestciv;

    /**
     * @var string
     *
     * @ORM\Column(name="pperEmaill", type="text", nullable=true)
     */
    private $pperemaill;

    /**
     * @var string
     *
     * @ORM\Column(name="pperDirecc", type="text", nullable=true)
     */
    private $pperdirecc;

    /**
     * @var integer
     *
     * @ORM\Column(name="plugCodLug", type="smallint", nullable=true)
     */
    private $plugcodlug;

    /**
     * @var integer
     *
     * @ORM\Column(name="pproCodPro", type="smallint", nullable=true)
     */
    private $pprocodpro;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pperFecIng", type="datetime", nullable=true)
     */
    private $pperfecing;

    /**
     * @var string
     *
     * @ORM\Column(name="pperSegCns", type="text", nullable=true)
     */
    private $ppersegcns;

    /**
     * @var float
     *
     * @ORM\Column(name="pperCatego", type="float", precision=10, scale=0, nullable=true)
     */
    private $ppercatego;

    /**
     * @var integer
     *
     * @ORM\Column(name="pperSubNat", type="smallint", nullable=true)
     */
    private $ppersubnat;

    /**
     * @var float
     *
     * @ORM\Column(name="pperMonNat", type="float", precision=10, scale=0, nullable=true)
     */
    private $ppermonnat;

    /**
     * @var integer
     *
     * @ORM\Column(name="pperSubLac", type="smallint", nullable=true)
     */
    private $ppersublac;

    /**
     * @var float
     *
     * @ORM\Column(name="pperMonLac", type="float", precision=10, scale=0, nullable=true)
     */
    private $ppermonlac;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="pperFecVac", type="datetime", nullable=true)
     */
    private $pperfecvac;

    /**
     * @var integer
     *
     * @ORM\Column(name="pperDiaFal", type="smallint", nullable=true)
     */
    private $pperdiafal;

    /**
     * @var string
     *
     * @ORM\Column(name="pperNroCta", type="text", nullable=true)
     */
    private $ppernrocta;

    /**
     * @var string
     *
     * @ORM\Column(name="pperDesCta", type="text", nullable=true)
     */
    private $pperdescta;

    /**
     * @var integer
     *
     * @ORM\Column(name="pperSwMedi", type="integer", nullable=true)
     */
    private $pperswmedi;

    /**
     * @var string
     *
     * @ORM\Column(name="pperNroMat", type="text", nullable=true)
     */
    private $ppernromat;

    /**
     * @var string
     *
     * @ORM\Column(name="pperEspMed", type="text", nullable=true)
     */
    private $pperespmed;

    /**
     * @var string
     *
     * @ORM\Column(name="pperMatCol", type="text", nullable=true)
     */
    private $ppermatcol;

    /**
     * @var string
     *
     * @ORM\Column(name="pperNroNua", type="text", nullable=true)
     */
    private $ppernronua;

    /**
     * @var integer
     *
     * @ORM\Column(name="pafpCodAfp", type="smallint", nullable=true)
     */
    private $pafpcodafp;

    /**
     * @var string
     *
     * @ORM\Column(name="pperExtVig", type="string", length=1, nullable=true)
     */
    private $pperextvig;

    /**
     * @var string
     *
     * @ORM\Column(name="pperCodBar", type="text", nullable=true)
     */
    private $ppercodbar;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="per_FechaSedes", type="datetime", nullable=true)
     */
    private $perFechasedes;

    /**
     * @var integer
     *
     * @ORM\Column(name="lugarexpedicion", type="integer", nullable=true)
     */
    private $lugarexpedicion;



    /**
     * Get ppercodper
     *
     * @return integer 
     */
    public function getPpercodper()
    {
        return $this->ppercodper;
    }

    /**
     * Set pempcodemp
     *
     * @param integer $pempcodemp
     * @return Perpersona
     */
    public function setPempcodemp($pempcodemp)
    {
        $this->pempcodemp = $pempcodemp;

        return $this;
    }

    /**
     * Get pempcodemp
     *
     * @return integer 
     */
    public function getPempcodemp()
    {
        return $this->pempcodemp;
    }

    /**
     * Set pperideper
     *
     * @param string $pperideper
     * @return Perpersona
     */
    public function setPperideper($pperideper)
    {
        $this->pperideper = $pperideper;

        return $this;
    }

    /**
     * Get pperideper
     *
     * @return string 
     */
    public function getPperideper()
    {
        return $this->pperideper;
    }

    /**
     * Set ppernombre
     *
     * @param string $ppernombre
     * @return Perpersona
     */
    public function setPpernombre($ppernombre)
    {
        $this->ppernombre = $ppernombre;

        return $this;
    }

    /**
     * Get ppernombre
     *
     * @return string 
     */
    public function getPpernombre()
    {
        return $this->ppernombre;
    }

    /**
     * Set pperpatern
     *
     * @param string $pperpatern
     * @return Perpersona
     */
    public function setPperpatern($pperpatern)
    {
        $this->pperpatern = $pperpatern;

        return $this;
    }

    /**
     * Get pperpatern
     *
     * @return string 
     */
    public function getPperpatern()
    {
        return $this->pperpatern;
    }

    /**
     * Set ppermatern
     *
     * @param string $ppermatern
     * @return Perpersona
     */
    public function setPpermatern($ppermatern)
    {
        $this->ppermatern = $ppermatern;

        return $this;
    }

    /**
     * Get ppermatern
     *
     * @return string 
     */
    public function getPpermatern()
    {
        return $this->ppermatern;
    }

    /**
     * Set ptidcodtid
     *
     * @param integer $ptidcodtid
     * @return Perpersona
     */
    public function setPtidcodtid($ptidcodtid)
    {
        $this->ptidcodtid = $ptidcodtid;

        return $this;
    }

    /**
     * Get ptidcodtid
     *
     * @return integer 
     */
    public function getPtidcodtid()
    {
        return $this->ptidcodtid;
    }

    /**
     * Set pperdocide
     *
     * @param string $pperdocide
     * @return Perpersona
     */
    public function setPperdocide($pperdocide)
    {
        $this->pperdocide = $pperdocide;

        return $this;
    }

    /**
     * Get pperdocide
     *
     * @return string 
     */
    public function getPperdocide()
    {
        return $this->pperdocide;
    }

    /**
     * Set pperteldom
     *
     * @param string $pperteldom
     * @return Perpersona
     */
    public function setPperteldom($pperteldom)
    {
        $this->pperteldom = $pperteldom;

        return $this;
    }

    /**
     * Get pperteldom
     *
     * @return string 
     */
    public function getPperteldom()
    {
        return $this->pperteldom;
    }

    /**
     * Set ppertelcel
     *
     * @param string $ppertelcel
     * @return Perpersona
     */
    public function setPpertelcel($ppertelcel)
    {
        $this->ppertelcel = $ppertelcel;

        return $this;
    }

    /**
     * Get ppertelcel
     *
     * @return string 
     */
    public function getPpertelcel()
    {
        return $this->ppertelcel;
    }

    /**
     * Set pperfecnac
     *
     * @param \DateTime $pperfecnac
     * @return Perpersona
     */
    public function setPperfecnac($pperfecnac)
    {
        $this->pperfecnac = $pperfecnac;

        return $this;
    }

    /**
     * Get pperfecnac
     *
     * @return \DateTime 
     */
    public function getPperfecnac()
    {
        return $this->pperfecnac;
    }

    /**
     * Set pperedadpe
     *
     * @param integer $pperedadpe
     * @return Perpersona
     */
    public function setPperedadpe($pperedadpe)
    {
        $this->pperedadpe = $pperedadpe;

        return $this;
    }

    /**
     * Get pperedadpe
     *
     * @return integer 
     */
    public function getPperedadpe()
    {
        return $this->pperedadpe;
    }

    /**
     * Set ppersexope
     *
     * @param integer $ppersexope
     * @return Perpersona
     */
    public function setPpersexope($ppersexope)
    {
        $this->ppersexope = $ppersexope;

        return $this;
    }

    /**
     * Get ppersexope
     *
     * @return integer 
     */
    public function getPpersexope()
    {
        return $this->ppersexope;
    }

    /**
     * Set pperestciv
     *
     * @param string $pperestciv
     * @return Perpersona
     */
    public function setPperestciv($pperestciv)
    {
        $this->pperestciv = $pperestciv;

        return $this;
    }

    /**
     * Get pperestciv
     *
     * @return string 
     */
    public function getPperestciv()
    {
        return $this->pperestciv;
    }

    /**
     * Set pperemaill
     *
     * @param string $pperemaill
     * @return Perpersona
     */
    public function setPperemaill($pperemaill)
    {
        $this->pperemaill = $pperemaill;

        return $this;
    }

    /**
     * Get pperemaill
     *
     * @return string 
     */
    public function getPperemaill()
    {
        return $this->pperemaill;
    }

    /**
     * Set pperdirecc
     *
     * @param string $pperdirecc
     * @return Perpersona
     */
    public function setPperdirecc($pperdirecc)
    {
        $this->pperdirecc = $pperdirecc;

        return $this;
    }

    /**
     * Get pperdirecc
     *
     * @return string 
     */
    public function getPperdirecc()
    {
        return $this->pperdirecc;
    }

    /**
     * Set plugcodlug
     *
     * @param integer $plugcodlug
     * @return Perpersona
     */
    public function setPlugcodlug($plugcodlug)
    {
        $this->plugcodlug = $plugcodlug;

        return $this;
    }

    /**
     * Get plugcodlug
     *
     * @return integer 
     */
    public function getPlugcodlug()
    {
        return $this->plugcodlug;
    }

    /**
     * Set pprocodpro
     *
     * @param integer $pprocodpro
     * @return Perpersona
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
     * Set pperfecing
     *
     * @param \DateTime $pperfecing
     * @return Perpersona
     */
    public function setPperfecing($pperfecing)
    {
        $this->pperfecing = $pperfecing;

        return $this;
    }

    /**
     * Get pperfecing
     *
     * @return \DateTime 
     */
    public function getPperfecing()
    {
        return $this->pperfecing;
    }

    /**
     * Set ppersegcns
     *
     * @param string $ppersegcns
     * @return Perpersona
     */
    public function setPpersegcns($ppersegcns)
    {
        $this->ppersegcns = $ppersegcns;

        return $this;
    }

    /**
     * Get ppersegcns
     *
     * @return string 
     */
    public function getPpersegcns()
    {
        return $this->ppersegcns;
    }

    /**
     * Set ppercatego
     *
     * @param float $ppercatego
     * @return Perpersona
     */
    public function setPpercatego($ppercatego)
    {
        $this->ppercatego = $ppercatego;

        return $this;
    }

    /**
     * Get ppercatego
     *
     * @return float 
     */
    public function getPpercatego()
    {
        return $this->ppercatego;
    }

    /**
     * Set ppersubnat
     *
     * @param integer $ppersubnat
     * @return Perpersona
     */
    public function setPpersubnat($ppersubnat)
    {
        $this->ppersubnat = $ppersubnat;

        return $this;
    }

    /**
     * Get ppersubnat
     *
     * @return integer 
     */
    public function getPpersubnat()
    {
        return $this->ppersubnat;
    }

    /**
     * Set ppermonnat
     *
     * @param float $ppermonnat
     * @return Perpersona
     */
    public function setPpermonnat($ppermonnat)
    {
        $this->ppermonnat = $ppermonnat;

        return $this;
    }

    /**
     * Get ppermonnat
     *
     * @return float 
     */
    public function getPpermonnat()
    {
        return $this->ppermonnat;
    }

    /**
     * Set ppersublac
     *
     * @param integer $ppersublac
     * @return Perpersona
     */
    public function setPpersublac($ppersublac)
    {
        $this->ppersublac = $ppersublac;

        return $this;
    }

    /**
     * Get ppersublac
     *
     * @return integer 
     */
    public function getPpersublac()
    {
        return $this->ppersublac;
    }

    /**
     * Set ppermonlac
     *
     * @param float $ppermonlac
     * @return Perpersona
     */
    public function setPpermonlac($ppermonlac)
    {
        $this->ppermonlac = $ppermonlac;

        return $this;
    }

    /**
     * Get ppermonlac
     *
     * @return float 
     */
    public function getPpermonlac()
    {
        return $this->ppermonlac;
    }

    /**
     * Set pperfecvac
     *
     * @param \DateTime $pperfecvac
     * @return Perpersona
     */
    public function setPperfecvac($pperfecvac)
    {
        $this->pperfecvac = $pperfecvac;

        return $this;
    }

    /**
     * Get pperfecvac
     *
     * @return \DateTime 
     */
    public function getPperfecvac()
    {
        return $this->pperfecvac;
    }

    /**
     * Set pperdiafal
     *
     * @param integer $pperdiafal
     * @return Perpersona
     */
    public function setPperdiafal($pperdiafal)
    {
        $this->pperdiafal = $pperdiafal;

        return $this;
    }

    /**
     * Get pperdiafal
     *
     * @return integer 
     */
    public function getPperdiafal()
    {
        return $this->pperdiafal;
    }

    /**
     * Set ppernrocta
     *
     * @param string $ppernrocta
     * @return Perpersona
     */
    public function setPpernrocta($ppernrocta)
    {
        $this->ppernrocta = $ppernrocta;

        return $this;
    }

    /**
     * Get ppernrocta
     *
     * @return string 
     */
    public function getPpernrocta()
    {
        return $this->ppernrocta;
    }

    /**
     * Set pperdescta
     *
     * @param string $pperdescta
     * @return Perpersona
     */
    public function setPperdescta($pperdescta)
    {
        $this->pperdescta = $pperdescta;

        return $this;
    }

    /**
     * Get pperdescta
     *
     * @return string 
     */
    public function getPperdescta()
    {
        return $this->pperdescta;
    }

    /**
     * Set pperswmedi
     *
     * @param integer $pperswmedi
     * @return Perpersona
     */
    public function setPperswmedi($pperswmedi)
    {
        $this->pperswmedi = $pperswmedi;

        return $this;
    }

    /**
     * Get pperswmedi
     *
     * @return integer 
     */
    public function getPperswmedi()
    {
        return $this->pperswmedi;
    }

    /**
     * Set ppernromat
     *
     * @param string $ppernromat
     * @return Perpersona
     */
    public function setPpernromat($ppernromat)
    {
        $this->ppernromat = $ppernromat;

        return $this;
    }

    /**
     * Get ppernromat
     *
     * @return string 
     */
    public function getPpernromat()
    {
        return $this->ppernromat;
    }

    /**
     * Set pperespmed
     *
     * @param string $pperespmed
     * @return Perpersona
     */
    public function setPperespmed($pperespmed)
    {
        $this->pperespmed = $pperespmed;

        return $this;
    }

    /**
     * Get pperespmed
     *
     * @return string 
     */
    public function getPperespmed()
    {
        return $this->pperespmed;
    }

    /**
     * Set ppermatcol
     *
     * @param string $ppermatcol
     * @return Perpersona
     */
    public function setPpermatcol($ppermatcol)
    {
        $this->ppermatcol = $ppermatcol;

        return $this;
    }

    /**
     * Get ppermatcol
     *
     * @return string 
     */
    public function getPpermatcol()
    {
        return $this->ppermatcol;
    }

    /**
     * Set ppernronua
     *
     * @param string $ppernronua
     * @return Perpersona
     */
    public function setPpernronua($ppernronua)
    {
        $this->ppernronua = $ppernronua;

        return $this;
    }

    /**
     * Get ppernronua
     *
     * @return string 
     */
    public function getPpernronua()
    {
        return $this->ppernronua;
    }

    /**
     * Set pafpcodafp
     *
     * @param integer $pafpcodafp
     * @return Perpersona
     */
    public function setPafpcodafp($pafpcodafp)
    {
        $this->pafpcodafp = $pafpcodafp;

        return $this;
    }

    /**
     * Get pafpcodafp
     *
     * @return integer 
     */
    public function getPafpcodafp()
    {
        return $this->pafpcodafp;
    }

    /**
     * Set pperextvig
     *
     * @param string $pperextvig
     * @return Perpersona
     */
    public function setPperextvig($pperextvig)
    {
        $this->pperextvig = $pperextvig;

        return $this;
    }

    /**
     * Get pperextvig
     *
     * @return string 
     */
    public function getPperextvig()
    {
        return $this->pperextvig;
    }

    /**
     * Set ppercodbar
     *
     * @param string $ppercodbar
     * @return Perpersona
     */
    public function setPpercodbar($ppercodbar)
    {
        $this->ppercodbar = $ppercodbar;

        return $this;
    }

    /**
     * Get ppercodbar
     *
     * @return string 
     */
    public function getPpercodbar()
    {
        return $this->ppercodbar;
    }

    /**
     * Set perFechasedes
     *
     * @param \DateTime $perFechasedes
     * @return Perpersona
     */
    public function setPerFechasedes($perFechasedes)
    {
        $this->perFechasedes = $perFechasedes;

        return $this;
    }

    /**
     * Get perFechasedes
     *
     * @return \DateTime 
     */
    public function getPerFechasedes()
    {
        return $this->perFechasedes;
    }

    /**
     * Set lugarexpedicion
     *
     * @param integer $lugarexpedicion
     * @return Perpersona
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
}
