<?php

namespace achatsBundle\Controller;

use achatsBundle\Entity\ach;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ach controller.
 *
 * @Route("ach")
 */
class achController extends Controller
{
    /**
     * Lists all ach entities.
     *
     * @Route("/", name="ach_index")
     * @Method("GET")
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
                
         $ach = $em->getRepository('achatsBundle:ach')->findAll();   

        return $this->render('ach/index.html.twig', array(
            'aches' => $ach,
        ));
    }

    /**
     * Creates a new ach entity.
     *
     * @Route("/new", name="ach_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ach = new Ach();
        $form = $this->createForm('achatsBundle\Form\achType', $ach);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            
            
            $ach->setDateAjoutAchat(new \DateTime());
            $ach->setAjouteParAchat( $this->getUser() );
            $ach->setDateMiseAjourAchat(new \DateTime());
            $ach->setMisAjourParAchat($this->getUser());
    
                
                
            $em->persist($ach);
            $em->flush();

            return $this->redirectToRoute('ach_show', array('id' => $ach->getId()));
        }

        return $this->render('ach/new.html.twig', array(
            'ach' => $ach,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ach entity.
     *
     * @Route("/{id}", name="ach_show")
     * @Method("GET")
     */
    public function showAction(ach $ach)
    {
        $deleteForm = $this->createDeleteForm($ach);

        return $this->render('ach/show.html.twig', array(
            'ach' => $ach,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ach entity.
     *
     * @Route("/{id}/edit", name="ach_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ach $ach)
    {
        $deleteForm = $this->createDeleteForm($ach);
        $editForm = $this->createForm('achatsBundle\Form\achType', $ach);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();

            
            $ach->setDateMiseAjourAchat(new \DateTime());
            $ach->setMisAjourParAchat($this->getUser());
            
            $em->persist($ach);
            $em->flush();
            
            return $this->redirectToRoute('ach_show', array('id' => $ach->getId()));
        }

        return $this->render('ach/edit.html.twig', array(
            'ach' => $ach,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ach entity.
     *
     * @Route("/{id}/delete", name="ach_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ach $ach)
    {
        $form = $this->createDeleteForm($ach);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ach);
            $em->flush();
        }

        return $this->redirectToRoute('ach_index');
    }

    /**
     * Creates a form to delete a ach entity.
     *
     * @param ach $ach The ach entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ach $ach)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ach_delete', array('id' => $ach->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
