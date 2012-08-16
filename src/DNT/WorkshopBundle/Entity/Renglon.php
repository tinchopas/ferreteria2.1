<?php

namespace DNT\WorkshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * DNT\WorkshopBundle\Entity\Renglon
 */
class Renglon
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var integer $cantidad
     */
    private $cantidad;

    /**
     * @var float $precioArticulo
     */
    private $precioArticulo;

    /**
     * @var float $precioTotal
     */
    private $precioTotal;

    /**
     * @var datetime $creado
     */
    private $creado;

    /**
     * @var datetime $modificado
     */
    private $modificado;

    /**
     * @var DNT\WorkshopBundle\Entity\Factura
     */
    private $idFactura;

    /**
     * @var DNT\WorkshopBundle\Entity\Articulo
     */
    private $id_articulo;


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
     * Set precioArticulo
     *
     * @param float $precioArticulo
     */
    public function setPrecioArticulo($precioArticulo)
    {
        $this->precioArticulo = $precioArticulo;
    }

    /**
     * Get precioArticulo
     *
     * @return float 
     */
    public function getPrecioArticulo()
    {
        return $this->precioArticulo;
    }

    /**
     * Set precioTotal
     *
     * @param float $precioTotal
     */
    public function setPrecioTotal($precioTotal)
    {
        $this->precioTotal = $precioTotal;
    }

    /**
     * Get precioTotal
     *
     * @return float 
     */
    public function getPrecioTotal()
    {
        return $this->precioTotal;
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
     * Set idFactura
     *
     * @param DNT\WorkshopBundle\Entity\Factura $idFactura
     */
    public function setIdFactura(\DNT\WorkshopBundle\Entity\Factura $idFactura)
    {
        $this->idFactura = $idFactura;
    }

    /**
     * Get idFactura
     *
     * @return DNT\WorkshopBundle\Entity\Factura 
     */
    public function getIdFactura()
    {
        return $this->idFactura;
    }

    /**
     * Set id_articulo
     *
     * @param DNT\WorkshopBundle\Entity\Articulo $idArticulo
     */
    public function setIdArticulo(\DNT\WorkshopBundle\Entity\Articulo $idArticulo)
    {
        $this->id_articulo = $idArticulo;
    }

    /**
     * Get id_articulo
     *
     * @return DNT\WorkshopBundle\Entity\Articulo 
     */
    public function getIdArticulo()
    {
        return $this->id_articulo;
    }
}
