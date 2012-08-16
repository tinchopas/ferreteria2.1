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
                'label' => 'Nombre')
            )
            ->add('cantidad', 'number', array(
                'label' => 'Cantidad',     )
            )
            ->add('costo', 'money', array(
                'label' => 'Costo',
                'currency' => 'u$s'
                )
            )
            ->add('precioVenta','money', array(
                'label' => 'Precio')
            )
            ->add('descripcion','textarea', array(
                'label' => 'Descripcion')
            )
            ->add('imagen', 'file', array(
                'label' => 'Imagen')
            )
            ->add('codigoBarra','number', array(
                'label' => 'Codigo')
            )
            ->add('codigoProveedor', 'number', array(
                'label' => 'Proveedor')
            )
/*            ->add('eliminado', 'number', array(
                'label' => 'Eliminado')
            )
*/
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
