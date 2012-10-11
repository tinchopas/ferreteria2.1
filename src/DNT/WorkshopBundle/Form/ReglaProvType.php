<?php

namespace DNT\WorkshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class ReglaProvType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('operando', 'choice', array(
                    'empty_value' => 'Elija una opción',
                    'choices' => $options['ruleDefinition'],
                    'attr' => array('class' => 'input-medium')
                ))
            ->add('valor', 'number', array('attr' => array('class' => 'input-small')))
            ->add('prioridadProv', 'hidden', array('attr' => array('class' => 'prioridad input-small')))
            ->add('prioridadCat', 'hidden', array('attr' => array('class' => 'prioridad input-small')))
            ->add('habilitado', 'checkbox', array('value' => 1, 'required' => false,'attr' => array('class' => 'input-small')))
        ;
    }

    public function getName()
    {
        return 'dnt_workshopbundle_reglaprovtype';
    }

    public function getDefaultOptions(array $options)
    {
        $options = parent::getDefaultOptions($options);
        $options['ruleDefinition'] = array();
        $options['data_class']      = 'DNT\WorkshopBundle\Entity\Regla';
        return $options;
    }
}
