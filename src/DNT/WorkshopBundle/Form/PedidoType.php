<?php

namespace DNT\WorkshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PedidoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fecha')
            ->add('devolucion')
            ->add('idArticuloProveedor')
        ;
    }

    public function getName()
    {
        return 'dnt_workshopbundle_pedidotype';
    }
}
