<?php

namespace DNT\WorkshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class ReglaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('operando', 'choice', array(
                    'empty_value' => 'Elija una opción',
                    'choices' => $options['ruleDefinition']
                ))
            ->add('valor')
            ->add('habilitado', 'checkbox', array('value' => 1, 'required' => false))
            ->add('id_proveedor', 'entity',  array(
                'class' => 'DNTWorkshopBundle:Proveedor',
                'label' => 'Proveedor',
                'empty_value' => 'Seleccione proveedor',
                'required' => false
            ))
            ->add('id_categoria', 'entity',  array(
                'class' => 'DNTWorkshopBundle:Categoria',
                'label' => 'Categoria',
                'empty_value' => 'Seleccione categoria',
                'required' => false
            ))
        ;
    }

    public function getName()
    {
        return 'dnt_workshopbundle_reglatype';
    }

    public function getDefaultOptions(array $options)
    {
        $options = parent::getDefaultOptions($options);
        $options['ruleDefinition'] = array();
        $options['data_class']      = 'DNT\WorkshopBundle\Entity\Regla';
        return $options;
    }
}
