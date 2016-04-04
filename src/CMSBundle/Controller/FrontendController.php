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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class FrontendController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $sitedesc = $em->getRepository('CMSBundle:SiteDesc')->findAll();
        $sitemeta = $em->getRepository('CMSBundle:SiteMeta')->findAll();
        return $this->render('frontend/index.html.twig', array(
            'sitedesc' => $sitedesc,
            'sitemeta' => $sitemeta,

        ));
    }
    public function contentLoaderAction()
    {

        $em = $this->getDoctrine()->getManager();
        $request = Request::createFromGlobals();
        $cityId = $request->get('id');
        $city = $em->getRepository('CMSBundle:City')->find($cityId);
        $infographic = $em->getRepository('CMSBundle:Infographic')->findByCityId($cityId);
        $Audio = $em->getRepository('CMSBundle:Audio')->findByCityId($cityId);
        $Video = $em->getRepository('CMSBundle:Video')->findByCityId($cityId);
        $Images = $em->getRepository('CMSBundle:Image')->findByCityId($cityId);
        $Articles = $em->getRepository('CMSBundle:Article')->findByCityId($cityId);

        return $this->render('frontend/ajax.html.twig', array(
            'city' => $city,
            'infographics' => $infographic,
            'audio' => $Audio,
            'video' => $Video,
            'images' => $Images,
            'articles' => $Articles,

        ));
    }
    public function ajaxAction(){

        $template = $this->forward('CMSBundle:Frontend:contentLoader')->getContent();
        $json = json_encode($template);
        $response = new Response($json, 200);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
