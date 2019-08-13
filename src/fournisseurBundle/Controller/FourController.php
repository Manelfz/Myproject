<?php

namespace fournisseurBundle\Controller;

use fournisseurBundle\Entity\Four;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Four controller.
 *
 * @Route("four")
 */
class FourController extends Controller
{
    /**
     * Lists all four entities.
     *
     * @Route("/", name="four_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $fours = $em->getRepository('fournisseurBundle:Four')->findAll();

        return $this->render('four/index.html.twig', array(
            'fours' => $fours,
        ));
    }

    /**
     * Creates a new four entity.
     *
     * @Route("/new", name="four_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $four = new Four();
        $form = $this->createForm('fournisseurBundle\Form\FourType', $four);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $four->setDateAjout(new \DateTime());
            $four->setAjoutePar( $this->getUser() );
            $four->setDateMiseAjour(new \DateTime());
            $four->setMisAjourPar($this->getUser());
            
            $em->persist($four);
            $em->flush();

            return $this->redirectToRoute('four_show', array('id' => $four->getId()));
        }

        return $this->render('four/new.html.twig', array(
            'four' => $four,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a four entity.
     *
     * @Route("/{id}", name="four_show")
     * @Method("GET")
     */
    public function showAction(Four $four)
    {
        $deleteForm = $this->createDeleteForm($four);

        return $this->render('four/show.html.twig', array(
            'four' => $four,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing four entity.
     *
     * @Route("/{id}/edit", name="four_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Four $four)
    {
        $deleteForm = $this->createDeleteForm($four);
        $editForm = $this->createForm('fournisseurBundle\Form\FourType', $four);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            
            $em = $this->getDoctrine()->getManager();

            $four->setDateMiseAjour(new \DateTime());
            $four->setMisAjourPar($this->getUser());
            
            $em->persist($four);
            $em->flush();

            return $this->redirectToRoute('four_show', array('id' => $four->getId()));
        }

        return $this->render('four/edit.html.twig', array(
            'four' => $four,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a four entity.
     *
     * @Route("/{id}/delete", name="four_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Four $four)
    {
        $form = $this->createDeleteForm($four);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($four);
            $em->flush();
        }

        return $this->redirectToRoute('four_index');
    }

    /**
     * Creates a form to delete a four entity.
     *
     * @param Four $four The four entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Four $four)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('four_delete', array('id' => $four->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
