<?php

namespace DNT\WorkshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\Event\DataEvent;

use DNT\WorkshopBundle\Entity\City;
use DNT\WorkshopBundle\Entity\Province;
use DNT\WorkshopBundle\Entity\Country;
use DNT\WorkshopBundle\Form\EventListener\AddCityFieldSubscriber;
use DNT\WorkshopBundle\Form\EventListener\AddProvinceFieldSubscriber;
use DNT\WorkshopBundle\Form\EventListener\AddCountryFieldSubscriber;


class ProveedorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('empresa')
            ->add('mail')
            ->add('direccion')
            ->add('telefono')
            ->add('dolar')
            ->add('reglas', 'collection', array('type' => new ReglaProvType(), 
                'options' => array('ruleDefinition' => $options['ruleDefinition']),
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true
            ))
            ;

        $factory = $builder->getFormFactory();
        $citySubscriber = new AddCityFieldSubscriber($factory);
        $builder->addEventSubscriber($citySubscriber);
        $provinceSubscriber = new AddProvinceFieldSubscriber($factory);
        $builder->addEventSubscriber($provinceSubscriber);
        $countrySubscriber = new AddCountryFieldSubscriber($factory);
        $builder->addEventSubscriber($countrySubscriber);




    }

    public function getDefaultOptions(array $options)
    {
        $options = parent::getDefaultOptions($options);
        $options['ruleDefinition'] = array();
        $options['data_class'] = 'DNT\WorkshopBundle\Entity\Proveedor';
        return $options;
    }


    public function getName()
    {
        return 'dnt_workshopbundle_proveedortype';
    }
}
