<?php
 
namespace DNT\WorkshopBundle\Form\EventListener;
 
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityRepository;
 
class AddCountryFieldSubscriber implements EventSubscriberInterface
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
 
    private function addCountryForm($form, $country)
    {
        $form->add($this->factory->createNamed('country', 'entity', $country, array(
            'class'         => 'DNTWorkshopBundle:Country',
            'mapped'        => false,
            'attr'          => array(
                'class' => 'country_selector',
            ),
            'empty_value'   => 'País',
            'query_builder' => function (EntityRepository $repository) {
                $qb = $repository->createQueryBuilder('country');
 
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
 
        $country = ($data->getCity()) ? $data->getCity()->getProvince()->getCountry() : null ;
        $this->addCountryForm($form, $country);
    }
 
    public function preBind(FormEvent $event)
    {
        $data = $event->getData();
        $form = $event->getForm();
 
        if (null === $data) {
            return;
        }
 
        $country = array_key_exists('country', $data) ? $data['country'] : null;
        $this->addCountryForm($form, $country);
    }
}
