<?php

namespace DNT\WorkshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CategoriaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
        ;
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'DNT\WorkshopBundle\Entity\Categoria',
        );
    }

    public function getName()
    {
        return 'dnt_workshopbundle_categoriatype';
    }
}
