<?php
// src/Acme/HelloBundle/DataFixtures/ORM/LoadCategoria.php
namespace DNT\WorkshopBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use DNT\WorkshopBundle\Entity\Moneda;

class LoadMoneda extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $Moneda = new Moneda();
        $Moneda->setSimbolo('$');
        $Moneda->setNombre('Peso');
        $this->addReference('Moneda.Peso', $Moneda);

        $manager->persist($Moneda);

        $Moneda = new Moneda();
        $Moneda->setSimbolo('u$s');
        $Moneda->setNombre('Dolar');
        $this->addReference('Moneda.Dolar', $Moneda);

        $manager->persist($Moneda);

        $Moneda = new Moneda();
        $Moneda->setSimbolo('€');
        $Moneda->setNombre('Euro');
        $this->addReference('Moneda.Euro', $Moneda);

        $manager->persist($Moneda);

        $manager->flush();

    }

    public function getOrder() {
        return 1;
    }
}
