<?php

namespace clientBundle\Controller;

use clientBundle\Entity\cli;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cli controller.
 *
 * @Route("cli")
 */
class cliController extends Controller
{
    /**
     * Lists all cli entities.
     *
     * @Route("/", name="cli_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clis = $em->getRepository('clientBundle:cli')->findAll();

        return $this->render('cli/index.html.twig', array(
            'clis' => $clis,
        ));
    }

    /**
     * Creates a new cli entity.
     *
     * @Route("/new", name="cli_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cli = new Cli();
        $form = $this->createForm('clientBundle\Form\cliType', $cli);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $cli->setDateAjoutClient(new \DateTime());
            $cli->setAjouteParClient( $this->getUser() );
            $cli->setDateMiseAjourClient(new \DateTime());
            $cli->setMisAjourParClient($this->getUser());
            
            $em->persist($cli);
            $em->flush();

            return $this->redirectToRoute('cli_show', array('id' => $cli->getId()));
        }

        return $this->render('cli/new.html.twig', array(
            'cli' => $cli,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cli entity.
     *
     * @Route("/{id}", name="cli_show")
     * @Method("GET")
     */
    public function showAction(cli $cli)
    {
        $deleteForm = $this->createDeleteForm($cli);

        return $this->render('cli/show.html.twig', array(
            'cli' => $cli,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cli entity.
     *
     * @Route("/{id}/edit", name="cli_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, cli $cli)
    {
        $deleteForm = $this->createDeleteForm($cli);
        $editForm = $this->createForm('clientBundle\Form\cliType', $cli);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $cli->setDateMiseAjourClient(new \DateTime());
            $cli->setMisAjourParClient($this->getUser());

            $em->persist($cli);
            $em->flush();
            
            return $this->redirectToRoute('cli_show', array('id' => $cli->getId()));
        }

        return $this->render('cli/edit.html.twig', array(
            'cli' => $cli,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cli entity.
     *
     * @Route("/{id}", name="cli_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, cli $cli)
    {
        $form = $this->createDeleteForm($cli);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cli);
            $em->flush();
        }

        return $this->redirectToRoute('cli_index');
    }

    /**
     * Creates a form to delete a cli entity.
     *
     * @param cli $cli The cli entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(cli $cli)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cli_delete', array('id' => $cli->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
