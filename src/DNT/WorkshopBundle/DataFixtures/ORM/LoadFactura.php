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
        $Factura->setNroFactura('23452345443');

        $manager->persist($Factura);

        $Factura = new Factura();
        $Factura->setNroFactura('00000234233423');

        $manager->persist($Factura);

        $Factura = new Factura();
        $Factura->setNroFactura('0000123423');

        $manager->persist($Factura);

        $manager->flush();
    }

    public function getOrder() {
        return 8;
    }
}
