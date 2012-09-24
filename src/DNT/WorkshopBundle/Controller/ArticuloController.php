<?php

namespace DNT\WorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DNT\WorkshopBundle\Entity\Articulo;
use DNT\WorkshopBundle\Form\ArticuloType;
use Ps\PdfBundle\Annotation\Pdf;

/**
 * Articulo controller.
 *
 */
class ArticuloController extends Controller
{
    /**
     * Lists all Articulo entities.
     * @Pdf()
     */
    public function indexAction($_format)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('DNTWorkshopBundle:Articulo')->findAll();

        $csrfToken = $this->container->get('form.csrf_provider')->generateCsrfToken('unknown');

        return $this->render(sprintf('DNTWorkshopBundle:Articulo:index.%s.twig', $_format), array(
            'section'  => 'article',
            'entities' => $entities,
            'csrf_token' => $csrfToken
        ));
    }

    /**
     * Finds and displays a Articulo entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('DNTWorkshopBundle:Articulo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Articulo entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DNTWorkshopBundle:Articulo:show.html.twig', array(
            'section'     => 'article',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to create a new Articulo entity.
     *
     */
    public function newAction()
    {
        $entity = new Articulo();
        $form   = $this->createForm(new ArticuloType(), $entity);

        return $this->render('DNTWorkshopBundle:Articulo:new.html.twig', array(
            'section' => 'article',
            'entity'  => $entity,
            'form'    => $form->createView()
        ));
    }

    /**
     * Creates a new Articulo entity.
     *
     */
    public function createAction()
    {
        $entity  = new Articulo();
        $request = $this->getRequest();
        $form    = $this->createForm(new ArticuloType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('articulo_show', array('id' => $entity->getId())));
            
        }

        return $this->render('DNTWorkshopBundle:Articulo:new.html.twig', array(
            'section' => 'article',
            'entity'  => $entity,
            'form'    => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Articulo entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('DNTWorkshopBundle:Articulo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Articulo entity.');
        }

        $editForm = $this->createForm(new ArticuloType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DNTWorkshopBundle:Articulo:edit.html.twig', array(
            'section'     => 'article',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Articulo entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('DNTWorkshopBundle:Articulo')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Articulo entity.');
        }

        $editForm   = $this->createForm(new ArticuloType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $previousCollections = $entity->getArticuloProveedors();
        $previousCollections = $previousCollections->toArray();
        $request = $this->getRequest();

        $editForm->bindRequest($request);

        foreach($previousCollections as $ap)
        {
            $em->remove($ap);
            $entity->removeAp($ap);
        }
        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('articulo_edit', array('id' => $id)));
        }

        return $this->render('DNTWorkshopBundle:Articulo:edit.html.twig', array(
            'section'     => 'article',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Articulo entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('DNTWorkshopBundle:Articulo')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Articulo entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('notice', 'El elemento ha sido eliminado!');
        }

        return $this->redirect($this->generateUrl('articulo'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
