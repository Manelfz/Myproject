<?php

namespace vente_detailsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ventdetType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('refArticle',EntityType::class,
                array( 'class'=>'articleBundle:art',
             'query_builder'=>function(EntityRepository $er){
                            //dans cette fonction on a accés au repository et à l'utilisateur
                                return $er->createQueryBuilder('u')
                                ->orderBy('u.id', 'ASC');
                                },  
                                  
                    'choice_label'  => 'nomArticle',
                    'choice_value' => 'prixVenteHtArticle',                
                    'placeholder' => 'Veuillez choisir un Article',     
                    'required'=>true, 
                    'multiple'=>false,
                 
                    'label' => false ,
                    'attr'=>['class'=>'form-control']
                                                                )    )
                ->add('prixVenteUnitaire',null,array('label' => false,
                    'attr'=>['class'=>'form-control','placeholder' => 'Prix de vente unitaire']))
                ->add('quantite',null,array('label' => false,
                    'attr'=>['class'=>'form-control','placeholder' => 'Quantité']));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'vente_detailsBundle\Entity\ventdet'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'vente_detailsbundle_ventdet';
    }


}
