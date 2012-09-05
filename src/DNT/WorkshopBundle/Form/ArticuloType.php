<?php

namespace DNT\WorkshopBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ArticuloType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', 'text', array(
                'label' => 'Nombre', 'attr' => array('class'=>"field span12"))
            )
            ->add('cantidad', 'number', array(
                'label' => 'Cantidad', 'attr' => array('class'=>"field span12"))
            )
            ->add('costo', 'money', array(
                'label' => 'Costo',
                'currency' => false, 'attr' => array('class'=>"field span12")
                )
            )
            ->add('precioVenta','money', array(
                'label' => 'Precio',
                'currency' => false, 'attr' => array('class'=>"field span12")
                )
            )
            ->add('descripcion','textarea', array(
                'label' => 'Descripcion', 'attr' => array('class'=>"field span6",'rows'=>"5"))
            )
            ->add('imagen', new ImagenType()
            )
            ->add('codigoBarra','number', array(
                'label' => 'Codigo', 'attr' => array('class'=>"field span12"))
            )
            ->add('codigoProveedor', 'number', array(
                'label' => 'Proveedor', 'attr' => array('class'=>"field span12"))
            )
            ->add('idCategoria', 'entity',  array(
                'class' => 'DNTWorkshopBundle:Categoria',
                'label' => 'Categoria',
                'empty_value' => 'Seleccione categoria'

            ))
        ;
    }


    public function getDefaultOptions(array $options)
    {
        $options = parent::getDefaultOptions($options);
        $options['csrf_protection'] = false;
        $options['data_class'] = 'DNT\WorkshopBundle\Entity\Articulo';
        return $options;
    }


    public function getName()
    {
        return 'dnt_workshopbundle_articulotype';
    }
}
