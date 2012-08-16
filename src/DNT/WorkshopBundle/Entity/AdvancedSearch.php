<?php

namespace DNT\WorkshopBundle\Entity;

class AdvanceSearch
{
    protected $name;
    protected $proveedor;

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getProveedor()
    {
        return $this->proveedor;
    }
    public function setProveedor($proveedor)
    {
        $this->proveedor = $proveedor;
    }
}
