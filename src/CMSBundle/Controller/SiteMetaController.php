<?php

namespace CMSBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CMSBundle\Entity\SiteMeta;
use CMSBundle\Form\SiteMetaType;

/**
 * SiteMeta controller.
 *
 */
class SiteMetaController extends Controller
{
    /**
     * Lists all SiteMeta entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $siteMetas = $em->getRepository('CMSBundle:SiteMeta')->findAll();

        return $this->render('sitemeta/index.html.twig', array(
            'siteMetas' => $siteMetas,
        ));
    }

    /**
     * Creates a new SiteMeta entity.
     *
     */
    public function newAction(Request $request)
    {
        $siteMetum = new SiteMeta();
        $form = $this->createForm('CMSBundle\Form\SiteMetaType', $siteMetum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($siteMetum);
            $em->flush();

            return $this->redirectToRoute('admin_sitemeta_show', array('id' => $siteMetum->getId()));
        }

        return $this->render('sitemeta/new.html.twig', array(
            'siteMetum' => $siteMetum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a SiteMeta entity.
     *
     */
    public function showAction(SiteMeta $siteMetum)
    {
        $deleteForm = $this->createDeleteForm($siteMetum);

        return $this->render('sitemeta/show.html.twig', array(
            'siteMetum' => $siteMetum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SiteMeta entity.
     *
     */
    public function editAction(Request $request, SiteMeta $siteMetum)
    {
        $deleteForm = $this->createDeleteForm($siteMetum);
        $editForm = $this->createForm('CMSBundle\Form\SiteMetaType', $siteMetum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($siteMetum);
            $em->flush();

            return $this->redirectToRoute('admin_sitemeta_edit', array('id' => $siteMetum->getId()));
        }

        return $this->render('sitemeta/edit.html.twig', array(
            'siteMetum' => $siteMetum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SiteMeta entity.
     *
     */
    public function deleteAction(Request $request, SiteMeta $siteMetum)
    {
        $form = $this->createDeleteForm($siteMetum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($siteMetum);
            $em->flush();
        }

        return $this->redirectToRoute('admin_sitemeta_index');
    }

    /**
     * Creates a form to delete a SiteMeta entity.
     *
     * @param SiteMeta $siteMetum The SiteMeta entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SiteMeta $siteMetum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_sitemeta_delete', array('id' => $siteMetum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
