<?php

namespace DNT\WorkshopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 */
class Country
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
     * @var string
     */
    private $iso_alpha2;

    /**
     * @var string
     */
    private $iso_alpha3;

    /**
     * @var ArrayCollection
     */
    private $provinces;


    public function __construct()
    {
        $this->provinces = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Country
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
     * Set iso_alpha2
     *
     * @param string $isoAlpha2
     * @return Country
     */
    public function setIsoAlpha2($isoAlpha2)
    {
        $this->iso_alpha2 = $isoAlpha2;
    
        return $this;
    }

    /**
     * Get iso_alpha2
     *
     * @return string 
     */
    public function getIsoAlpha2()
    {
        return $this->iso_alpha2;
    }

    /**
     * Set iso_alpha3
     *
     * @param string $isoAlpha3
     * @return Country
     */
    public function setIsoAlpha3($isoAlpha3)
    {
        $this->iso_alpha3 = $isoAlpha3;
    
        return $this;
    }

    /**
     * Get iso_alpha3
     *
     * @return string 
     */
    public function getIsoAlpha3()
    {
        return $this->iso_alpha3;
    }

    /**
     * Set Provinces
     *
     * @param Doctrine\Common\Collections\ArrayCollection $provinces
     */
    public function setProvinces(\Doctrine\Common\Collections\ArrayCollection $provinces)
    {
        $this->provinces = $provinces;
    }

    /**
     * Add Province
     *
     * @param DNT\WorkshopBundle\Entity\Province $province
     */
    public function addProvince(\DNT\WorkshopBundle\Entity\Province $province)
    {
        $this->provinces[] = $province;
    }

    /**
     * Get Provinces
     *
     * @return Doctrine\Common\Collections\ArrayCollection 
     */
    public function getProvinces()
    {
        return $this->provinces;
    }
}
