<?php

namespace DNT\WorkshopBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;

class CreatedUpdated
{
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity        = $args->getEntity();
        $entityManager = $args->getEntityManager();

        //$entity->setModificado(new \DateTime("now"));
        //$entity->setEliminado(0);
    }
}
