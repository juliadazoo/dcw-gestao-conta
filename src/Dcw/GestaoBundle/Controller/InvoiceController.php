<?php

namespace Dcw\GestaoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Dcw\GestaoBundle\Entity\Invoice;
use Dcw\GestaoBundle\Form\InvoiceType;

/**
 * Invoice controller.
 *
 */
class InvoiceController extends Controller
{

    /**
     * Lists all Invoice entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DcwGestaoBundle:Invoice')->findAll();

        return $this->render('DcwGestaoBundle:Invoice:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Invoice entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Invoice();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('invoice_show', array('id' => $entity->getId())));
        }

        return $this->render('DcwGestaoBundle:Invoice:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Invoice entity.
     *
     * @param Invoice $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Invoice $entity)
    {
        $form = $this->createForm(new InvoiceType(), $entity, array(
            'action' => $this->generateUrl('invoice_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Invoice entity.
     *
     */
    public function newAction()
    {
        $entity = new Invoice();
        $form   = $this->createCreateForm($entity);

        return $this->render('DcwGestaoBundle:Invoice:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Invoice entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DcwGestaoBundle:Invoice')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Invoice entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DcwGestaoBundle:Invoice:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Invoice entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DcwGestaoBundle:Invoice')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Invoice entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('DcwGestaoBundle:Invoice:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Invoice entity.
    *
    * @param Invoice $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Invoice $entity)
    {
        $form = $this->createForm(new InvoiceType(), $entity, array(
            'action' => $this->generateUrl('invoice_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Invoice entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DcwGestaoBundle:Invoice')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Invoice entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('invoice_edit', array('id' => $id)));
        }

        return $this->render('DcwGestaoBundle:Invoice:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Invoice entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DcwGestaoBundle:Invoice')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Invoice entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('invoice'));
    }

    /**
     * Creates a form to delete a Invoice entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('invoice_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
