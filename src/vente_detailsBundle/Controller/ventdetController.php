<?php

namespace vente_detailsBundle\Controller;

use vente_detailsBundle\Entity\ventdet;
use articleBundle\Entity\art;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Ventdet controller.
 *
 * @Route("ventdet")
 */
class ventdetController extends Controller
{
    /**
     * Lists all ventdet entities.
     *
     * @Route("/", name="ventdet_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ventdets = $em->getRepository('vente_detailsBundle:ventdet')->findAll();

        return $this->render('ventdet/index.html.twig', array(
            'ventdets' => $ventdets,
        ));
    }

    /**
     * Creates a new ventdet entity.
     *
     * @Route("/new", name="ventdet_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ventdet = new Ventdet();
        $form = $this->createForm('vente_detailsBundle\Form\ventdetType', $ventdet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $qte = $ventdet->getQuantite();//sauvegarder la quantite saisi dans le formulaire
            $refArticleAvendre = $ventdet->getRefArticle();//sauvegarder la reference saisi dans le formulaire
            //findBy+nom champ entité : select * in  art while refArticle = $refArticle
            $articleTrouve = $em->getRepository('articleBundle:art')->findByRefArticle($refArticleAvendre);
            
            //si on a trouvé l'article        
            if ($articleTrouve!=null){
                $qteDansLeStock = $articleTrouve[0]->getQuantiteArticle();
                //si la quantité demandé existe
                if ($qteDansLeStock>=$qte){
                    $ventdet->setDateAjoutVentedet(new \DateTime());
                    $ventdet->setAjouteParVentedet( $this->getUser() );
                    $ventdet->setDateMiseAjourVentedet(new \DateTime());
                    $ventdet->setMisAjourParVentedet($this->getUser());
            
                    $em->persist($ventdet);
                    $em->flush();
                    
                    return $this->redirectToRoute('ventdet_show', array('id' => $ventdet->getId()));
                }
                //message d'erreur: quantité inexistante
                return $this->render('ventdet/new.html.twig', array(
                'messageDerreur' => "quantite inexistante",
                'form' => $form->createView(),
                'erreur'=>True
                ));
            }
            //message d'erreur: article pas trouvé
            return $this->render('ventdet/new.html.twig', array(
                'messageDerreur' => "article pas trouvé",
                'form' => $form->createView(),
                'erreur'=>True
            ));
        }

        return $this->render('ventdet/new.html.twig', array(
            'ventdet' => $ventdet,
            'form' => $form->createView(),
            'erreur'=>False
        ));
    }

    /**
     * Finds and displays a ventdet entity.
     *
     * @Route("/{id}", name="ventdet_show")
     * @Method("GET")
     */
    public function showAction(ventdet $ventdet)
    {
        $deleteForm = $this->createDeleteForm($ventdet);

        return $this->render('ventdet/show.html.twig', array(
            'ventdet' => $ventdet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ventdet entity.
     *
     * @Route("/{id}/edit", name="ventdet_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ventdet $ventdet)
    {
        $deleteForm = $this->createDeleteForm($ventdet);
        $editForm = $this->createForm('vente_detailsBundle\Form\ventdetType', $ventdet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $ventdet->setDateMiseAjourVentedet(new \DateTime());
            $ventdet->setMisAjourParVentedet($this->getUser());
            
            $em->persist($ventdet);
            $em->flush();


            return $this->redirectToRoute('ventdet_show', array('id' => $ventdet->getId()));
        }

        return $this->render('ventdet/edit.html.twig', array(
            'ventdet' => $ventdet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ventdet entity.
     *
     * @Route("/{id}", name="ventdet_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ventdet $ventdet)
    {
        $form = $this->createDeleteForm($ventdet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ventdet);
            $em->flush();
        }

        return $this->redirectToRoute('ventdet_index');
    }

    /**
     * Creates a form to delete a ventdet entity.
     *
     * @param ventdet $ventdet The ventdet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ventdet $ventdet)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ventdet_delete', array('id' => $ventdet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
