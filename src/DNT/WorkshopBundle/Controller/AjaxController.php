<?php

namespace DNT\WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;

class AjaxController extends Controller
{
    public function buyArticleAction()
    {
        $idArticle = $this->getRequest()->request->get('id_article');
        $quantity  = $this->getRequest()->request->get('quantity');

        if (preg_match('/^[0-9]+$/',$quantity)) {

            $em = $this->getDoctrine()->getEntityManager();
            $ar = $em->getRepository('DNTWorkshopBundle:Articulo')->find($idArticle);

            if ($ar->getCantidad() >= $quantity) {

                $session = $this->get('session');
                $shop = $session->get('shop');
                $shop[$idArticle] = $quantity;
                $session->set('shop', $shop); 

                // Generate the response without errors.
                $response = new Response(json_encode(array('error' => 0)));
                $response->setStatusCode(200);
                $response->headers->set('Content-Type', 'application/json');
                return $response;

            // Generate the response with quantity amount error.
            } else {
                $response = new Response(json_encode(array('error' => 2)));
                $response->setStatusCode(200);
                $response->headers->set('Content-Type', 'application/json');
                return $response;
            }
        }

        // Generate the response with quantity sintax error.
        $response = new Response(json_encode(array('error' => 1)));
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


    public function cleanBuyAction()
    {
        $this->get('session')->remove('shop');

        // Generate the response.
        $response = new Response();
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
