<?php

namespace DNT\WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\File;

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
        $backupFile = '/tmp/tempDump';

        $command = "mysqldump -uroot -pr00t ferreteria | gzip > $backupFile";
        $return = exec($command, $output, $return_var);
        $file = new file($backupFile);
        $file->move($this->getUploadRootDir(),'backup'.date("Y-m-d-H-i-s").'.gz');
        unset($file);
        $this->get('session')->getFlashBag()->add('notice', 'Your changes were saved!');
//        $this->get('session')->setFlash('success', 'Your changes were saved!');

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
