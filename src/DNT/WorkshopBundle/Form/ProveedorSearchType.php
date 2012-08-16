<?php

namespace DNT\WorkshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ProveedorSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre', 'text');
        $builder->add('apellido', 'text');
        $builder->add('direccion', 'text');
    }

    public function getName()
    {
        return 'proveedorSearch';
    }
}
