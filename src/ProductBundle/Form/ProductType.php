<?php

namespace PolicyBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EntityType;
use ProductBundle\Form\ProductCategoryType;


class ProductType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'name', 
            TextType::class,
            [
                'label'     => 'Nombre',
                'mapped'    => true,
                'required'  => true
            ]
        );
        
        $builder->add(
            'code', 
            TextType::class,
            [
                'label'     => 'Codigo',
                'mapped'    => true,
                'required'  => true
            ]
        );

        // Este formulario se aplicaria en la creacion de una nueva categoria
        $builder->add(
            'category',
            ProductCategoryType::class,
            [
                'label'     => 'Categoria',
                'mapped'    => true
            ]
        );

        //Este campo se aplicaria en la seleccion de una categorya ya creada
        $builder->add(
            'category',
            EntityType::class,
            [
                'label'     => 'Categoria',
                'class'     => \ProductBundle\Entity\ProductCategory::class,
                'required'  => true,
                'mapped'    => true
            ]
        );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProductBundle\Entity\Product'
        ));
    }

    public function getBlockPrefix()
    {
        return 'productbundle_product';
    }
}