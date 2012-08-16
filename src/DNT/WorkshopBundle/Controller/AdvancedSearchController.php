<?php

namespace DNT\WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

use DNT\WorkshopBundle\Form\AdvancedSearchType;

use DNT\WorkshopBundle\Entity\Articulo;
use DNT\WorkshopBundle\Entity\ArticuloProveedor;
use DNT\WorkshopBundle\Entity\Proveedor;

class AdvancedSearchController extends Controller
{
    public function indexAction()
    {
        $request = $this->getRequest();

        $form = $this->createForm(new AdvancedSearchType());

        if ($request->getMethod() == 'GET') {
      	    $data = $request->query->all();

            if (isset($data['advancedSearch'])) {
                $data = $data['advancedSearch'];

                $em = $this->getDoctrine()->getEntityManager();
                $qb = $em->getRepository('DNTWorkshopBundle:Articulo')->createQueryBuilder('a');

                $qb->where('a.nombre LIKE :nombre')
                   ->setParameter('nombre', '%'.$data['articulo'].'%')
                   ->andWhere('a.descripcion LIKE :descripcion')
                   ->setParameter('descripcion', '%'.$data['descripcion'].'%')
                   ->andWhere('a.codigoProveedor LIKE :codProveedor')
                   ->setParameter('codProveedor', '%'.$data['codproveedor'].'%');

                // Set the minimum quantity.
                if (!empty($ata['cantidad_min'])) {
                   $qb->andWhere('a.cantidad >= :cantidadMin')
                      ->setParameter('cantidadMin', $data['cantidad_min']);
                }

                // Set the maximum quantity.
                if (!empty($data['cantidad_max'])) {
                   $qb->andWhere('a.cantidad <= :cantidadMax')
                      ->setParameter('cantidadMax', $data['cantidad_max']);
                }

                // Set the proveedor.
                if (!empty($data['proveedor'])) {
                    $qb->leftJoin('a.ArticuloProveedors', 'ap')
                       ->leftJoin('ap.proveedor', 'p')
                       ->andWhere('p.nombre LIKE :proveedor')
                       ->setParameter('proveedor', '%'.$data['proveedor'].'%');
                }

                $query = $qb->getQuery();
            }
        }

        return $this->render('DNTWorkshopBundle:Default:advanced_search.html.twig', array(
            'articles' => isset($query) ? $query->getResult() : null,
            'form'     => $form->createView(),
        ));
    }
}
