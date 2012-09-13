<?php

namespace DNT\WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;

class SimpleSearchController extends Controller
{
    /**
     * rootAction - Action executed when the root of the system is accessed.
     * 
     * @access public
     * @return void
     */
    public function rootAction()
    {
        return $this->redirect($this->generateUrl('DNTWorkshopBundle_homepage'));
    }


    /**
     * indexAction - Action executed for the simple search. 
     * 
     * @access public
     * @return void
     */
    public function indexAction()
    {
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $ar = $em->getRepository('DNTWorkshopBundle:Articulo')->findBy(array(
            'codigoBarra' => $request->query->get('codigo'),
        ));
        return $this->render('DNTWorkshopBundle:Default:simple_search.html.twig', array(
            'section'  => 'search',
            'articles' => $ar,
        ));
    }
}
