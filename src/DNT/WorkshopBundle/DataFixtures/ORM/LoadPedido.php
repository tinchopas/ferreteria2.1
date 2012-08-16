<?php

namespace DNT\WorkshopBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use DNT\WorkshopBundle\Entity\Pedido;

class LoadPedido extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $Pedido = new Pedido();
        $Pedido->setFecha(new \DateTime("2012-02-04 06:12:33"));
        $Pedido->setDevolucion(0);

        $manager->persist($Pedido);

        $Pedido = new Pedido();
        $Pedido->setFecha(new \DateTime("2012-03-02 06:12:33"));
        $Pedido->setDevolucion(0);

        $manager->persist($Pedido);

        $Pedido = new Pedido();
        $Pedido->setFecha(new \DateTime("2012-01-08 06:12:33"));
        $Pedido->setDevolucion(0);

        $manager->persist($Pedido);

        $manager->flush();
    }

    public function getOrder() {
        return 7;
    }
}
