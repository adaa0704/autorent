<?php

namespace RentAndDriveBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startingTime', 'date', array(
                'years' => range(date('Y'), date('Y', strtotime('+3 years'))),
                'required' => TRUE,
                'format' => 'dd MMMM yyyy',
            ))
            ->add('endingTime', 'date', array(
                'years' => range(date('Y'), date('Y', strtotime('+3 years'))),
                'required' => TRUE,
                'format' => 'dd MMMM yyyy',
            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'RentAndDriveBundle\Entity\Rent'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rentanddrivebundle_rent';
    }
}
