<?php

namespace DNT\WorkshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * DNT\WorkshopBundle\Entity\Factura
 */
class Factura
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $nroFactura
     */
    private $nroFactura;

    /**
     * @var datetime $creado
     */
    private $creado;

    /**
     * @var datetime $modificado
     */
    private $modificado;

    /**
     * @var DNT\WorkshopBundle\Entity\Cliente
     */
    private $idCliente;


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
     * Set nroFactura
     *
     * @param string $nroFactura
     */
    public function setNroFactura($nroFactura)
    {
        $this->nroFactura = $nroFactura;
    }

    /**
     * Get nroFactura
     *
     * @return string 
     */
    public function getNroFactura()
    {
        return $this->nroFactura;
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
     * Set idCliente
     *
     * @param DNT\WorkshopBundle\Entity\Cliente $idCliente
     */
    public function setIdCliente(\DNT\WorkshopBundle\Entity\Cliente $idCliente)
    {
        $this->idCliente = $idCliente;
    }

    /**
     * Get idCliente
     *
     * @return DNT\WorkshopBundle\Entity\Cliente 
     */
    public function getIdCliente()
    {
        return $this->idCliente;
    }
}
