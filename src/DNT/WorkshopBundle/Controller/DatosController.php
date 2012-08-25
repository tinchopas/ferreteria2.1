<?php

namespace DNT\WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Data managment controller.
 *
 */
class DatosController extends Controller
{
    /**
     * Shows all the options to manage data.
     *
     */
    public function indexAction()
    {

        $response = $this->render('DNTWorkshopBundle:Datos:index.html.twig');
        return $response;
    }
    public function savedbAction()
    {

        /*return $this->render('DNTWorkshopBundle:Datos:index.html.twig');*/
    }
}
