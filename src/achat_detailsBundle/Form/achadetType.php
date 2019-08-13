<?php

namespace achat_detailsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class achadetType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('nomArticle',null,array('label' => false ))
                ->add('refArticle',null,array('label' => false ))
                ->add('prixAchatHt',null,array('label' => false ))
                ->add('prixVenteHt',null,array('label' => false ))
                ->add('quantite',null,array('label' => false ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'achat_detailsBundle\Entity\achadet'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'achat_detailsbundle_achadet';
    }


}
