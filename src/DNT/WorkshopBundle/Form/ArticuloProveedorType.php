<?php

namespace DNT\WorkshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ArticuloProveedorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('proveedor')
            ->add('articulo')
        ;
    }

    public function getName()
    {
        return 'dnt_workshopbundle_articuloproveedortype';
    }
}
