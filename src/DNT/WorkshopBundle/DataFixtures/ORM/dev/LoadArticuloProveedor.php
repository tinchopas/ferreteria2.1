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
        $this->addReference('AP.JD', $ArticuloProveedor);
        $manager->persist($ArticuloProveedor);

        $ArticuloProveedor = new ArticuloProveedor();
        $ArticuloProveedor->setArticulo($manager->merge($this->getReference('Articulo.Taladro')));
        $ArticuloProveedor->setProveedor($manager->merge($this->getReference('Proveedor.Victor')));
        $this->addReference('AP.PV', $ArticuloProveedor);
        $manager->persist($ArticuloProveedor);

        $ArticuloProveedor = new ArticuloProveedor();
        $ArticuloProveedor->setArticulo($manager->merge($this->getReference('Articulo.LlaveSueca')));
        $ArticuloProveedor->setProveedor($manager->merge($this->getReference('Proveedor.Martin')));
        $this->addReference('AP.PM', $ArticuloProveedor);
        $manager->persist($ArticuloProveedor);

        $ArticuloProveedor = new ArticuloProveedor();
        $ArticuloProveedor->setArticulo($manager->merge($this->getReference('Articulo.Alicate')));
        $ArticuloProveedor->setProveedor($manager->merge($this->getReference('Proveedor.Javier')));
        $this->addReference('AP.PJ', $ArticuloProveedor);
        $manager->persist($ArticuloProveedor);

        $manager->flush();
    }

    public function getOrder() {
        return 4;
    }
}
