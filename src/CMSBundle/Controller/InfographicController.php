<?php

namespace CMSBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use CMSBundle\Entity\Infographic;
use CMSBundle\Entity\City;
use CMSBundle\Form\InfographicType;

/**
 * Infographic controller.
 *
 */
class InfographicController extends Controller
{
    /**
     * Lists all SiteDesc entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $infographics = $em->getRepository('CMSBundle:Infographic')->findAll();

        return $this->render('infographic/index.html.twig', array(
            'infographics' => $infographics,
        ));
    }

    public function contentAction(City $city)
    {
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder()
            ->select('info')
            ->from('CMSBundle:Infographic' , 'info')
            ->where('info.cityId = :id')
            ->setParameter('id', $city->getId())
            ->getQuery();
        $qb->getResult();

        $infographics = $qb->getResult();

        return $this->render('infographic/city.html.twig', array(
            'infographics' => $infographics,
            'city' => $city
        ));
    }

    /**
     * Creates a new SiteDesc entity.
     *
     */
    public function newAction(Request $request)
    {
        $infographic = new Infographic();
        $form = $this->createForm('CMSBundle\Form\InfographicType', $infographic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($infographic);
            $em->flush();

            return $this->redirectToRoute('admin_infographic_show', array('id' => $infographic->getId()));
        }

        return $this->render('infographic/new.html.twig', array(
            'infographic' => $infographic,
            'form' => $form->createView(),
        ));
    }
    public function newcityAction(Request $request, City $city)
    {
        $infographic = new Infographic();
        $infographic->setCityId($city->getId());
        $form = $this->createForm('CMSBundle\Form\InfographicType', $infographic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($infographic);
            $em->flush();

            return $this->redirectToRoute('admin_infographic_show', array('id' => $infographic->getId()));
        }

        return $this->render('infographic/new.html.twig', array(
            'infographic' => $infographic,
            'form' => $form->createView(),
        ));
    }
    /**
     * Finds and displays a SiteDesc entity.
     *
     */
    public function showAction(Infographic $infographic)
    {
        $deleteForm = $this->createDeleteForm($infographic);

        return $this->render('infographic/show.html.twig', array(
            'infographic' => $infographic,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing SiteDesc entity.
     *
     */
    public function editAction(Request $request, Infographic $infographic)
    {
        $deleteForm = $this->createDeleteForm($infographic);
        $editForm = $this->createForm('CMSBundle\Form\InfographicType', $infographic);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($infographic);
            $em->flush();

            return $this->redirectToRoute('admin_infographic_edit', array('id' => $infographic->getId()));
        }

        return $this->render('infographic/edit.html.twig', array(
            'infographics' => $infographic,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a SiteDesc entity.
     *
     */
    public function deleteAction(Request $request, Infographic $infographic)
    {
        $form = $this->createDeleteForm($infographic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($infographic);
            $em->flush();
        }

        return $this->redirectToRoute('admin_infographic_index');
    }

    /**
     * Creates a form to delete a SiteDesc entity.
     *
     * @param SiteDesc $siteDesc The SiteDesc entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(infographic $infographic)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_infographic_delete', array('id' => $infographic->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
