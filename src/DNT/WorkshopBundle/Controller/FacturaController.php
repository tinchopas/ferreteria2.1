<?php

namespace DNT\WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DNT\WorkshopBundle\Entity\Factura;
use DNT\WorkshopBundle\Form\FacturaType;

/**
 * Factura controller.
 *
 */
class FacturaController extends Controller
{
    /**
     * Lists all Factura entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('DNTWorkshopBundle:Factura')->findAll();

        return $this->render('DNTWorkshopBundle:Factura:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Factura entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('DNTWorkshopBundle:Factura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Factura entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DNTWorkshopBundle:Factura:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Factura entity.
     *
     */
    public function newAction()
    {
        $entity = new Factura();
        $form   = $this->createForm(new FacturaType(), $entity);

        return $this->render('DNTWorkshopBundle:Factura:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Factura entity.
     *
     */
    public function createAction()
    {
        $entity  = new Factura();
        $request = $this->getRequest();
        $form    = $this->createForm(new FacturaType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('factura_show', array('id' => $entity->getId())));
            
        }

        return $this->render('DNTWorkshopBundle:Factura:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Factura entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('DNTWorkshopBundle:Factura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Factura entity.');
        }

        $editForm = $this->createForm(new FacturaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DNTWorkshopBundle:Factura:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Factura entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('DNTWorkshopBundle:Factura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Factura entity.');
        }

        $editForm   = $this->createForm(new FacturaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('factura_edit', array('id' => $id)));
        }

        return $this->render('DNTWorkshopBundle:Factura:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Factura entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('DNTWorkshopBundle:Factura')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Factura entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('factura'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
