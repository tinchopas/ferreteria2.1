<?php
// src/Acme/HelloBundle/DataFixtures/ORM/LoadRegla.php
namespace DNT\WorkshopBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use DNT\WorkshopBundle\Entity\Regla;

class LoadRegla extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $Regla = new Regla();
        $Regla->setOperando('sum');
        $Regla->setValor(20.50);

        $manager->persist($Regla);

        $Regla = new Regla();
        $Regla->setOperando('sub');
        $Regla->setValor(20);

        $manager->persist($Regla);

        $manager->flush();
    }

    public function getOrder() {
        return 5;
    }
}
