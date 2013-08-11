<?php

namespace DNT\WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

use DNT\WorkshopBundle\Entity\Articulo;
use DNT\WorkshopBundle\Entity\ArticuloProveedor;
use DNT\WorkshopBundle\Entity\Factura;
use DNT\WorkshopBundle\Entity\Renglon;
use DNT\WorkshopBundle\Entity\Pedido;
use DNT\WorkshopBundle\Entity\Proveedor;
use Ps\PdfBundle\Annotation\Pdf;

class OrderController extends Controller
{
    public function indexAction()
    {
        $articles   = array();
        $quantities = array();

        // Gets the Entity Manager and the order values.
        $em     = $this->getDoctrine()->getEntityManager();
        $orders = $em->getRepository('DNTWorkshopBundle:Pedido')->findBy(array(
            'eliminado'  => 0,
            'confirmado' => 0,
        ));

        // Find each article from the session.
        foreach ($orders as $order) {
            $artProv  = $order->getArticuloProveedor();
            $provider = $artProv->getProveedor();
            $article  = $artProv->getArticulo();
            $articles[$provider->getId()]['provider']  = $provider;
            $articles[$provider->getId()]['article'][] = $article;
            $quantities[$article->getId()] = $order->getCantidad();
        }

        if ($articles) {
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate($articles, $this->get('request')->query->get('page', 1), 12);
        }

        // Render the view.
        return $this->render('DNTWorkshopBundle:Cash:orders.html.twig', array(
            'section'  => 'cash',
            'articles' => ($articles) ? $pagination : null,
            'quantity' => $quantities,
        ));
    }

    /**
     * List a order.
     * @Pdf()
     */
    public function orderAction($id, $_format)
    {
        $articles   = array();
        $quantities = array();

        // Gets the Entity Manager and the order values.
        $em     = $this->getDoctrine()->getEntityManager();
        $orders = $em->getRepository('DNTWorkshopBundle:Pedido')->findBy(array(
            'eliminado'  => 0,
            'confirmado' => 0,
        ));

        // Find each article from the session.
        foreach ($orders as $order) {
            $artProv  = $order->getArticuloProveedor();
            $provider = $artProv->getProveedor();
            $article  = $artProv->getArticulo();
            $articles[$provider->getId()]['provider']  = $provider;
            $articles[$provider->getId()]['article'][] = $article;
            $quantities[$article->getId()] = $order->getCantidad();
        }

        if ($articles) {
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate($articles, $this->get('request')->query->get('page', 1), 12);
        }


        // Render the view.
        return $this->render(sprintf('DNTWorkshopBundle:Cash:order.%s.twig', $_format), array(
            'section' => 'cash',
            'articles'   => $articles,
            'quantity' => $quantities,
        ));
    }

}
