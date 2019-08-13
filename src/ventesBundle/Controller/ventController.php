<?php

namespace ventesBundle\Controller;

use ventesBundle\Entity\vent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use vente_detailsBundle\Entity\ventdet;


/**
 * Vent controller.
 *
 * @Route("vent")
 */
class ventController extends Controller
{
    /**
     * Lists all vent entities.
     *
     * @Route("/", name="vent_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $vents = $em->getRepository('ventesBundle:vent')->findAll();

        return $this->render('vent/index.html.twig', array(
            'vents' => $vents,
        ));
    }

    /**
     * Creates a new vent entity.
     *
     * @Route("/new", name="vent_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $vent = new Vent();
        $form = $this->createForm('ventesBundle\Form\ventType', $vent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            foreach($vent->getVenteDetails() as $detail){
                $detail->setVente($vent);
                $article = $form['vente_details']->getData();
                var_dump($article);
            }
            die();
            $vent->setDateAjoutVente(new \DateTime());
            $vent->setAjouteParVente( $this->getUser());
            $vent->setDateMiseAjourVente(new \DateTime());
            $vent->setMisAjourParVente($this->getUser());
            
            $em->persist($vent);
            $em->flush();

            return $this->redirectToRoute('vent_show', array('id' => $vent->getId()));
        }

        return $this->render('vent/new.html.twig', array(
            'vent' => $vent,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a vent entity.
     *
     * @Route("/{id}", name="vent_show")
     * @Method("GET")
     */
    public function showAction(vent $vent)
    {
        $deleteForm = $this->createDeleteForm($vent);

        return $this->render('vent/show.html.twig', array(
            'vent' => $vent,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing vent entity.
     *
     * @Route("/{id}/edit", name="vent_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, vent $vent)
    {
        $deleteForm = $this->createDeleteForm($vent);
        $editForm = $this->createForm('ventesBundle\Form\ventType', $vent);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
             $vent->setDateMiseAjourVente(new \DateTime());
            $vent->setMisAjourParVente($this->getUser());
            
            $em->persist($vent);
            $em->flush();

            return $this->redirectToRoute('vent_show', array('id' => $vent->getId()));
        }

        return $this->render('vent/edit.html.twig', array(
            'vent' => $vent,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a vent entity.
     *
     * @Route("/{id}", name="vent_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, vent $vent)
    {
        $form = $this->createDeleteForm($vent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($vent);
            $em->flush();
        }

        return $this->redirectToRoute('vent_index');
    }

    /**
     * Creates a form to delete a vent entity.
     *
     * @param vent $vent The vent entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(vent $vent)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('vent_delete', array('id' => $vent->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
