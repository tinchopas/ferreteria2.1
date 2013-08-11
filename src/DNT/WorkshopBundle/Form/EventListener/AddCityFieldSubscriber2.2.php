<?php

namespace DNT\WorkshopBundle\Form\EventListener;

use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\Util\PropertyPath;
//use Symfony\Component\PropertyAccess\PropertyAccess;
use Doctrine\ORM\EntityRepository;
use DNT\WorkshopBundle\Entity\Province;

class AddCityFieldSubscriber implements EventSubscriberInterface
{
    private $factory;

    public function __construct(FormFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FormEvents::PRE_SET_DATA => 'preSetData',
            FormEvents::PRE_BIND     => 'preBind'
        );
    }

    private function addCityForm($form, $city, $province)
    {
        $form->add($this->factory->createNamed('city','entity', $city, array(
            'class'         => 'DNTWorkshopBundle:City',
            'empty_value'   => 'Ciudad',
            'attr'          => array(
                'class' => 'city_selector',
            ),
            'query_builder' => function (EntityRepository $repository) use ($province) {
                $qb = $repository->createQueryBuilder('city')
                    ->innerJoin('city.province', 'province');
                if ($province instanceof Province) {
                    $qb->where('city.province = :province')
                    ->setParameter('province', $province->getId());
                } elseif (is_numeric($province)) {
                    $qb->where('province.id = :province')
                    ->setParameter('province', $province);
                } else {
                    $qb->where('province.name = :province')
                    ->setParameter('province', null);
                }

                return $qb;
            }
        )));
    }

    public function preSetData(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
        if (null === $data) {
            return;
        }
var_dump($data->getName());


        /******/
        // EN SF 2.1
        $propertyPath = new PropertyPath('city');

//        $city = $propertyPath->getValue($data);
$city = null;
        /*
         * PARA CUANDO TENGAMOS SF 2.2 :)
        $accessor = PropertyAccess::getPropertyAccessor();
        $city = $accessor->getValue($data, 'city');
         */
        /******/

        $province = ($city) ? $city->getProvince() : null ;
        $this->addCityForm($form, $city, $province);
    }

    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();

        if (null === $data) {
            return;
        }

        $province = array_key_exists('province', $data) ? $data['province'] : null;
        $city = array_key_exists('city', $data) ? $data['city'] : null;
        $this->addCityForm($form, $city, $province);
    }
}
