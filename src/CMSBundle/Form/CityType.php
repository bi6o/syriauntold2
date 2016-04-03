<?php

namespace CMSBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CityType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('nameAr')
            ->add('cityDesc', 'textarea', array(
                'attr' => array(
                    'class' => 'tinymce',
                    'data-theme' => 'advanced',
                    'required' => false
                )
            ))
            ->add('cityDescAr', 'textarea', array(
                'attr' => array(
                    'class' => 'tinymce',
                    'data-theme' => 'advanced',
                    'required' => false
                )
            ))
            ->add('pdfFile', 'file', array(
                'attr' => array(
                    'required' => false
                )
            ))
            ->add('publisher')
            ->add('translator')
            ->add('supervisor')
            ->add('specialThanks', 'textarea', array(
                'attr' => array(
                    'class' => 'tinymce',
                    'data-theme' => 'advanced',
                    'required' => false
                )
            ))
            ->add('publisherAr')
            ->add('translatorAr')
            ->add('supervisorAr')
            ->add('specialThanksAr', 'textarea', array(
                'attr' => array(
                    'class' => 'tinymce',
                    'data-theme' => 'advanced',
                    'required' => false
                )
            ));
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'CMSBundle\Entity\City'
        ));
    }
}
