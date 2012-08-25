<?php

namespace DNT\WorkshopBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use DNT\WorkshopBundle\Entity\Factura;

class LoadFactura extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $Factura = new Factura();
        $Factura->setNroFactura('00001');
        $this->addReference('Factura.00001', $Factura);
        $manager->persist($Factura);

        $Factura = new Factura();
        $Factura->setNroFactura('00002');
        $this->addReference('Factura.00002', $Factura);
        $manager->persist($Factura);

        $manager->flush();
    }

    public function getOrder() {
        return 7;
    }
}
