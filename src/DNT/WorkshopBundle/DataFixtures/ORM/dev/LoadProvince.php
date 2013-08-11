<?php
namespace DNT\WorkshopBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use DNT\WorkshopBundle\Entity\Province;

class LoadProvince extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $namesProvince = array(
            'Buenos Aires F.D.',
            'Buenos Aires',
            'Catamarca',
            'Chaco',
            'Chubut',
            'Córdoba',
            'Corrientes',
            'Entre Ríos',
            'Formosa',
            'Jujuy',
            'La Pampa',
            'La Rioja',
            'Mendoza',
            'Misiones',
            'Neuquén',
            'Río Negro',
            'Salta',
            'San Juan',
            'San Luis',
            'Santa Cruz',
            'Santa Fe',
            'Santiago del Estero',
            'Tierra del Fuego',
            'Tucumán'
        );

        foreach ($namesProvince as $nameProvince) {

            $province = new Province();
            $province->setName($nameProvince);
            $province->setCountry($manager->merge($this->getReference('Country.ARG')));
            $this->addReference(sprintf('Province.ARG.%s',$nameProvince), $province);

            $manager->persist($province);
        }


        $manager->flush();

    }

    public function getOrder() {
        return 2;
    }
}
