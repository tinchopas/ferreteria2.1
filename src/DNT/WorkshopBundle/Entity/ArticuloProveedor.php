<?php

namespace DNT\WorkshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;


/**
 * DNT\WorkshopBundle\Entity\ArticuloProveedor
 */
class ArticuloProveedor
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var DNT\WorkshopBundle\Entity\Proveedor
     */
    private $proveedor;

    /**
     * @var DNT\WorkshopBundle\Entity\Articulo
     */
    private $articulo;

    /**
     * @var DNT\WorkshopBundle\Entity\Pedido
     */
    private $pedido;

    /**
     * @var datetime $creado
     */
    private $creado;

    /**
     * @var datetime $modificado
     */
    private $modificado;


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
     * Set proveedor
     *
     * @param DNT\WorkshopBundle\Entity\Proveedor $proveedor
     */
    public function setProveedor(\DNT\WorkshopBundle\Entity\Proveedor $proveedor)
    {
        $this->proveedor = $proveedor;
    }

    /**
     * Get proveedor
     *
     * @return DNT\WorkshopBundle\Entity\Proveedor 
     */
    public function getProveedor()
    {
        return $this->proveedor;
    }

    /**
     * Set articulo
     *
     * @param DNT\WorkshopBundle\Entity\Articulo $articulo
     */
    public function setArticulo(\DNT\WorkshopBundle\Entity\Articulo $articulo)
    {
        $this->articulo = $articulo;
    }

    /**
     * Get articulo
     *
     * @return DNT\WorkshopBundle\Entity\Articulo 
     */
    public function getArticulo()
    {
        return $this->articulo;
    }

    /**
     * Add Pedidos
     *
     * @param DNT\WorkshopBundle\Entity\Pedido $pedido
     */
    public function addPedido(\DNT\WorkshopBundle\Entity\pedido $pedido)
    {
        $this->pedidos[] = $pedido;
    }

    /**
     * Get Pedido
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPedidos()
    {
        return $this->pedidos;
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
}
