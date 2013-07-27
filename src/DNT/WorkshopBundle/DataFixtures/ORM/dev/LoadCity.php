<?php
namespace DNT\WorkshopBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use DNT\WorkshopBundle\Entity\City;

class LoadCity extends AbstractFixture implements OrderedFixtureInterface
{

    private function addRow(ObjectManager $manager, $row)
    {
        $city = new City();
        $city->setName($row->nombreCiudad);
        $city->setLatitude($row->latitude);
        $city->setLongitude($row->longitude);
        $city->setTimezone($row->timezone);
        $city->setProvince($manager->merge($this->getReference(sprintf('Province.ARG.%s',$row->nombreProvincia))));

        $manager->persist($city);
    }

    public function load(ObjectManager $manager)
    {
        $handle = @fopen("/tmp/cities", "r");
        if ($handle) {
            while (($buffer = fgets($handle, 4096)) !== false) {
                $this->addRow($manager, json_decode($buffer));
            }
            if (!feof($handle)) {
                echo "Error: unexpected fgets() fail\n";
            }
            fclose($handle);
        }

        $manager->flush();

    }

    public function getOrder() {
        return 3;
    }
}
