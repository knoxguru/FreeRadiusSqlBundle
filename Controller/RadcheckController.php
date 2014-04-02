<?php

namespace KnoxGuru\Bundle\FreeRadiusSqlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use KnoxGuru\Bundle\FreeRadiusSqlBundle\Entity\Radcheck;
use KnoxGuru\Bundle\FreeRadiusSqlBundle\Form\RadcheckType;

/**
 * Radcheck controller.
 *
 * @Route("/check")
 */
class RadcheckController extends Controller
{

    /**
     * Lists all Radcheck entities.
     *
     * @Route("/", name="check")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radcheck')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Radcheck entity.
     *
     * @Route("/", name="check_create")
     * @Method("POST")
     * @Template("KnoxGuruFreeRadiusSqlBundle:Radcheck:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Radcheck();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('check_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Radcheck entity.
    *
    * @param Radcheck $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Radcheck $entity)
    {
        $form = $this->createForm(new RadcheckType(), $entity, array(
            'action' => $this->generateUrl('check_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Radcheck entity.
     *
     * @Route("/new", name="check_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Radcheck();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Radcheck entity.
     *
     * @Route("/{id}", name="check_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radcheck')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Radcheck entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Radcheck entity.
     *
     * @Route("/{id}/edit", name="check_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radcheck')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Radcheck entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Radcheck entity.
    *
    * @param Radcheck $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Radcheck $entity)
    {
        $form = $this->createForm(new RadcheckType(), $entity, array(
            'action' => $this->generateUrl('check_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Radcheck entity.
     *
     * @Route("/{id}", name="check_update")
     * @Method("PUT")
     * @Template("KnoxGuruFreeRadiusSqlBundle:Radcheck:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radcheck')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Radcheck entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('check_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Radcheck entity.
     *
     * @Route("/{id}", name="check_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radcheck')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Radcheck entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('check'));
    }

    /**
     * Creates a form to delete a Radcheck entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('check_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
