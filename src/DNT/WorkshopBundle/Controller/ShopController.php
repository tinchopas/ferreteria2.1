<?php

namespace DNT\WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

use DNT\WorkshopBundle\Entity\Articulo;
use DNT\WorkshopBundle\Entity\Factura;
use DNT\WorkshopBundle\Entity\Renglon;
use Ps\PdfBundle\Annotation\Pdf;


class ShopController extends Controller
{
    public function indexAction()
    {
        $articles = array();

        // Gets the Entity Manager and the shop values.
        $em = $this->getDoctrine()->getEntityManager();
        $shop = $this->get('session')->get('shop');

        // Find each article from the session.
        if (!empty($shop)) {
            foreach ($shop as $id => $quantity) {
                $articles[] = $em->getRepository('DNTWorkshopBundle:Articulo')->find($id);
            }
        }

        // Render the view.
        return $this->render('DNTWorkshopBundle:Cash:shop.html.twig', array(
            'section'  => 'cash',
            'articles' => $articles,
            'quantity' => $shop,
        ));
    }


    public function submitBuyAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $shop = $this->get('session')->get('shop');

        if (!empty($shop)) {

            // The ticket is created.
            $ticket = new Factura();
            $ticket->setNroFactura($em->getRepository('DNTWorkshopBundle:Factura')->getLastNroFactura() + 1);
            $ticket->setCreado(new \DateTime('now'));
            $em->persist($ticket);

            // Each article is added to the ticket.
            foreach ($shop as $id => $quantity) {
                $article = $em->getRepository('DNTWorkshopBundle:Articulo')->find($id);
                $article->setCantidad($article->getCantidad() - $quantity);
                $em->persist($article);

                // Create the line for each article used in the ticket.
                $line = new Renglon();
                $line->setFactura($ticket);
                $line->setArticulo($article);
                $line->setCantidad($quantity);
                $line->setNombreArticulo($article->getNombre());
                $line->setPrecioArticulo($article->getPrecioVenta());
                $line->setPrecioTotal($quantity * $article->getPrecioVenta());
                $line->setCreado(new \DateTime('now'));
                $em->persist($line);
            }

            // Persist the data into the DB.
            $em->flush();
        }

        // Clean the shopping cart and redirect to the sales page.
        $this->forward('DNTWorkshopBundle:Ajax:cleanBuy');
        $this->container->get('session')->getFlashBag()->set('success', 'La venta se ha realizado correctamente.');
        return $this->redirect($this->generateUrl('DNTWorkshopBundle_shop'));
    }


    public function salesAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $sl = $em->getRepository('DNTWorkshopBundle:Factura')->findBy(array(), array('creado' => 'DESC'));

        if ($sl) {
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate($sl, $this->get('request')->query->get('page', 1), 12);
        }

        // Render the view.
        return $this->render('DNTWorkshopBundle:Cash:sales.html.twig', array(
            'section' => 'cash',
            'sales'   => ($sl) ? $pagination : null,
        ));
    }

    /**
     * List a sale .
     * @Pdf()
     */
    public function saleAction($id, $_format)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $sl = $em->getRepository('DNTWorkshopBundle:Factura')->find($id);

        // Render the view.
        return $this->render(sprintf('DNTWorkshopBundle:Cash:sale.%s.twig', $_format), array(
            'section' => 'cash',
            'sale'   => $sl,
        ));
    }
}
