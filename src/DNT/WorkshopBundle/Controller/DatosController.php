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
        $response = $this->render('DNTWorkshopBundle:Datos:index.html.twig', array(
            'section' => 'maintenance',
        ));
        return $response;
    }


    private function getUploadRootDir()
    {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }


    private function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/backups';
    }


    public function savedbAction()
    {
        $factory = $this->container->get('backup_restore.factory');
        $backupInstance = $factory->getBackupInstance('doctrine.dbal.default_connection');
        $backupInstance->backupDatabase($this->getUploadRootDir(), 'backup'.date("Y-m-d-H-i-s").'.sql');

        $this->get('session')->getFlashBag()->add('notice', 'Your changes were saved!');

        return $this->render('DNTWorkshopBundle:Datos:index.html.twig', array(
            'section' => 'maintenance',
        ));
    }


    public function restoredbAction()
    {
        return $this->render('DNTWorkshopBundle:Datos:index.html.twig', array(
            'section' => 'maintenance',
        ));
    }


    public function deletedbAction()
    {
        return $this->render('DNTWorkshopBundle:Datos:index.html.twig', array(
            'section' => 'maintenance',
        ));
    }
}
