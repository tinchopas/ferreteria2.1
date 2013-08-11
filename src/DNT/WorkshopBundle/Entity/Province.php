<?php

namespace DNT\WorkshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Province
 */
class Province
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
     * @var Country
     */
    private $country;

    /**
     * @var ArrayCollection
     */
    private $cities;

    public function __construct()
    {
        $this->cities = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Province
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
     * Set Country
     *
     * @param DNT\WorkshopBundle\Entity\Country $country
     */
    public function setCountry(\DNT\WorkshopBundle\Entity\Country $country)
    {
        $country->addProvince($this);
        $this->country = $country;
    }

    /**
     * Get country
     *
     * @return DNT\WorkshopBundle\Entity\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set Cities
     *
     * @param Doctrine\Common\Collections\ArrayCollection $cities
     */
    public function setCities(\Doctrine\Common\Collections\ArrayCollection $cities)
    {
        $this->cities = $cities;
    }

    /**
     * Add City
     *
     * @param DNT\WorkshopBundle\Entity\City $city
     */
    public function addCity(\DNT\WorkshopBundle\Entity\City $city)
    {
        $this->cities[] = $city;
    }

    /**
     * Get cities
     *
     * @return Doctrine\Common\Collections\ArrayCollection 
     */
    public function getCities()
    {
        return $this->cities;
    }

    public function __toString()
    {
        return $this->name;
    }
}
