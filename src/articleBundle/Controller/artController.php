<?php

namespace articleBundle\Controller;

use articleBundle\Entity\art;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Art controller.
 *
 * @Route("art")
 */
class artController extends Controller
{
    /**
     * Lists all art entities.
     *
     * @Route("/", name="art_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $arts = $em->getRepository('articleBundle:art')->findAll();

        return $this->render('art/index.html.twig', array(
            'arts' => $arts,
        ));
    }

    /**
     * Creates a new art entity.
     *
     * @Route("/new", name="art_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        //on crée une instance de la classe Art (qui est la nouvelle entité à remplir)
        $art = new Art();
        //appeler le gestionnaire du module "Doctrine" (bibliothèque qui comporte les outils de communication 
        //avec la BDD, tel que ORM, l'objet qui lie la BDD avec les entités représentés sous forme de classes 
        //qui possèdent des attributs qui sont les champs de la BDD,  et les getters qui fait extraire les valeurs 
        //des champs ds la BDD "stock" et les mettre dans les attributs qui sont retournés par un return pour 
        //être utilisés dans notre contrôleur, et les setters qui affecte des valeurs ds les attributs et les enregistre 
        // dans la BDD ...)
        $em = $this->getDoctrine()->getManager();
        
        //extraire toute la liste des fournisseurs pour la faire passer en paramètre vers le builder du form.
        $fournisseurs = $em ->getRepository('fournisseurBundle:Four') ->findAll();

        $form = $this->createForm('articleBundle\Form\artType', $art,['fournisseurs'=>$fournisseurs,
                                                                        'fournisseur_ancien'=>null]);
        //si on a saisi des données dans le formulaire on les fait passer par la requête "$request"
        //et l'affecter au formulaire construit "form" pour être manipulés
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            //le champ "nomFournisseur" doit avoir une valeur de type string donc 
            //on doit extraire le nom du fournisseur de l'objet fournisseur choisi :
            //
            //saisie de l'entité du fournisseur de la liste déroulante du formulaire 
            //récupérer les valeurs d'un formulaire
            $fournisseurForm = $form['nomFournisseur']->getData();
            //extraire le nom de fournisseur du fournisseur choisi  
            $fournisseur = $fournisseurForm->getNomFournisseur();//$fournisseur contient la valeur de l'attribut
            //                                                   //$nomFournisseur qui correspond au champ nom_fournisseur
            //affecter le nom du fournisseur extrait à l'article à modifier 
            $art->setNomFournisseur($fournisseur);
                    
            $art->setDateAjoutArticle(new \DateTime());
            $art->setAjouteParArticle( $this->getUser() );
            $art->setDateMiseAjourArticle(new \DateTime());
            $art->setMisAjourParArticle($this->getUser());
            
            //dit à Doctrine de « persister » l'entité, c a d à partir de maintenant cette entité est gérée par Doctrine
            //2.Garde cette entité en mémoire
            $em->persist($art);
            
            //dit à Doctrine d'exécuter effectivement les requêtes nécessaires pour sauvegarder les entités 
            //qu'on lui a dit de persister
            //2.Ouvre une transaction et enregistre toutes les entités qui t'ont été données depuis le dernier flush
            $em->flush();

            return $this->redirectToRoute('art_show', array('id' => $art->getId()));
        }

        //Pour retourner une réponse HTTP 
        return $this->render('art/new.html.twig', array(
            'art' => $art,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a art entity.
     *
     * @Route("/{id}", name="art_show")
     * @Method("GET")
     */
    public function showAction(art $art)
    {
        $deleteForm = $this->createDeleteForm($art);

        return $this->render('art/show.html.twig', array(
            'art' => $art,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing art entity.
     *
     * @Route("/{id}/edit", name="art_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, art $art)
    {
        $em = $this->getDoctrine()->getManager();
                
        $fournisseurs = $em ->getRepository('fournisseurBundle:Four') ->findAll();
        $fournisseurAncien = $art->getNomFournisseur();

        $deleteForm = $this->createDeleteForm($art);
        $editForm = $this->createForm('articleBundle\Form\artType', $art,['fournisseurs'=>$fournisseurs,
                                                                          'fournisseur_ancien'=>$fournisseurAncien]);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            
            $fournisseurForm = $editForm['nomFournisseur']->getData();
            //si on n'a pas modifié le fournisseur (getData -> null) donc on doit faire passer l'ancien 
            if ($fournisseurForm == null){
                $fournisseur = $fournisseurAncien;
            }else{
            $fournisseur = $fournisseurForm->getNomFournisseur();
            }
            $art->setNomFournisseur($fournisseur);
            
            $art->setDateMiseAjourArticle(new \DateTime());
            $art->setMisAjourParArticle($this->getUser());
            
            $em->persist($art);
            $em->flush();
            
            return $this->redirectToRoute('art_show', array('id' => $art->getId()));
        }

        return $this->render('art/edit.html.twig', array(
            'art' => $art,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a art entity.
     *
     * @Route("/{id}/delete", name="art_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, art $art)
    {
        $form = $this->createDeleteForm($art);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($art);
            $em->flush();
        }

        return $this->redirectToRoute('art_index');
    }

    /**
     * Creates a form to delete a art entity.
     *
     * @param art $art The art entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(art $art)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('art_delete', array('id' => $art->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
