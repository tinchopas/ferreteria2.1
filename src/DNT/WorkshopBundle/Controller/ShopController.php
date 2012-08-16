<?php

namespace DNT\WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

use DNT\WorkshopBundle\Entity\Factura;
use DNT\WorkshopBundle\Entity\Renglon;

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
        return $this->render('DNTWorkshopBundle:Default:shop.html.twig', array(
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
            $ticket->setNroFactura('0000');
            $ticket->setCreado(new \DateTime('now'));
            $em->persist($ticket);

            // Each article is added to the ticket.
            foreach ($shop as $id => $quantity) {
                $article = $em->getRepository('DNTWorkshopBundle:Articulo')->find($id);
                $article->setCantidad($article->getCantidad() - $quantity);
                $em->persist($article);

                // Create the line for each article used in the ticket.
                $line = new Renglon();
                $line->setIdFactura($ticket);
                $line->setIdArticulo($article);
                $line->setCantidad($quantity);
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
        return $this->redirect($this->generateUrl('DNTWorkshopBundle_shop'));
    }
}
