<?php

namespace DNT\WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

use DNT\WorkshopBundle\Form\ProveedorSearchType;

use DNT\WorkshopBundle\Entity\Articulo;
use DNT\WorkshopBundle\Entity\ArticuloProveedor;
use DNT\WorkshopBundle\Entity\Proveedor;

class ProveedorSearchController extends Controller
{
    public function indexAction()
    {
        $request = $this->getRequest();

        $form = $this->createForm(new ProveedorSearchType());

        if ($request->getMethod() == 'GET') {
            $data = $request->query->all();
            if (isset($data['proveedorSearch'])) {
                $data = $data['proveedorSearch'];
                $em = $this->getDoctrine()->getEntityManager();
                $qb = $em->getRepository('DNTWorkshopBundle:Proveedor')->createQueryBuilder('p');

                $qb->where('p.nombre LIKE :nombre')
                   ->setParameter('nombre', '%'.$data['nombre'].'%')
                   ->andWhere('p.apellido LIKE :apellido')
                   ->setParameter('apellido', '%'.$data['apellido'].'%')
                   ->andWhere('p.direccion LIKE :direccion')
                   ->setParameter('direccion', '%'.$data['direccion'].'%');
                $query = $qb->getQuery();
            }
        }
        return $this->render('DNTWorkshopBundle:Default:proveedor_search.html.twig', array(
            'suppliers' => isset($query) ? $query->getResult() : null,
            'form'     => $form->createView(),
        ));
    }
}
