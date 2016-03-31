<?php

namespace CMSBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CMSBundle\Entity\SiteDesc;
use CMSBundle\Form\SiteDescType;

/**
 * SiteDesc controller.
 *
 */
class SiteDescController extends Controller
{
    /**
     * Lists all SiteDesc entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $siteDescs = $em->getRepository('CMSBundle:SiteDesc')->findAll();

        return $this->render('sitedesc/index.html.twig', array(
            'siteDescs' => $siteDescs,
        ));
    }

    /**
     * Creates a new SiteDesc entity.
     *
     */
    public function newAction(Request $request)
    {
        $siteDesc = new SiteDesc();
        $form = $this->createForm('CMSBundle\Form\SiteDescType', $siteDesc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($siteDesc);
            $em->flush();

            return $this->redirectToRoute('admin_sitedesc_show', array('id' => $siteDesc->getId()));
        }

        return $this->render('sitedesc/new.html.twig', array(
            'siteDesc' => $siteDesc,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SiteDesc entity.
     *
     */
    public function showAction(SiteDesc $siteDesc)
    {
        $deleteForm = $this->createDeleteForm($siteDesc);

        return $this->render('sitedesc/show.html.twig', array(
            'siteDesc' => $siteDesc,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SiteDesc entity.
     *
     */
    public function editAction(Request $request, SiteDesc $siteDesc)
    {
        $deleteForm = $this->createDeleteForm($siteDesc);
        $editForm = $this->createForm('CMSBundle\Form\SiteDescType', $siteDesc);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($siteDesc);
            $em->flush();

            return $this->redirectToRoute('admin_sitedesc_edit', array('id' => $siteDesc->getId()));
        }

        return $this->render('sitedesc/edit.html.twig', array(
            'siteDesc' => $siteDesc,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SiteDesc entity.
     *
     */
    public function deleteAction(Request $request, SiteDesc $siteDesc)
    {
        $form = $this->createDeleteForm($siteDesc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($siteDesc);
            $em->flush();
        }

        return $this->redirectToRoute('admin_sitedesc_index');
    }

    /**
     * Creates a form to delete a SiteDesc entity.
     *
     * @param SiteDesc $siteDesc The SiteDesc entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SiteDesc $siteDesc)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_sitedesc_delete', array('id' => $siteDesc->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
