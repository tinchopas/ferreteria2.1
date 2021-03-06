<?php

namespace DNT\WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DNT\WorkshopBundle\Entity\Proveedor;
use DNT\WorkshopBundle\Form\ProveedorType;

/**
 * Proveedor controller.
 *
 */
class ProveedorController extends Controller
{
    /**
     * Lists all Proveedor entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('DNTWorkshopBundle:Proveedor')->findAll();
        if ($entities) {
            $paginator  = $this->get('knp_paginator');
            $pagination = $paginator->paginate($entities, $this->get('request')->query->get('page', 1), 15);
        }

        $csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('unknown');

        return $this->render('DNTWorkshopBundle:Proveedor:index.html.twig', array(
            'section'    => 'provider',
            'entities'   => ($entities) ? $pagination : null,
            'csrf_token' => $csrfToken
        ));
    }

    /**
     * Finds and displays a Proveedor entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('DNTWorkshopBundle:Proveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proveedor entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DNTWorkshopBundle:Proveedor:show.html.twig', array(
            'section'     => 'provider',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to create a new Proveedor entity.
     *
     */
    public function newAction()
    {
        $entity = new Proveedor();
        $form   = $this->createForm(new ProveedorType(), $entity, array('ruleDefinition' => $this->container->getParameter('ruleDefinition')));

        return $this->render('DNTWorkshopBundle:Proveedor:new.html.twig', array(
            'section' => 'provider',
            'entity'  => $entity,
            'form'    => $form->createView()
        ));
    }

    /**
     * Creates a new Proveedor entity.
     *
     */
    public function createAction()
    {
        $entity  = new Proveedor();
        $request = $this->getRequest();
        $form    = $this->createForm(new ProveedorType(), $entity, array('ruleDefinition' => $this->container->getParameter('ruleDefinition')));
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('proveedor_show', array('id' => $entity->getId())));
            
        }

        return $this->render('DNTWorkshopBundle:Proveedor:new.html.twig', array(
            'section' => 'provider',
            'entity'  => $entity,
            'form'    => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Proveedor entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('DNTWorkshopBundle:Proveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proveedor entity.');
        }

        $editForm = $this->createForm(new ProveedorType(), $entity, array('ruleDefinition' => $this->container->getParameter('ruleDefinition')));
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DNTWorkshopBundle:Proveedor:edit.html.twig', array(
            'section'     => 'provider',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Proveedor entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('DNTWorkshopBundle:Proveedor')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Proveedor entity.');
        }

        $editForm   = $this->createForm(new ProveedorType(), $entity, array('ruleDefinition' => $this->container->getParameter('ruleDefinition')));
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('proveedor_edit', array('id' => $id)));
        }

        return $this->render('DNTWorkshopBundle:Proveedor:edit.html.twig', array(
            'section'     => 'provider',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Proveedor entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('DNTWorkshopBundle:Proveedor')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Proveedor entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('proveedor'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
