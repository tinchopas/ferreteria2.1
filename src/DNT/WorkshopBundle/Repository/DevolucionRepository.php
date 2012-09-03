<?php

namespace DNT\WorkshopBundle\Repository;

use Doctrine\ORM\EntityRepository;

class DevolucionRepository extends EntityRepository
{
    public function getReturnsByProvider($idProvider)
    {
        $returnsResponse = array();

        $em = $this->getEntityManager();
        $returns = $em->getRepository('DNTWorkshopBundle:Devolucion')->findBy(array(
            'eliminado' => 0,
            'devuelto'  => 0,
        ));

        foreach ($returns as $return) {
            $artProv = $return->getArticuloProveedor();
            if ($artProv->getProveedor()->getId() == $idProvider) {
                $returnsResponse[] = array(
                    'name'     => $artProv->getArticulo()->getNombre(),
                    'quantity' => $return->getCantidad(),
                );
            }
        }
        return $returnsResponse;
    }


    public function confirmReturnsByProvider($idProvider)
    {
        $em = $this->getEntityManager();
        $returns = $em->getRepository('DNTWorkshopBundle:Devolucion')->findAll();

        foreach ($returns as $return) {
            $artProv = $return->getArticuloProveedor();
            if ($artProv->getProveedor()->getId() == $idProvider) {

                // Confirm the order.
                $return->setDevuelto(1);
                $em->persist($return);
            }
        }
        $em->flush();
    }
}
