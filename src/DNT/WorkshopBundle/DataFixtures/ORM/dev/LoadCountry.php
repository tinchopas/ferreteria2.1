<?php
namespace DNT\WorkshopBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

use DNT\WorkshopBundle\Entity\Country;

class LoadCountry extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $country = new Country();
        $country->setName('Argentina');
        $country->setIsoAlpha2('AR');
        $country->setIsoAlpha3('ARG');
        $this->addReference('Country.ARG', $country);

        $manager->persist($country);


        $manager->flush();

    }

    public function getOrder() {
        return 1;
    }
}
