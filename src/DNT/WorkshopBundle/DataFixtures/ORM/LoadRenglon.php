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
        $Renglon->setCantidad(80);
        $Renglon->setPrecioArticulo(23.9);
        $Renglon->setPrecioTotal(28.9);

        $manager->persist($Renglon);

        $Renglon = new Renglon();
        $Renglon->setCantidad(50);
        $Renglon->setPrecioArticulo(53.9);
        $Renglon->setPrecioTotal(78.9);

        $manager->persist($Renglon);

        $Renglon = new Renglon();
        $Renglon->setCantidad(60);
        $Renglon->setPrecioArticulo(33.9);
        $Renglon->setPrecioTotal(48.9);

        $manager->persist($Renglon);

        $manager->flush();
    }

    public function getOrder() {
        return 7;
    }
}
