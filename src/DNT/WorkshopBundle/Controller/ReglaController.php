<?php

namespace DNT\WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DNT\WorkshopBundle\Entity\Regla;
use DNT\WorkshopBundle\Form\ReglaType;

/**
 * Regla controller.
 *
 */
class ReglaController extends Controller
{
    /**
     * Lists all Regla entities.
     *
     */
    public function indexAction()
    {

        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('DNTWorkshopBundle:Regla')->findAll();

        $csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('unknown');

        return $this->render('DNTWorkshopBundle:Regla:index.html.twig', array(
            'section'  => 'rules',
            'entities' => $entities,
            'csrf_token' => $csrfToken
        ));
    }

    /**
     * Finds and displays a Regla entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('DNTWorkshopBundle:Regla')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Regla entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DNTWorkshopBundle:Regla:show.html.twig', array(
            'section'     => 'rules',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to create a new Regla entity.
     *
     */
    public function newAction()
    {
        $entity = new Regla();
        $form   = $this->createForm(new ReglaType(), $entity, array('ruleDefinition' => $this->container->getParameter('ruleDefinition')));

        return $this->render('DNTWorkshopBundle:Regla:new.html.twig', array(
            'section' => 'rules',
            'entity'  => $entity,
            'form'    => $form->createView()
        ));
    }

    /**
     * Creates a new Regla entity.
     *
     */
    public function createAction()
    {
        $entity  = new Regla();
        $request = $this->getRequest();
        $form    = $this->createForm(new ReglaType(), $entity, array('ruleDefinition' => $this->container->getParameter('ruleDefinition')));
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('regla_show', array('id' => $entity->getId())));
            
        }

        return $this->render('DNTWorkshopBundle:Regla:new.html.twig', array(
            'section' => 'rules',
            'entity'  => $entity,
            'form'    => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Regla entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('DNTWorkshopBundle:Regla')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Regla entity.');
        }
        $editForm = $this->createForm(new ReglaType(), $entity, array('ruleDefinition' => $this->container->getParameter('ruleDefinition')));
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DNTWorkshopBundle:Regla:edit.html.twig', array(
            'section'     => 'rules',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Regla entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('DNTWorkshopBundle:Regla')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Regla entity.');
        }

        $editForm   = $this->createForm(new ReglaType(), $entity, array('ruleDefinition' => $this->container->getParameter('ruleDefinition')));
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('regla_edit', array('id' => $id)));
        }

        return $this->render('DNTWorkshopBundle:Regla:edit.html.twig', array(
            'section'     => 'rules',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Regla entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('DNTWorkshopBundle:Regla')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Regla entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('regla'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
