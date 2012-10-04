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
        $Articulo->setDescripcion('Destornillador Paleta');
        $Articulo->setidCategoria($manager->merge($this->getReference('Categoria.HerramientasDeMano')));
        $Articulo->setMoneda($manager->merge($this->getReference('Moneda.Peso')));
        $Articulo->setImagen($manager->merge($this->getReference('Imagen.DestornilladorPaleta')));
        $Articulo->setCodigoBarra('23452345');
        $Articulo->setCodigoProveedor('256434563');
        $this->addReference('Articulo.Destornillador', $Articulo);

        $manager->persist($Articulo);

        $Articulo = new Articulo();
        $Articulo->setNombre('Taladro');
        $Articulo->setCantidad(50);
        $Articulo->setCosto(26.90);
        $Articulo->setPrecioVenta(35.90);
        $Articulo->setDescripcion('Black and Decker 13mm');
        $Articulo->setidCategoria($manager->merge($this->getReference('Categoria.HerramientasElectricas')));
        $Articulo->setMoneda($manager->merge($this->getReference('Moneda.Euro')));
        $Articulo->setImagen($manager->merge($this->getReference('Imagen.Taladro')));
        $Articulo->setCodigoBarra('123412341');
        $Articulo->setCodigoProveedor('234523452');
        $this->addReference('Articulo.Taladro', $Articulo);

        $manager->persist($Articulo);
 
        $Articulo = new Articulo();
        $Articulo->setNombre('Llave Sueca');
        $Articulo->setCantidad(26);
        $Articulo->setCosto(51.90);
        $Articulo->setPrecioVenta(68.90);
        $Articulo->setDescripcion('Llave sueca de tamaño mediano');
        $Articulo->setidCategoria($manager->merge($this->getReference('Categoria.HerramientasDeMano')));
        $Articulo->setMoneda($manager->merge($this->getReference('Moneda.Dolar')));
        $Articulo->setImagen($manager->merge($this->getReference('Imagen.LlaveSueca')));
        $Articulo->setCodigoBarra('123412345123');
        $Articulo->setCodigoProveedor('234234244');
        $this->addReference('Articulo.LlaveSueca', $Articulo);

        $manager->persist($Articulo);

        $Articulo = new Articulo();
        $Articulo->setNombre('Alicate');
        $Articulo->setCantidad(36);
        $Articulo->setCosto(32.00);
        $Articulo->setPrecioVenta(44.90);
        $Articulo->setDescripcion('Alicate mediano con mango aislante.');
        $Articulo->setidCategoria($manager->merge($this->getReference('Categoria.HerramientasDeMano')));
        $Articulo->setMoneda($manager->merge($this->getReference('Moneda.Dolar')));
        $Articulo->setImagen($manager->merge($this->getReference('Imagen.Alicate')));
        $Articulo->setCodigoBarra('123557123');
        $Articulo->setCodigoProveedor('2342244');
        $this->addReference('Articulo.Alicate', $Articulo);

        $manager->persist($Articulo);

        $Articulo = new Articulo();
        $Articulo->setNombre('Pinza de puntas');
        $Articulo->setCantidad(36);
        $Articulo->setCosto(32.00);
        $Articulo->setPrecioVenta(44.90);
        $Articulo->setDescripcion('Pinza de puntas con mango aislante.');
        $Articulo->setidCategoria($manager->merge($this->getReference('Categoria.HerramientasDeMano')));
        $Articulo->setMoneda($manager->merge($this->getReference('Moneda.Peso')));
        $Articulo->setImagen($manager->merge($this->getReference('Imagen.PinzaDePuntas')));
        $Articulo->setCodigoBarra('123557123');
        $Articulo->setCodigoProveedor('2342244');
        $this->addReference('Articulo.PinzaDePuntas', $Articulo);

        $manager->persist($Articulo);

        $manager->flush();
    }

    public function getOrder() {
        return 2;
    }
}
