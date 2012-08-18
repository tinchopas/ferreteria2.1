<?php

namespace DNT\WorkshopBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use DNT\WorkshopBundle\Entity\Articulo;

class LoadArticulo extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $Articulo = new Articulo();
        $Articulo->setNombre('Destornillador');
        $Articulo->setCantidad(50);
        $Articulo->setCosto(26.90);
        $Articulo->setPrecioVenta(35.90);
        $Articulo->setDescripcion('Destornillador grande');
//        $Articulo->setImagen('Imagen');
        $Articulo->setCodigoBarra('23452345');
        $Articulo->setCodigoProveedor('256434563');
        //$Articulo->setEliminado(0);
        $this->addReference('Articulo.Destornillador', $Articulo);

        $manager->persist($Articulo);

        $Articulo = new Articulo();
        $Articulo->setNombre('Taladro');
        $Articulo->setCantidad(50);
        $Articulo->setCosto(26.90);
        $Articulo->setPrecioVenta(35.90);
        $Articulo->setDescripcion('Skils 13mm');
//        $Articulo->setImagen('Imagen');
        $Articulo->setCodigoBarra('123412341');
        $Articulo->setCodigoProveedor('234523452');
        //$Articulo->setEliminado(0);
        $this->addReference('Articulo.Taladro', $Articulo);

        $manager->persist($Articulo);
 
        $Articulo = new Articulo();
        $Articulo->setNombre('Pintura');
        $Articulo->setCantidad(26);
        $Articulo->setCosto(51.90);
        $Articulo->setPrecioVenta(68.90);
        $Articulo->setDescripcion('Alba 1 lt');
//        $Articulo->setImagen('Imagen');
        $Articulo->setCodigoBarra('123412345123');
        $Articulo->setCodigoProveedor('234234244');
        //$Articulo->setEliminado(0);
        $this->addReference('Articulo.Pintura', $Articulo);

        $manager->persist($Articulo);
        $manager->flush();

    }

    public function getOrder() {
        return 2;
    }
}
