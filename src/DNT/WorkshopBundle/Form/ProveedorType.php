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
            ->add('empresa')
            ->add('mail')
            ->add('direccion')
            ->add('telefono')
            ->add('dolar')
            ->add('reglas', 'collection', array('type' => new ReglaProvType(), 
                'options' => array('ruleDefinition' => $options['ruleDefinition']),
                'allow_add' => true,
                'by_reference' => false,
                'allow_delete' => true
            ))
        ;
    }

    public function getDefaultOptions(array $options)
    {
        $options = parent::getDefaultOptions($options);
        $options['ruleDefinition'] = array();
        $options['data_class'] = 'DNT\WorkshopBundle\Entity\Proveedor';
        return $options;
    }


    public function getName()
    {
        return 'dnt_workshopbundle_proveedortype';
    }
}
