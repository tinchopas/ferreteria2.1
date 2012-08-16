<?php

namespace DNT\WorkshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RenglonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cantidad')
            ->add('precioArticulo')
            ->add('precioTotal')
            ->add('idFactura')
            ->add('id_articulo')
        ;
    }

    public function getName()
    {
        return 'dnt_workshopbundle_renglontype';
    }
}
