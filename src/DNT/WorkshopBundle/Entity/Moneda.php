<?php

namespace DNT\WorkshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DNT\WorkshopBundle\Entity\Moneda
 */
class Moneda
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $nombre
     */
    private $nombre;

    /**
     * @var string $simbolo
     */
    private $simbolo;


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
     * Set nombre
     *
     * @param string $nombre
     * @return Moneda
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set simbolo
     *
     * @param string $simbolo
     * @return Moneda
     */
    public function setSimbolo($simbolo)
    {
        $this->simbolo = $simbolo;
    
        return $this;
    }

    /**
     * Get simbolo
     *
     * @return string 
     */
    public function getSimbolo()
    {
        return $this->simbolo;
    }

    public function __toString()
    {
        return sprintf('%s', $this->nombre);
    }
}
