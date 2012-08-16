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
     * @var integer $devolucion
     */
    private $devolucion;

    /**
     * @var datetime $creado
     */
    private $creado;

    /**
     * @var datetime $modificado
     */
    private $modificado;

    /**
     * @var DNT\WorkshopBundle\Entity\ArticuloProveedor
     */
    private $idArticuloProveedor;


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
     * Set devolucion
     *
     * @param integer $devolucion
     */
    public function setDevolucion($devolucion)
    {
        $this->devolucion = $devolucion;
    }

    /**
     * Get devolucion
     *
     * @return integer 
     */
    public function getDevolucion()
    {
        return $this->devolucion;
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
     * Set idArticuloProveedor
     *
     * @param DNT\WorkshopBundle\Entity\ArticuloProveedor $idArticuloProveedor
     */
    public function setIdArticuloProveedor(\DNT\WorkshopBundle\Entity\ArticuloProveedor $idArticuloProveedor)
    {
        $this->idArticuloProveedor = $idArticuloProveedor;
    }

    /**
     * Get idArticuloProveedor
     *
     * @return DNT\WorkshopBundle\Entity\ArticuloProveedor 
     */
    public function getIdArticuloProveedor()
    {
        return $this->idArticuloProveedor;
    }
}
