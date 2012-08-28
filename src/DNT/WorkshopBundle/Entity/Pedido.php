<?php

namespace DNT\WorkshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * DNT\WorkshopBundle\Entity\Pedido
 */
class Pedido
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var datetime $fecha
     */
    private $fecha;

    /**
     * @var integer $cantidad
     */
    private $cantidad;

    /**
     * @var datetime $creado
     */
    private $creado;

    /**
     * @var datetime $modificado
     */
    private $modificado;

    /**
     * @var integer $eliminado
     */
    private $eliminado;

    /**
     * @var integer $confirmado
     */
    private $confirmado;

    /**
     * @var DNT\WorkshopBundle\Entity\ArticuloProveedor
     */
    private $ArticuloProveedor;


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
     * Set fecha
     *
     * @param datetime $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * Get fecha
     *
     * @return datetime 
     */
    public function getFecha()
    {
        return $this->fecha;
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
     * Set confirmado
     *
     * @param integer $confirmado
     */
    public function setConfirmado($confirmado)
    {
        $this->confirmado = $confirmado;
    }

    /**
     * Get confirmado
     *
     * @return integer
     */
    public function getConfirmado()
    {
        return $this->confirmado;
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
     * Set ArticuloProveedor
     *
     * @param DNT\WorkshopBundle\Entity\ArticuloProveedor $ArticuloProveedor
     */
    public function setArticuloProveedor(\DNT\WorkshopBundle\Entity\ArticuloProveedor $ArticuloProveedor)
    {
        $this->ArticuloProveedor = $ArticuloProveedor;
    }

    /**
     * Get ArticuloProveedor
     *
     * @return DNT\WorkshopBundle\Entity\ArticuloProveedor 
     */
    public function getArticuloProveedor()
    {
        return $this->ArticuloProveedor;
    }
}
