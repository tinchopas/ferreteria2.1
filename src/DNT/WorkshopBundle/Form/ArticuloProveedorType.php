<?php

namespace DNT\WorkshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ArticuloProveedorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idProveedor', 'entity',  array(
                'class' => 'DNTWorkshopBundle:Proveedor',
                'label' => 'Proveedor',
                'property' => 'nombre',
                'empty_value' => 'Seleccione proveedor'

            ))
            ->add('idArticulo', 'entity',  array(
                'class' => 'DNTWorkshopBundle:Articulo',
                'label' => 'Articulo',
                'property' => 'nombre',
                'empty_value' => 'Seleccione articulo'

            ))

//            ->add('articulo')
        ;
    }

    public function getDefaultOptions(array $options)
    {
        $options = parent::getDefaultOptions($options);
        $options['data_class'] = 'DNT\WorkshopBundle\Entity\ArticuloProveedor';
        return $options;
    }

    public function getName()
    {
        return 'dnt_workshopbundle_articuloproveedortype';
    }
}
