<?php

namespace Gastro\HospitalizacionBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Gastro\HospitalizacionBundle\Entity\Diagnostico;
use Gastro\HospitalizacionBundle\Form\DiagnosticoType;

/**
 * Diagnostico controller.
 *
 */
class DiagnosticoController extends Controller
{

    /**
     * Lists all Diagnostico entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('HospitalizacionBundle:Diagnostico')->findAll();

        return $this->render('HospitalizacionBundle:Diagnostico:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Diagnostico entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Diagnostico();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('diagnostico_show', array('id' => $entity->getId())));
        }

        return $this->render('HospitalizacionBundle:Diagnostico:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Diagnostico entity.
     *
     * @param Diagnostico $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Diagnostico $entity)
    {
        $form = $this->createForm(new DiagnosticoType(), $entity, array(
            'action' => $this->generateUrl('diagnostico_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Registrar nuevo'));

        return $form;
    }

    /**
     * Displays a form to create a new Diagnostico entity.
     *
     */
    public function newAction()
    {
        $entity = new Diagnostico();
        $form   = $this->createCreateForm($entity);

        return $this->render('HospitalizacionBundle:Diagnostico:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Diagnostico entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HospitalizacionBundle:Diagnostico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Diagnostico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HospitalizacionBundle:Diagnostico:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Diagnostico entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HospitalizacionBundle:Diagnostico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('No se puede encontrar Diagnostico solicitado.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('HospitalizacionBundle:Diagnostico:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Diagnostico entity.
    *
    * @param Diagnostico $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Diagnostico $entity)
    {
        $form = $this->createForm(new DiagnosticoType(), $entity, array(
            'action' => $this->generateUrl('diagnostico_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar Cambios'));

        return $form;
    }
    /**
     * Edits an existing Diagnostico entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('HospitalizacionBundle:Diagnostico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Diagnostico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('diagnostico_edit', array('id' => $id)));
        }

        return $this->render('HospitalizacionBundle:Diagnostico:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Diagnostico entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('HospitalizacionBundle:Diagnostico')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Diagnostico entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('diagnostico'));
    }

    /**
     * Creates a form to delete a Diagnostico entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('diagnostico_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Eliminar'))
            ->getForm()
        ;
    }
}
