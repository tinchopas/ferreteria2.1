<?php

namespace DNT\WorkshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Event\DataEvent;
use Doctrine\ORM\EntityRepository;

use DNT\WorkshopBundle\Entity\City;
use DNT\WorkshopBundle\Entity\Province;
use DNT\WorkshopBundle\Entity\Country;

class CityType extends AbstractType
{
            //->add('province', 'entity', array('class'=>'DNTWorkshopBundle:Province', 'property'=>'name', 'mapped'=>false))
            //->add('city', 'entity', array('class'=>'DNTWorkshopBundle:City', 'property'=>'name'))
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('latitude')
            ->add('longitude')
            ->add('timezone')
        ;


}
