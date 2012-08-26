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
        $backupFile = '/home/legolas/Escritorio/backup'.date("Y-m-d-H-i-s").'.gz';
        $command = "mysqldump --opt -uroot -pr00t ferreteria | gzip > $backupFile";
        //system($command);
        exec($command);
        $response = $this->render('DNTWorkshopBundle:Datos:index.html.twig');
        return $response;
    }
    public function restoredbAction()
    {

        $response = $this->render('DNTWorkshopBundle:Datos:index.html.twig');
        return $response;
    }
    public function deletedbAction()
    {

        $response = $this->render('DNTWorkshopBundle:Datos:index.html.twig');
        return $response;
    }
}
?>
