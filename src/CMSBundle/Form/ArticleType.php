<?php

namespace CMSBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('articleTitle')
            ->add('articleTitleAr')
            ->add('articleDesc', 'textarea' , array(
                'attr' => array(
                    'class' => 'tinymce',
                    'data-theme' => 'advanced',
                    'required'=>false
                )
            ))
            ->add('articleDescAr', 'textarea' , array(
                'attr' => array(
                    'class' => 'tinymce',
                    'data-theme' => 'advanced',
                    'required'=>false
                )
            ))
            ->add('imageFile', 'file')
            ->add('articleLink')
            ->add('cityId' , 'choice' , array(
                'choices' => array(
                    '1' => 'Zabadani',
                    '2' => 'Salamiyah',
                    '3' => 'Deir ez-Zor',
                    '4' => 'Baniyas',
                    '5' => 'Daraa',
                    '6' => 'Qamishli',

                )
            ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CMSBundle\Entity\Article'
        ));
    }
}
