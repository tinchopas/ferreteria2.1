<?php

namespace DNT\WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;

use DNT\WorkshopBundle\Entity\Pedido;

class AjaxController extends Controller
{
    public function generateResponse($error)
    {
        $response = new Response(json_encode(array('error' => $error)));
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


    public function buyArticleAction()
    {
        $idArticle = $this->getRequest()->request->get('id_article');
        $quantity  = $this->getRequest()->request->get('quantity');

        if (preg_match('/^[0-9]+$/', $quantity)) {

            $em = $this->getDoctrine()->getEntityManager();
            $ar = $em->getRepository('DNTWorkshopBundle:Articulo')->find($idArticle);

            if ($ar->getCantidad() >= $quantity) {

                $session = $this->get('session');
                $shop = $session->get('shop');
                $shop[$idArticle] = $quantity;
                $session->set('shop', $shop); 

                return $this->generateResponse('noerrors');
            } else {
                return $this->generateResponse('nostock');
            }
        }
        return $this->generateResponse('sintax');
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


    public function orderArticleAction()
    {
        $idArticle = $this->getRequest()->request->get('id_article');
        $quantity  = $this->getRequest()->request->get('quantity');

        if (preg_match('/^[0-9]+$/', $quantity)) {

            $em = $this->getDoctrine()->getEntityManager();
            $ar = $em->getRepository('DNTWorkshopBundle:Articulo')->find($idArticle);

            if ($ar->getCantidad() >= $quantity) {

                // Gets the article and provider.
                $apArray = $ar->getArticuloProveedors();
                $artProv = $apArray[0];

                // Set the order.
                $pedidos = $em->getRepository('DNTWorkshopBundle:Pedido')->findBy(array(
                    'Devuelto'          => 0,
                    'ArticuloProveedor' => $artProv,
                ));
                if ($pedidos) {
                    $pedido = $pedidos[0];
                    $pedido->setCantidad($quantity);
                } else {
                    $pedido = new Pedido();
                    $pedido->setArticuloProveedor($artProv);
                    $pedido->setDevuelto(0);
                    $pedido->setCantidad($quantity);
                }

                // Persist the data.
                $em->persist($pedido);
                $em->flush();

                return $this->generateResponse('noerrors');
            } else {
                return $this->generateResponse('nostock');
            }
        }
        return $this->generateResponse('sintax');
    }
}
