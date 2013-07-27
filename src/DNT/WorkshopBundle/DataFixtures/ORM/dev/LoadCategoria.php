<?php
// src/Acme/HelloBundle/DataFixtures/ORM/LoadCategoria.php
namespace DNT\WorkshopBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use DNT\WorkshopBundle\Entity\Categoria;

class LoadCategoria extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $Categoria = new Categoria();
        $Categoria->setNombre('Herramientas de mano');
        $Categoria->setModificado(new \DateTime("now"));
        $this->addReference('Categoria.HerramientasDeMano', $Categoria);

        $manager->persist($Categoria);

        $Categoria = new Categoria();
        $Categoria->setNombre('Herramientas electricas');
        $Categoria->setModificado(new \DateTime("now"));
        $this->addReference('Categoria.HerramientasElectricas', $Categoria);

        $manager->persist($Categoria);

        $Categoria = new Categoria();
        $Categoria->setNombre('Pinturas');
        $Categoria->setModificado(new \DateTime("now"));
        $this->addReference('Categoria.Pinturas', $Categoria);

        $manager->persist($Categoria);
        $manager->flush();

    }

    public function getOrder() {
        return 1;
    }
}
