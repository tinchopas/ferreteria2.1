<?php

namespace DNT\WorkshopBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use DNT\WorkshopBundle\Entity\Renglon;

class LoadRenglon extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $Renglon = new Renglon();
        $Renglon->setCantidad(1);
        $Renglon->setPrecioArticulo(23.90);
        $Renglon->setPrecioTotal(23.90);
        $Renglon->setArticulo($manager->merge($this->getReference('Articulo.Taladro')));
        $Renglon->setFactura($manager->merge($this->getReference('Factura.00001')));
        $manager->persist($Renglon);

        $Renglon = new Renglon();
        $Renglon->setCantidad(2);
        $Renglon->setPrecioArticulo(53.90);
        $Renglon->setPrecioTotal(107.80);
        $Renglon->setArticulo($manager->merge($this->getReference('Articulo.Pintura')));
        $Renglon->setFactura($manager->merge($this->getReference('Factura.00001')));
        $manager->persist($Renglon);

        $Renglon = new Renglon();
        $Renglon->setCantidad(1);
        $Renglon->setPrecioArticulo(33.90);
        $Renglon->setPrecioTotal(33.90);
        $Renglon->setArticulo($manager->merge($this->getReference('Articulo.Alicate')));
        $Renglon->setFactura($manager->merge($this->getReference('Factura.00001')));
        $manager->persist($Renglon);

        $Renglon = new Renglon();
        $Renglon->setCantidad(3);
        $Renglon->setPrecioArticulo(60.00);
        $Renglon->setPrecioTotal(180.00);
        $Renglon->setArticulo($manager->merge($this->getReference('Articulo.Taladro')));
        $Renglon->setFactura($manager->merge($this->getReference('Factura.00002')));
        $manager->persist($Renglon);

        $manager->flush();
    }

    public function getOrder() {
        return 8;
    }
}
