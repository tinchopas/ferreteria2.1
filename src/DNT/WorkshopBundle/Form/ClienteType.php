<?php

namespace DNT\WorkshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ClienteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('direccion')
            ->add('telefono')
        ;
    }

    public function getName()
    {
        return 'dnt_workshopbundle_clientetype';
    }
}
