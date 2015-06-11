<?php

namespace Gastro\HospitalizacionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Admision
 *
 * @ORM\Table()
 * @ORM\Entity
 * @UniqueEntity("ingresapor")
 */
class Ingresapor {
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ingresapor", type="string", length=20)
     * @Assert\NotNull(message="Llene con un valor")
     * @Assert\NotBlank(message="Debe elegir algun valor")
     */
    private $ingresapor;
    
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
     * Set ingresapor
     *
     * @param string $ingresapor
     * @return Admision
     */
    public function setIngresapor($ingresapor)
    {
        $this->ingresapor = $ingresapor;

        return $this;
    }

    /**
     * Get ingresapor
     *
     * @return string 
     */
    public function getIngresapor()
    {
        return $this->ingresapor;
    }
    public function __toString() {
        return ''.$this->getIngresapor();
    }
}
