<?php

namespace achat_detailsBundle\Controller;

use achat_detailsBundle\Entity\achadet;
use articleBundle\Entity\art;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Achadet controller.
 *
 * @Route("achadet")
 */
class achadetController extends Controller
{
    /**
     * Lists all achadet entities.
     *
     * @Route("/", name="achadet_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $achadets = $em->getRepository('achat_detailsBundle:achadet')->findAll();

        return $this->render('achadet/index.html.twig', array(
            'achadets' => $achadets,
        ));
    }

    /**
     * Creates a new achadet entity.
     *
     * @Route("/new", name="achadet_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $achadet = new Achadet();

        
        $form = $this->createForm('achat_detailsBundle\Form\achadetType', $achadet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $refArticle = $achadet->getRefArticle();
            //  $nomArticle = $achatdet->getNomArticle(); 
            $quantite= $achadet->getQuantite();//quantité saisi
            
            $articletrouve = $em->getRepository('articleBundle:art')->findByRefArticle($refArticle);
        
            if ($articletrouve!=null){
                
                //quantité existante dans le stock
                $quantiteStock = $articletrouve->getQuantiteArticle();
                //quantité mis à jour = quantité existante dans le stock + quantité saisi
                $quantiteUpdated = $quantiteStock + $quantite;
                $articletrouve -> setQuantiteArticle($quantiteUpdated);
                
            }else{
                $article = new Art();
  
                //recevoir les donnees saisi dans le formulaire
                //et les passer à l'entité $article 
            
                $em->persist($article);
                
                //$nomFournisseur=
                $achadet->setNomFournisseur($nomFournisseur);
                $achadet->setDateAjoutAchatdet(new \DateTime());
                $achadet->setAjouteParAchatdet( $this->getUser() );
                $achadet->setDateMiseAjourAchatdet(new \DateTime());
                $achadet->setMisAjourParAchatdet($this->getUser());
                          
                $em->persist($achadet);
                
                $em->flush();//enregistrer les données persisté dans la BDD

                
        
            }
                

            return $this->redirectToRoute('achadet_show', array('id' => $achadet->getId()));
        }
        
        return $this->render('achadet/new.html.twig', array(
                'achadet' => $achadet,
                'form' => $form->createView(),
        ));
    }
    
    /**
     * Finds and displays a achadet entity.
     *
     * @Route("/{id}", name="achadet_show")
     * @Method("GET")
     */
    public function showAction(achadet $achadet)
    {
        $deleteForm = $this->createDeleteForm($achadet);

        return $this->render('achadet/show.html.twig', array(
            'achadet' => $achadet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing achadet entity.
     *
     * @Route("/{id}/edit", name="achadet_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, achadet $achadet)
    {
        $deleteForm = $this->createDeleteForm($achadet);
        $editForm = $this->createForm('achat_detailsBundle\Form\achadetType', $achadet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $achadet->setDateMiseAjourAchatdet(new \DateTime());
            $achadet->setMisAjourParAchatdet($this->getUser());
            
            $em->persist($achadet);
            $em->flush();

            return $this->redirectToRoute('achadet_show', array('id' => $achadet->getId()));
        }

        return $this->render('achadet/edit.html.twig', array(
            'achadet' => $achadet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a achadet entity.
     *
     * @Route("/{id}", name="achadet_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, achadet $achadet)
    {
        $form = $this->createDeleteForm($achadet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($achadet);
            $em->flush();
        }

        return $this->redirectToRoute('achadet_index');
    }

    /**
     * Creates a form to delete a achadet entity.
     *
     * @param achadet $achadet The achadet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(achadet $achadet)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('achadet_delete', array('id' => $achadet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
