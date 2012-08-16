<?php

namespace DNT\WorkshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FacturaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nroFactura')
            ->add('idCliente')
        ;
    }

    public function getName()
    {
        return 'dnt_workshopbundle_facturatype';
    }
}
