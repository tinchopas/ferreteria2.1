<?php
// src/Acme/HelloBundle/DataFixtures/ORM/LoadCategoria.php
namespace DNT\WorkshopBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use DNT\WorkshopBundle\Entity\Imagen;

class LoadImagen extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $Imagen = new Imagen();
        $Imagen->setPath('jpeg');
        $this->addReference('Imagen.DestornilladorPaleta', $Imagen);

        $manager->persist($Imagen);

        $Imagen = new Imagen();
        $Imagen->setPath('jpeg');
        $this->addReference('Imagen.Taladro', $Imagen);

        $manager->persist($Imagen);

        $Imagen = new Imagen();
        $Imagen->setPath('jpeg');
        $this->addReference('Imagen.LlaveSueca', $Imagen);

        $manager->persist($Imagen);

        $Imagen = new Imagen();
        $Imagen->setPath('jpeg');
        $this->addReference('Imagen.Alicate', $Imagen);

        $manager->persist($Imagen);

        $Imagen = new Imagen();
        $Imagen->setPath('jpeg');
        $this->addReference('Imagen.PinzaDePuntas', $Imagen);

        $manager->persist($Imagen);

        $manager->flush();

    }

    public function getOrder() {
        return 1;
    }
}
