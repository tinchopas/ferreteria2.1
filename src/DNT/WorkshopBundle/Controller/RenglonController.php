<?php

namespace DNT\WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DNT\WorkshopBundle\Entity\Renglon;
use DNT\WorkshopBundle\Form\RenglonType;

/**
 * Renglon controller.
 *
 */
class RenglonController extends Controller
{
    /**
     * Lists all Renglon entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('DNTWorkshopBundle:Renglon')->findAll();

        return $this->render('DNTWorkshopBundle:Renglon:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Renglon entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('DNTWorkshopBundle:Renglon')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Renglon entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DNTWorkshopBundle:Renglon:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Renglon entity.
     *
     */
    public function newAction()
    {
        $entity = new Renglon();
        $form   = $this->createForm(new RenglonType(), $entity);

        return $this->render('DNTWorkshopBundle:Renglon:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Renglon entity.
     *
     */
    public function createAction()
    {
        $entity  = new Renglon();
        $request = $this->getRequest();
        $form    = $this->createForm(new RenglonType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('renglon_show', array('id' => $entity->getId())));
            
        }

        return $this->render('DNTWorkshopBundle:Renglon:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Renglon entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('DNTWorkshopBundle:Renglon')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Renglon entity.');
        }

        $editForm = $this->createForm(new RenglonType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DNTWorkshopBundle:Renglon:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Renglon entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('DNTWorkshopBundle:Renglon')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Renglon entity.');
        }

        $editForm   = $this->createForm(new RenglonType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('renglon_edit', array('id' => $id)));
        }

        return $this->render('DNTWorkshopBundle:Renglon:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Renglon entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('DNTWorkshopBundle:Renglon')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Renglon entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('renglon'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
