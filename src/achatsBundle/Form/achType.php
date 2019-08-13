<?php

namespace achatsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

use achat_detailsBundle\Form\achadetType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class achType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('fournisseur', EntityType::class, array(
                         'class'=>'fournisseurBundle:Four',
                         'query_builder'=>function(EntityRepository $er){
        //dans cette fonction on a accés au repository et à l'utilisateur
         return $er->createQueryBuilder('u')
           // ->select('u.nomFournisseur')
            ->orderBy('u.id', 'ASC')
                 ;
         },
             'choice_label'  => "nomFournisseur",
               'placeholder' => 'Veuillez choisir le Fournisseur',          
                  'required'=>true, )
                 )
                 
                 ->add('achat_details',CollectionType::class, [
        'entry_type' => achadetType::class,
        'entry_options' => ['label' => false],
        'by_reference'=>false, //ce formulaire de collection va recevoir plusieurs achats détails
        'allow_add' => true,
        'allow_delete' => true,
        'label' => false,
                                                          
    ])
                 
                ->add('prixTotalDachats',null,array('label' => false ))
                ->add('payement',null,array('label' => false ))
                ->add('balance',null,array('label' => false ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'achatsBundle\Entity\ach'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'achatsbundle_ach';
    }


}
