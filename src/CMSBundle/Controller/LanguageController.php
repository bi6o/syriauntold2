<?php

namespace CMSBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CMSBundle\Entity\Language;
use CMSBundle\Form\LanguageType;

/**
 * Language controller.
 *
 */
class LanguageController extends Controller
{
    /**
     * Lists all Language entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $languages = $em->getRepository('CMSBundle:Language')->findAll();

        return $this->render('language/index.html.twig', array(
            'languages' => $languages,
        ));
    }

    /**
     * Creates a new Language entity.
     *
     */
    public function newAction(Request $request)
    {
        $language = new Language();
        $form = $this->createForm('CMSBundle\Form\LanguageType', $language);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($language);
            $em->flush();

            return $this->redirectToRoute('admin_lanuage_show', array('id' => $language->getId()));
        }

        return $this->render('language/new.html.twig', array(
            'language' => $language,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Language entity.
     *
     */
    public function showAction(Language $language)
    {
        $deleteForm = $this->createDeleteForm($language);

        return $this->render('language/show.html.twig', array(
            'language' => $language,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Language entity.
     *
     */
    public function editAction(Request $request, Language $language)
    {
        $deleteForm = $this->createDeleteForm($language);
        $editForm = $this->createForm('CMSBundle\Form\LanguageType', $language);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($language);
            $em->flush();

            return $this->redirectToRoute('admin_lanuage_edit', array('id' => $language->getId()));
        }

        return $this->render('language/edit.html.twig', array(
            'language' => $language,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Language entity.
     *
     */
    public function deleteAction(Request $request, Language $language)
    {
        $form = $this->createDeleteForm($language);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($language);
            $em->flush();
        }

        return $this->redirectToRoute('admin_lanuage_index');
    }

    /**
     * Creates a form to delete a Language entity.
     *
     * @param Language $language The Language entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Language $language)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_lanuage_delete', array('id' => $language->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
