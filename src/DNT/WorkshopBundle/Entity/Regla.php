<?php

namespace DNT\WorkshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * DNT\WorkshopBundle\Entity\Regla
 */
class Regla
{
    /**
     * @var integer $id
     */
    private $id;

    /**
     * @var string $operando
     */
    private $operando;

    /**
     * @var float $valor
     */
    private $valor;

    /**
     * @var boolean $habilitado
     */
    private $habilitado;

    /**
     * @var datetime $creado
     */
    private $creado;

    /**
     * @var datetime $modificado
     */
    private $modificado;

    /**
     * @var integer $prioridadProv
     */
    private $prioridadProv;

    /**
     * @var integer $prioridadCat
     */
    private $prioridadCat;

    /**
     * @var DNT\WorkshopBundle\Entity\Proveedor
     */
    private $id_proveedor;

    /**
     * @var DNT\WorkshopBundle\Entity\Categoria
     */
    private $id_categoria;


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
     * Set operando
     *
     * @param string $operando
     */
    public function setOperando($operando)
    {
        $this->operando = $operando;
    }

    /**
     * Get operando
     *
     * @return string 
     */
    public function getOperando()
    {
        return $this->operando;
    }

    /**
     * Set valor
     *
     * @param float $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    /**
     * Get valor
     *
     * @return float 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set habilitado
     *
     * @param boolean $habilitado
     */
    public function setHabilitado($habilitado)
    {
        $this->habilitado = $habilitado;
    }

    /**
     * Get habilitado
     *
     * @return boolean
     */
    public function getHabilitado()
    {
        return $this->habilitado;
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
     * Set prioridadProv
     *
     * @param integer $prioridadProv
     */
    public function setPrioridadProv($prioridadProv)
    {
        $this->prioridadProv = $prioridadProv;
    }

    /**
     * Get prioridadProv
     *
     * @return integer 
     */
    public function getPrioridadProv()
    {
        return $this->prioridadProv;
    }

    /**
     * Set prioridadCat
     *
     * @param integer $prioridadCat
     */
    public function setPrioridadCat($prioridadCat)
    {
        $this->prioridadCat = $prioridadCat;
    }

    /**
     * Get prioridadCat
     *
     * @return integer 
     */
    public function getPrioridadCat()
    {
        return $this->prioridadCat;
    }

    /**
     * Set id_proveedor
     *
     * @param DNT\WorkshopBundle\Entity\Proveedor $idProveedor
     */
    public function setIdProveedor(\DNT\WorkshopBundle\Entity\Proveedor $idProveedor)
    {
        $this->id_proveedor = $idProveedor;
    }

    /**
     * Get id_proveedor
     *
     * @return DNT\WorkshopBundle\Entity\Proveedor 
     */
    public function getIdProveedor()
    {
        return $this->id_proveedor;
    }

    /**
     * Set id_categoria
     *
     * @param DNT\WorkshopBundle\Entity\Categoria $idCategoria
     */
    public function setIdCategoria(\DNT\WorkshopBundle\Entity\Categoria $idCategoria)
    {
        $this->id_categoria = $idCategoria;
    }

    /**
     * Get id_categoria
     *
     * @return DNT\WorkshopBundle\Entity\Categoria
     */
    public function getIdCategoria()
    {
        return $this->id_categoria;
    }
}
