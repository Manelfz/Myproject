<?php

namespace fournisseurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FourType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomFournisseur',null,array('label' => false ))
                ->add('nomPersonne',null,array('label' => false ))
                ->add('email',null,array('label' => false ))
                ->add('tel',null,array('label' => false ))
                ->add('adresse',null,array('label' => false ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'fournisseurBundle\Entity\Four'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'fournisseurbundle_four';
    }


}
