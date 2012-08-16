<?php

namespace DNT\WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DNT\WorkshopBundle\Entity\ArticuloProveedor;
use DNT\WorkshopBundle\Form\ArticuloProveedorType;

/**
 * ArticuloProveedor controller.
 *
 */
class ArticuloProveedorController extends Controller
{
    /**
     * Lists all ArticuloProveedor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('DNTWorkshopBundle:ArticuloProveedor')->findAll();

        return $this->render('DNTWorkshopBundle:ArticuloProveedor:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a ArticuloProveedor entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('DNTWorkshopBundle:ArticuloProveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ArticuloProveedor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DNTWorkshopBundle:ArticuloProveedor:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new ArticuloProveedor entity.
     *
     */
    public function newAction()
    {
        $entity = new ArticuloProveedor();
        $form   = $this->createForm(new ArticuloProveedorType(), $entity);

        return $this->render('DNTWorkshopBundle:ArticuloProveedor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new ArticuloProveedor entity.
     *
     */
    public function createAction()
    {
        $entity  = new ArticuloProveedor();
        $request = $this->getRequest();
        $form    = $this->createForm(new ArticuloProveedorType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('articuloproveedor_show', array('id' => $entity->getId())));
            
        }

        return $this->render('DNTWorkshopBundle:ArticuloProveedor:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing ArticuloProveedor entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('DNTWorkshopBundle:ArticuloProveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ArticuloProveedor entity.');
        }

        $editForm = $this->createForm(new ArticuloProveedorType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DNTWorkshopBundle:ArticuloProveedor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing ArticuloProveedor entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('DNTWorkshopBundle:ArticuloProveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ArticuloProveedor entity.');
        }

        $editForm   = $this->createForm(new ArticuloProveedorType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('articuloproveedor_edit', array('id' => $id)));
        }

        return $this->render('DNTWorkshopBundle:ArticuloProveedor:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ArticuloProveedor entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('DNTWorkshopBundle:ArticuloProveedor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ArticuloProveedor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('articuloproveedor'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
