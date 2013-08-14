<?php
namespace DNT\WorkshopBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use DNT\WorkshopBundle\Entity\ArticuloProveedor;

class LoadArticuloProveedor extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $articles = $manager->createQuery("select a from DNT\WorkshopBundle\Entity\Articulo a where a.codigoBarra <=2146")->getResult();
        $proveedor =  $manager->createQuery("select p from DNT\WorkshopBundle\Entity\Proveedor p where p.nombre = :proveedor")
            ->setParameter('proveedor', "Christian Mundel")
            ->getSingleResult();

        foreach ($articles as $article) {
            $articuloProveedor = new ArticuloProveedor();
            $articuloProveedor->setArticulo($article);
            $articuloProveedor->setProveedor($proveedor);
            $manager->persist($articuloProveedor);
        }

        $manager->flush();



        $articles = $manager->createQuery("select a from DNT\WorkshopBundle\Entity\Articulo a where a.codigoBarra > 2147")->getResult();
        $proveedor =  $manager->createQuery("select p from DNT\WorkshopBundle\Entity\Proveedor p where p.nombre = :proveedor")
            ->setParameter('proveedor', "libreria del colegio")
            ->getSingleResult();

        foreach ($articles as $article) {
            $articuloProveedor = new ArticuloProveedor();
            $articuloProveedor->setArticulo($article);
            $articuloProveedor->setProveedor($proveedor);
            $manager->persist($articuloProveedor);
        }

        $manager->flush();



    }

    public function getOrder() {
        return 1;
    }
}
