<?php

namespace DNT\WorkshopBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use DNT\WorkshopBundle\Entity\Proveedor;

class LoadProveedor extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $Proveedor = new Proveedor();
        $Proveedor->setNombre('Javier');
        $Proveedor->setApellido('Rodriguez');
        $Proveedor->setDireccion('14 de julio 25');
        $Proveedor->setTelefono('15234345433');
        $Proveedor->setDolar(4.45);
        $this->addReference('Proveedor.Javier', $Proveedor);

        $manager->persist($Proveedor);

        $Proveedor = new Proveedor();
        $Proveedor->setNombre('Victor');
        $Proveedor->setApellido('Garay');
        $Proveedor->setDireccion('Sarmiento 544');
        $Proveedor->setTelefono('15546454455');
        $Proveedor->setDolar(4.5);
        $this->addReference('Proveedor.Victor', $Proveedor);

        $manager->persist($Proveedor);

        $Proveedor = new Proveedor();
        $Proveedor->setNombre('Martin');
        $Proveedor->setApellido('Cardenas');
        $Proveedor->setDireccion('Moreno 233');
        $Proveedor->setTelefono('153453444');
        $Proveedor->setDolar(4.55);
        $this->addReference('Proveedor.Martin', $Proveedor);

        $manager->persist($Proveedor);

        $manager->flush();
    }

    public function getOrder() {
        return 3;
    }
}
