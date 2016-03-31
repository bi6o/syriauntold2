<?php

namespace CMSBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CMSBundle\Entity\Audio;
use CMSBundle\Entity\City;
use CMSBundle\Form\AudioType;

/**
 * Audio controller.
 *
 */
class AudioController extends Controller
{
    /**
     * Lists all Audio entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $audios = $em->getRepository('CMSBundle:Audio')->findAll();

        return $this->render('audio/index.html.twig', array(
            'audios' => $audios,
        ));
    }
    public function contentAction(City $city)
    {
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder()
            ->select('audio')
            ->from('CMSBundle:Audio' , 'audio')
            ->where('audio.cityId = :id')
            ->setParameter('id', $city->getId())
            ->getQuery();
        $qb->getResult();
        $audios = $qb->getResult();
        return $this->render('audio/city.html.twig', array(
            'audios' => $audios,
            'city' => $city
        ));
    }
    /**
     * Creates a new Audio entity.
     *
     */
    public function newAction(Request $request)
    {
        $audio = new Audio();
        $form = $this->createForm('CMSBundle\Form\AudioType', $audio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($audio);
            $em->flush();

            return $this->redirectToRoute('admin_audio_show', array('id' => $audio->getId()));
        }

        return $this->render('audio/new.html.twig', array(
            'audio' => $audio,
            'form' => $form->createView(),
        ));
    }
    public function newcityAction(Request $request, City $city)
    {
        $audio = new Audio();
        $audio->setCityId($city->getId());
        $form = $this->createForm('CMSBundle\Form\AudioType', $audio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($audio);
            $em->flush();

            return $this->redirectToRoute('admin_audio_show', array('id' => $audio->getId()));
        }

        return $this->render('audio/new.html.twig', array(
            'audio' => $audio,
            'form' => $form->createView(),
        ));
    }
    /**
     * Finds and displays a Audio entity.
     *
     */
    public function showAction(Audio $audio)
    {
        $deleteForm = $this->createDeleteForm($audio);

        return $this->render('audio/show.html.twig', array(
            'audio' => $audio,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Audio entity.
     *
     */
    public function editAction(Request $request, Audio $audio)
    {
        $deleteForm = $this->createDeleteForm($audio);
        $editForm = $this->createForm('CMSBundle\Form\AudioType', $audio);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($audio);
            $em->flush();

            return $this->redirectToRoute('admin_audio_edit', array('id' => $audio->getId()));
        }

        return $this->render('audio/edit.html.twig', array(
            'audio' => $audio,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Audio entity.
     *
     */
    public function deleteAction(Request $request, Audio $audio)
    {
        $form = $this->createDeleteForm($audio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($audio);
            $em->flush();
        }

        return $this->redirectToRoute('admin_audio_index');
    }

    /**
     * Creates a form to delete a Audio entity.
     *
     * @param Audio $audio The Audio entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Audio $audio)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_audio_delete', array('id' => $audio->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
