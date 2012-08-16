<?php

namespace DNT\WorkshopBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use DNT\WorkshopBundle\Entity\ArticuloProveedor;

class LoadArticuloProveedor extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $ArticuloProveedor = new ArticuloProveedor();
        $ArticuloProveedor->setArticulo($manager->merge($this->getReference('Articulo.Destornillador')));
        $ArticuloProveedor->setProveedor($manager->merge($this->getReference('Proveedor.Javier')));
        $manager->persist($ArticuloProveedor);

        $ArticuloProveedor = new ArticuloProveedor();
        $ArticuloProveedor->setArticulo($manager->merge($this->getReference('Articulo.Taladro')));
        $ArticuloProveedor->setProveedor($manager->merge($this->getReference('Proveedor.Victor')));
        $manager->persist($ArticuloProveedor);

        $ArticuloProveedor = new ArticuloProveedor();
        $ArticuloProveedor->setArticulo($manager->merge($this->getReference('Articulo.Pintura')));
        $ArticuloProveedor->setProveedor($manager->merge($this->getReference('Proveedor.Martin')));
        $manager->persist($ArticuloProveedor);

        $manager->flush();
    }

    public function getOrder() {
        return 4;
    }
}
