<?php

namespace PolicyBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class ProductCategoryType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add(
            'name', 
            TextType::class,
            [
                'label'     => 'Nombre',
                'mapped' => true,
                'required' => true
            ]);
        
        $builder->add(
            'code', 
            TextType::class,
            [
                'label'     => 'Codigo',
                'mapped' => true,
                'required' => false
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ProductBundle\Entity\ProductCategory'
        ));
    }

    public function getBlockPrefix()
    {
        return 'productbundle_productcategory';
    }
}