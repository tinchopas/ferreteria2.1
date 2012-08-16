<?php

namespace DNT\WorkshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

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
#            ->add('id_proveedor')
        ;
    }

    /*
            ->add('operando', 'operator_selector')
            ->add('operando', 'choice', array(
                    'empty_value' => 'Elija una opción',
                    'choices' => array('Multiplicación' => 'Multiplicación', 'División' => 'División', 'Resta' => 'Resta', 'Suma' => 'Suma', 'Porcentaje' => 'Porcentaje', )
                ))
     * */

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
