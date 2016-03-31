<?php

namespace CMSBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CMSBundle\Entity\Video;
use CMSBundle\Entity\City;
use CMSBundle\Form\VideoType;

/**
 * Video controller.
 *
 */
class VideoController extends Controller
{
    /**
     * Lists all Video entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $videos = $em->getRepository('CMSBundle:Video')->findAll();

        return $this->render('video/index.html.twig', array(
            'videos' => $videos,
        ));
    }
    public function contentAction(City $city)
    {
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder()
            ->select('video')
            ->from('CMSBundle:Video' , 'video')
            ->where('video.cityId = :id')
            ->setParameter('id', $city->getId())
            ->getQuery();
        $qb->getResult();

        $videos = $qb->getResult();

        return $this->render('video/city.html.twig', array(
            'videos' => $videos,
            'city' => $city
        ));
    }
    /**
     * Creates a new Video entity.
     *
     */
    public function newAction(Request $request)
    {
        $video = new Video();
        $form = $this->createForm('CMSBundle\Form\VideoType', $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($video);
            $em->flush();

            return $this->redirectToRoute('admin_video_show', array('id' => $video->getId()));
        }

        return $this->render('video/new.html.twig', array(
            'video' => $video,
            'form' => $form->createView(),
        ));
    }

    public function newcityAction(Request $request , City $city)
    {
        $video = new Video();
        $video->setCityId($city->getId());
        $form = $this->createForm('CMSBundle\Form\VideoType', $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($video);
            $em->flush();

            return $this->redirectToRoute('admin_video_show', array('id' => $video->getId()));
        }

        return $this->render('video/new.html.twig', array(
            'video' => $video,
            'form' => $form->createView(),
        ));
    }
    /**
     * Finds and displays a Video entity.
     *
     */
    public function showAction(Video $video)
    {
        $deleteForm = $this->createDeleteForm($video);

        return $this->render('video/show.html.twig', array(
            'video' => $video,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Video entity.
     *
     */
    public function editAction(Request $request, Video $video)
    {
        $deleteForm = $this->createDeleteForm($video);
        $editForm = $this->createForm('CMSBundle\Form\VideoType', $video);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($video);
            $em->flush();

            return $this->redirectToRoute('admin_video_edit', array('id' => $video->getId()));
        }

        return $this->render('video/edit.html.twig', array(
            'video' => $video,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Video entity.
     *
     */
    public function deleteAction(Request $request, Video $video)
    {
        $form = $this->createDeleteForm($video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($video);
            $em->flush();
        }

        return $this->redirectToRoute('admin_video_index');
    }

    /**
     * Creates a form to delete a Video entity.
     *
     * @param Video $video The Video entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Video $video)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_video_delete', array('id' => $video->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
