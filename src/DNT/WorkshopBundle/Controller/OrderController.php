<?php

namespace DNT\WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

use DNT\WorkshopBundle\Entity\Articulo;
use DNT\WorkshopBundle\Entity\ArticuloProveedor;
use DNT\WorkshopBundle\Entity\Factura;
use DNT\WorkshopBundle\Entity\Renglon;
use DNT\WorkshopBundle\Entity\Proveedor;

class OrderController extends Controller
{
    public function indexAction()
    {
        $articles = array();

        // Gets the Entity Manager and the order values.
        $em = $this->getDoctrine()->getEntityManager();
        $order = $this->get('session')->get('order');

        // Find each article from the session.
        if (!empty($order)) {
            foreach ($order as $id => $quantity) {
                $article      = $em->getRepository('DNTWorkshopBundle:Articulo')->find($id);
                $artProveedor = $article->getArticuloProveedors();
                $proveedor    = $artProveedor[0]->getProveedor();
                $articles[$proveedor->getNombre().' '.$proveedor->getApellido()][] = $article;
            }
        }

        // Render the view.
        return $this->render('DNTWorkshopBundle:Cash:order.html.twig', array(
            'articles' => $articles,
            'quantity' => $order,
        ));
    }
}
