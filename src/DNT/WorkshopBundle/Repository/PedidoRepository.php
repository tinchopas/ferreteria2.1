<?php

namespace DNT\WorkshopBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PedidoRepository extends EntityRepository
{
    public function deleteOrdersByProvider($idProvider)
    {
        $em = $this->getEntityManager();
        $orders = $em->getRepository('DNTWorkshopBundle:Pedido')->findBy(array(
            'eliminado'  => 0,
            'confirmado' => 0,
        ));

        foreach ($orders as $order) {
            $artProv = $order->getArticuloProveedor();
            if ($artProv->getProveedor()->getId() == $idProvider) {
                $order->setEliminado(1);
                $em->persist($order);
            }
        }
        $em->flush();
    }


    public function confirmOrdersByProvider($idProvider)
    {
        $em = $this->getEntityManager();
        $orders = $em->getRepository('DNTWorkshopBundle:Pedido')->findAll();

        foreach ($orders as $order) {
            $artProv = $order->getArticuloProveedor();
            if ($artProv->getProveedor()->getId() == $idProvider) {

                // Confirm the order.
                $order->setConfirmado(1);
                $em->persist($order);

                // Add the stock to the article.
                $article  = $artProv->getArticulo();
                $artStock = $article->getCantidad();
                $article->setCantidad($artStock + $order->getCantidad());
                $em->persist($article);
            }
        }
        $em->flush();
    }
}
