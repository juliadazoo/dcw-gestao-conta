<?php

namespace Dcw\GestaoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Dcw\GestaoBundle\Entity\InvoiceTag;
use Dcw\GestaoBundle\Form\InvoiceTagType;

/**
 * InvoiceTag controller.
 *
 */
class InvoiceTagController extends Controller
{

    /**
     * Lists all InvoiceTag entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DcwGestaoBundle:InvoiceTag')->findAll();

        return $this->render('DcwGestaoBundle:InvoiceTag:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new InvoiceTag entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new InvoiceTag();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('invoicetag_show', array('id' => $entity->getId())));
        }

        return $this->render('DcwGestaoBundle:InvoiceTag:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a InvoiceTag entity.
     *
     * @param InvoiceTag $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(InvoiceTag $entity)
    {
        $form = $this->createForm(new InvoiceTagType(), $entity, array(
            'action' => $this->generateUrl('invoicetag_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new InvoiceTag entity.
     *
     */
    public function newAction()
    {
        $entity = new InvoiceTag();
        $form   = $this->createCreateForm($entity);

        return $this->render('DcwGestaoBundle:InvoiceTag:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a InvoiceTag entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DcwGestaoBundle:InvoiceTag')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InvoiceTag entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DcwGestaoBundle:InvoiceTag:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing InvoiceTag entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DcwGestaoBundle:InvoiceTag')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InvoiceTag entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DcwGestaoBundle:InvoiceTag:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a InvoiceTag entity.
    *
    * @param InvoiceTag $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(InvoiceTag $entity)
    {
        $form = $this->createForm(new InvoiceTagType(), $entity, array(
            'action' => $this->generateUrl('invoicetag_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing InvoiceTag entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DcwGestaoBundle:InvoiceTag')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find InvoiceTag entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('invoicetag_edit', array('id' => $id)));
        }

        return $this->render('DcwGestaoBundle:InvoiceTag:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a InvoiceTag entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DcwGestaoBundle:InvoiceTag')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find InvoiceTag entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('invoicetag'));
    }

    /**
     * Creates a form to delete a InvoiceTag entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('invoicetag_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
