<?php

namespace ventesBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use vente_detailsBundle\Form\ventdetType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ventType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('numVente',null,array('label' => false ))
                
                ->add('client',EntityType::class,
                array( 'class'=>'clientBundle:cli',
             'query_builder'=>function(EntityRepository $er){
                            //dans cette fonction on a accés au repository et à l'utilisateur
                                return $er->createQueryBuilder('u')
                                ->orderBy('u.id', 'ASC');
                                },  
                                  
                    'choice_label'  => 'nomClient',
                    'choice_value' => 'nomClient',                
                    'placeholder' => 'Veuillez choisir un Client',     
                    'required'=>true, 
                    'multiple'=>false,
                 
                    'label' => false ,
                    'attr'=>['class'=>'form-control']
                                                                )    )
                ->add('vente_details',CollectionType::class, [
        'entry_type' => ventdetType::class,
        'entry_options' => ['label' => false],
        'by_reference'=>false, //ce formulaire de collection va recevoir plusieurs vente détails
        'allow_add' => true,
        'allow_delete' => true,
        'label' => false,
                                                          
    ])
                ->add('prixVenteTotal',null,array('label' => false ))
                ->add('payement',null,array('label' => false ))
                ->add('balance',null,array('label' => 'Balance:','data'=>'0' ,'attr'=>['readonly'=>true]));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ventesBundle\Entity\vent'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ventesbundle_vent';
    }


}
