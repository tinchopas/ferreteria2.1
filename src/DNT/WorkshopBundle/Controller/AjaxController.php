<?php

namespace DNT\WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;

use DNT\WorkshopBundle\Entity\Devolucion;
use DNT\WorkshopBundle\Entity\Pedido;

class AjaxController extends Controller
{
    public function generateErrorResponse($error)
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

                return $this->generateErrorResponse('noerrors');
            } else {
                return $this->generateErrorResponse('nostock');
            }
        }
        return $this->generateErrorResponse('sintax');
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

            // Gets the article and provider.
            $apArray = $ar->getArticuloProveedors();
            $artProv = $apArray[0];

            // Set the order.
            $orders = $em->getRepository('DNTWorkshopBundle:Pedido')->findBy(array(
                'eliminado'         => 0,
                'confirmado'        => 0,
                'ArticuloProveedor' => $artProv,
            ));
            if ($orders) {
                $order = $orders[0];
                $order->setCantidad($quantity);
            } else {
                $order = new Pedido();
                $order->setArticuloProveedor($artProv);
                $order->setEliminado(0);
                $order->setConfirmado(0);
                $order->setCantidad($quantity);
            }

            // Persist the data.
            $em->persist($order);
            $em->flush();

            return $this->generateErrorResponse('noerrors');
        }
        return $this->generateErrorResponse('sintax');
    }


    public function orderDeleteAction()
    {
        $idProveedor = $this->getRequest()->request->get('id_proveedor');

        $em = $this->getDoctrine()->getEntityManager();
        $em->getRepository('DNTWorkshopBundle:Pedido')->deleteOrdersByProvider($idProveedor);

        $response = new Response(json_encode(array('id' => $idProveedor)));
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


    public function orderConfirmAction()
    {
        $idProveedor = $this->getRequest()->request->get('id_proveedor');

        $em = $this->getDoctrine()->getEntityManager();
        $em->getRepository('DNTWorkshopBundle:Pedido')->confirmOrdersByProvider($idProveedor);

        $response = new Response(json_encode(array(
            'id'      => $idProveedor,
            'returns' => $em->getRepository('DNTWorkshopBundle:Devolucion')->getReturnsByProvider($idProveedor),
        )));
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }


    public function returnArticleAction()
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
                $returns = $em->getRepository('DNTWorkshopBundle:Devolucion')->findBy(array(
                    'eliminado'         => 0,
                    'devuelto'          => 0,
                    'ArticuloProveedor' => $artProv,
                ));
                if ($returns) {
                    $return = $returns[0];
                    $return->setCantidad($quantity);
                } else {
                    $return = new Devolucion();
                    $return->setArticuloProveedor($artProv);
                    $return->setEliminado(0);
                    $return->setDevuelto(0);
                    $return->setCantidad($quantity);
                }

                // Persist the data.
                $em->persist($return);
                $em->flush();

                return $this->generateErrorResponse('noerrors');
            } else {
                return $this->generateErrorResponse('nostock');
            }
        }
        return $this->generateErrorResponse('sintax');
    }


    public function returnConfirmAction()
    {
        $idProveedor = $this->getRequest()->request->get('id_proveedor');

        $em = $this->getDoctrine()->getEntityManager();
        $em->getRepository('DNTWorkshopBundle:Devolucion')->confirmReturnsByProvider($idProveedor);

        $response = new Response(json_encode(array()));
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
}
