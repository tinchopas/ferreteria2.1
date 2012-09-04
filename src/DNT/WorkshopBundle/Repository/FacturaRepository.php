<?php

namespace DNT\WorkshopBundle\Repository;

use Doctrine\ORM\EntityRepository;

class FacturaRepository extends EntityRepository
{
    public function getLastNroFactura()
    {
        $em = $this->getEntityManager();
        $ticket = $em->getRepository('DNTWorkshopBundle:Factura')->findBy(array(), array('nroFactura' => 'DESC'));
        if ($ticket) {
            $last = $ticket[0];
            return $last->getNroFactura();
        } else {
            return '0';
        }
    }
}
