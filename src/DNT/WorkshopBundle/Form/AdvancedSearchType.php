<?php

namespace DNT\WorkshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AdvancedSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('articulo', 'text');
        $builder->add('descripcion', 'text');
        $builder->add('codproveedor', 'text');
        $builder->add('proveedor', 'text');
        $builder->add('cantidad_max', 'number');
        $builder->add('cantidad_min', 'number');
    }

    public function getName()
    {
        return 'advancedSearch';
    }
}
