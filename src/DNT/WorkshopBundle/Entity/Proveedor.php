<?php

namespace DNT\WorkshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * DNT\WorkshopBundle\Entity\Proveedor
 */
class Proveedor
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
     * @var string $apellido
     */
    private $apellido;

    /**
     * @var string $empresa
     */
    private $empresa;

    /**
     * @var string $mail
     */
    private $mail;

    /**
     * @var string $direccion
     */
    private $direccion;

    /**
     * @var string $telefono
     */
    private $telefono;

    /**
     * @var float $dolar
     */
    private $dolar;

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
    private $ArticuloProveedors;

    /**
     * @var DNT\WorkshopBundle\Entity\City
     */
    private $city;

    /**
     * @var DNT\WorkshopBundle\Entity\Regla
     */
    private $reglas;

    public function __construct()
    {
        $this->ArticuloProveedors = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reglas = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set apellido
     *
     * @param string $apellido
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set empresa
     *
     * @param string $empresa
     */
    public function setEmpresa($empresa)
    {
        $this->empresa = $empresa;
    }

    /**
     * Get empresa
     *
     * @return string 
     */
    public function getEmpresa()
    {
        return $this->empresa;
    }

    /**
     * Set mail
     *
     * @param string $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set dolar
     *
     * @param float $dolar
     */
    public function setDolar($dolar)
    {
        $this->dolar = $dolar;
    }

    /**
     * Get dolar
     *
     * @return float 
     */
    public function getDolar()
    {
        return $this->dolar;
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

    /**
     * Set City
     *
     * @param DNT\WorkshopBundle\Entity\City $city
     */
    public function setCity(\DNT\WorkshopBundle\Entity\City $city)
    {
        $city->addSupplier($this);
        $this->city = $city;
    }

    /**
     * Get City
     *
     * @return DNT\WorkshopBundle\Entity\City
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Get Province
     *
     * @return DNT\WorkshopBundle\Entity\Province
     */
    public function getProvince()
    {
        echo "getProvince";exit;
        return $this->getCity()->getProvince();
    }

    /**
     * Get City
     *
     * @return DNT\WorkshopBundle\Entity\Country
     */
    public function getCoutry()
    {
        echo "getCountry";exit;
        return $this->getProvince()->getCountry();
    }

    /**
     * Add Regla
     *
     * @param DNT\WorkshopBundle\Entity\Regla $regla
     */
    public function addRegla(\DNT\WorkshopBundle\Entity\Regla $regla)
    {
        $regla->setIdProveedor($this);
        $this->reglas[] = $regla;
    }

    /**
     * Set Reglas
     *
     * @param Doctrine\Common\Collections\Collection $reglas
     */
    public function setRegla(\Doctrine\Common\Collections\Collection $reglas)
    {
        foreach ($reglas as $regla) {
            $regla->setIdProveedor($this);
        }
        $this->reglas = $reglas;
    }

    /**
     * Get Reglas
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getReglas()
    {
        return $this->reglas;
    }

    public function removeRegla($regla)
    {
        return $this->reglas->removeElement($remove);
    }

    public function __toString()
    {
        return sprintf('%s %s', $this->nombre, $this->apellido);
    }
}
