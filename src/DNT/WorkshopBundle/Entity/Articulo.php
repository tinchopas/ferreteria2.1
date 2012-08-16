<?php

namespace DNT\WorkshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * DNT\WorkshopBundle\Entity\Articulo
 *
 */
class Articulo
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
     * @var integer $cantidad
     */
    private $cantidad;

    /**
     * @var decimal $costo
     */
    private $costo;

    /**
     * @var decimal $precioVenta
     */
    private $precioVenta;

    /**
     * @var text $descripcion
     */
    private $descripcion;

    /**
     * @var text $imagen
     */
    private $imagen;

    /**
     * @var string $codigoBarra
     */
    private $codigoBarra;

    /**
     * @var string $codigoProveedor
     */
    private $codigoProveedor;

    /**
     * @var datetime $eliminado
     */
    private $eliminado;

    /**
     * @var datetime $creado
     */
    private $creado;

    /**
     * @var datetime $modificado
     */
    private $modificado;

    /**
     * @var DNT\WorkshopBundle\Entity\Categoria
     */
    private $idCategoria;

    /**
     * @var DNT\WorkshopBundle\Entity\ArticuloProveedor
     */
    private $ArticuloProveedors;

    public function __construct()
    {
        $this->ArticuloProveedors = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set cantidad
     *
     * @param integer $cantidad
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set costo
     *
     * @param decimal $costo
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    /**
     * Get costo
     *
     * @return decimal 
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Set precioVenta
     *
     * @param decimal $precioVenta
     */
    public function setPrecioVenta($precioVenta)
    {
        $this->precioVenta = $precioVenta;
    }

    /**
     * Get precioVenta
     *
     * @return decimal 
     */
    public function getPrecioVenta()
    {
        return $this->precioVenta;
    }

    /**
     * Set descripcion
     *
     * @param text $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * Get descripcion
     *
     * @return text 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set imagen
     *
     * @param text $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    /**
     * Get imagen
     *
     * @return text 
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set codigoBarra
     *
     * @param string $codigoBarra
     */
    public function setCodigoBarra($codigoBarra)
    {
        $this->codigoBarra = $codigoBarra;
    }

    /**
     * Get codigoBarra
     *
     * @return string 
     */
    public function getCodigoBarra()
    {
        return $this->codigoBarra;
    }

    /**
     * Set codigoProveedor
     *
     * @param string $codigoProveedor
     */
    public function setCodigoProveedor($codigoProveedor)
    {
        $this->codigoProveedor = $codigoProveedor;
    }

    /**
     * Get codigoProveedor
     *
     * @return string 
     */
    public function getCodigoProveedor()
    {
        return $this->codigoProveedor;
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

    /**
     * Set idCategoria
     *
     * @param DNT\WorkshopBundle\Entity\Categoria $idCategoria
     */
    public function setIdCategoria(\DNT\WorkshopBundle\Entity\Categoria $idCategoria)
    {
        $this->idCategoria = $idCategoria;
    }

    /**
     * Get idCategoria
     *
     * @return DNT\WorkshopBundle\Entity\Categoria 
     */
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * Add ArticuloProveedors
     *
     * @param DNT\WorkshopBundle\Entity\ArticuloProveedor $articuloProveedors
     */
    public function addArticuloProveedor(\DNT\WorkshopBundle\Entity\ArticuloProveedor $articuloProveedors)
    {
        $this->ArticuloProveedors[] = $articuloProveedors;
    }

    /**
     * Get ArticuloProveedors
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getArticuloProveedors()
    {
        return $this->ArticuloProveedors;
    }
}
