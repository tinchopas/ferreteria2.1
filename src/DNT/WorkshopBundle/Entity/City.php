<?php

namespace DNT\WorkshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * City
 */
class City
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $latitude;

    /**
     * @var float
     */
    private $longitude;

    /**
     * @var string
     */
    private $timezone;

    /**
     * @var Province
     */
    private $province;

    /**
     * @var ArrayCollection
     */
    private $suppliers;


    public function __construct()
    {
        $this->suppliers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return City
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set latitude
     *
     * @param float $latitude
     * @return City
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    
        return $this;
    }

    /**
     * Get latitude
     *
     * @return float 
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param float $longitude
     * @return City
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    
        return $this;
    }

    /**
     * Get longitude
     *
     * @return float 
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set timezone
     *
     * @param string $timezone
     * @return City
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    
        return $this;
    }

    /**
     * Get timezone
     *
     * @return string 
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Set Province
     *
     * @param DNT\WorkshopBundle\Entity\Province $province
     */
    public function setProvince(\DNT\WorkshopBundle\Entity\Province $province)
    {
        $province->addCity($this);
        $this->province = $province;
    }

    /**
     * Get province
     *
     * @return DNT\WorkshopBundle\Entity\Province
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set Suppliers
     *
     * @param Doctrine\Common\Collections\ArrayCollection $suppliers
     */
    public function setSuppliers(\Doctrine\Common\Collections\ArrayCollection $suppliers)
    {
        $this->suppliers = $suppliers;
    }

    /**
     * Add Supplier
     *
     * @param DNT\WorkshopBundle\Entity\Proveedor $supplier
     */
    public function addSupplier(\DNT\WorkshopBundle\Entity\Proveedor $supplier)
    {
        $this->suppliers[] = $supplier;
    }

    /**
     * Get suppliers
     *
     * @return Doctrine\Common\Collections\ArrayCollection 
     */
    public function getSuppliers()
    {
        return $this->suppliers;
    }

    public function __toString()
    {
        return $this->name;
    }
}
