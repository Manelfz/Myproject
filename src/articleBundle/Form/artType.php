<?php

namespace articleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

//use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class artType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //enregistrer les paramètres passés ds le controleur par la fonction "createForm"
        $listeFournisseurs = $options['fournisseurs'];
        $fournisseurAncien = $options['fournisseur_ancien'];
        
        $builder->add('refArticle',null,array('label' => false ))

                ->add('nomArticle',null,array('label'=> false))
                
                ->add('nomFournisseur',ChoiceType::class, array(
             'choice_label' => 'nomFournisseur', //afficher le nom du fournisseur qui correspond au fournisseur
            'placeholder' => $fournisseurAncien,
             'choices'  => $listeFournisseurs, //les choix sont extrait de la table des fournisseurs
                 'expanded'=>false, //liste déroulante fermé par défaut
                  'required'=>true, //obligatoirement on doit choisir un fournisseur
                'label'=>false
                 ))                
                ->add('prixAchatHtArticle',null,array('label' => false ))
                ->add('quantiteArticle',null,array('label' => false ))
                ->add('prixVenteHtArticle',null,array('label' => false ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'articleBundle\Entity\art'
        ))
                ->setRequired(['fournisseurs','fournisseur_ancien']);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'articlebundle_art';
    }


}
