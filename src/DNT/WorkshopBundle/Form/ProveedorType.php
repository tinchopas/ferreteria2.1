<?php

namespace DNT\WorkshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProveedorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('direccion')
            ->add('telefono')
            ->add('dolar')
        ;
    }

    public function getName()
    {
        return 'dnt_workshopbundle_proveedortype';
    }
}
