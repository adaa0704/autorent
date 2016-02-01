<?php

namespace RentAndDriveBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SearchType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('show_only_available', 'checkbox', array(
                'label'    => 'Pokaż tylko dostępne',
                'required' => false
            ))
            ->add('startingPrice', 'integer',    array(
                'label' => false,
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Cena od',
                    'min' => 1,
                    'max' => 999
                    )               
            ))
            ->add('endingPrice', 'integer', array(
                'label' => false,
                'required' => false,
                'attr' => array(
                    'placeholder' => 'Cena do',
                    'min' => 1,
                    'max' => 999
                    )               
            ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rentanddrivebundle_search';
    }
}