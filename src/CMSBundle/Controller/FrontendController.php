<?php

namespace CMSBundle\Controller;

use CMSBundle\Entity\City;
use CMSBundle\Entity\Audio;
use CMSBundle\Entity\Video;
use CMSBundle\Entity\Image;
use CMSBundle\Entity\Infographic;
use CMSBundle\Entity\Article;
use CMSBundle\Entity\SiteDesc;
use CMSBundle\Entity\SiteMeta;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontendController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $sitedesc = $em->getRepository('CMSBundle:SiteDesc')->findAll();
        return $this->render('frontend/index.html.twig', array(
            'sitedesc' => $sitedesc,
        ));
    }
    public function ajaxAction(){
        $request = $this->container->get('request');
        $data1 = $request->query->get('cityId');
        //handle data
        $em = $this->getDoctrine()->getManager();
        $city = $em->getRepository('CMSBundle:City')->findById($data1);
        //prepare the response, e.g.
        $response = array("code" => 100, "success" => true);
        //you can return result as JSON
        return new Response(json_encode($city,$response,array('Content-Type' => 'application/json')));
    }
}
