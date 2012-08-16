<?php

namespace DNT\WorkshopBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use DNT\WorkshopBundle\Entity\Cliente;

class LoadCliente extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $Cliente = new Cliente();
        $Cliente->setNombre('Juan');
        $Cliente->setApellido('Lopez');
        $Cliente->setDireccion('9 de julio 512');
        $Cliente->setTelefono('1588446684');
        $Cliente->setEliminado(0);

        $manager->persist($Cliente);

        $Cliente = new Cliente();
        $Cliente->setNombre('Roberto');
        $Cliente->setApellido('Perez');
        $Cliente->setDireccion('Belgrano 258');
        $Cliente->setTelefono('1544344455');
        $Cliente->setEliminado(0);

        $manager->persist($Cliente);

        $Cliente = new Cliente();
        $Cliente->setNombre('Maria');
        $Cliente->setApellido('Garcia');
        $Cliente->setDireccion('Alem 992');
        $Cliente->setTelefono('155454323');
        $Cliente->setEliminado(0);

        $manager->persist($Cliente);

        $manager->flush();
    }

    public function getOrder() {
        return 6;
    }
}
