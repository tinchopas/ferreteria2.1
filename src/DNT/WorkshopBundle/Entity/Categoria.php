<?php

namespace DNT\WorkshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * DNT\WorkshopBundle\Entity\Categoria
 */
class Categoria
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
     * @var datetime $creado
     */
    private $creado;

    /**
     * @var datetime $modificado
     */
    private $modificado;

    /**
     * @var DNT\WorkshopBundle\Entity\Articulo
     */
    private $articulos;

    /**
     * @var datetime $eliminado
     */
    private $eliminado;

    public function __construct()
    {
        $this->articulos = new \Doctrine\Common\Collections\ArrayCollection();
    }


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
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
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
     * Set creado
     *
     * @param datetime $creado
     */
    public function setCreado($creado)
    {
        $this->creado = $creado;
    }

    /**
     * Get creado
     *
     * @return datetime 
     */
    public function getCreado()
    {
        return $this->creado;
    }

    /**
     * Set modificado
     *
     * @param datetime $modificado
     */
    public function setModificado($modificado)
    {
        $this->modificado = $modificado;
    }

    /**
     * Get modificado
     *
     * @return datetime 
     */
    public function getModificado()
    {
        return $this->modificado;
    }

        public function __toString()
    {
        return $this->nombre;
    }

    /**
     * Add Articulo
     *
     * @param DNT\WorkshopBundle\Entity\Articulo $articulo
     */
    public function addArticulo(\DNT\WorkshopBundle\Entity\Articulo $articulo)
    {
        $this->articulos[] = $articulo;
    }

    /**
     * Get Articulos
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getArticulos()
    {
        return $this->articulos;
    }

    /**
     * Set eliminado
     *
     * @param integer $eliminado
     */
    public function setEliminado($eliminado)
    {
        $this->eliminado = $eliminado;
    }

    /**
     * Get eliminado
     *
     * @return integer 
     */
    public function getEliminado()
    {
        return $this->eliminado;
    }

}
