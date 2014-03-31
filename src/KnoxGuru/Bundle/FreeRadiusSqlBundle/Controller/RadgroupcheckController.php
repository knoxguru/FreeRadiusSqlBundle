<?php

namespace KnoxGuru\Bundle\FreeRadiusSqlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use KnoxGuru\Bundle\FreeRadiusSqlBundle\Entity\Radgroupcheck;
use KnoxGuru\Bundle\FreeRadiusSqlBundle\Form\RadgroupcheckType;

/**
 * Radgroupcheck controller.
 *
 * @Route("/group")
 */
class RadgroupcheckController extends Controller
{

    /**
     * Lists all Radgroupcheck entities.
     *
     * @Route("/", name="group")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radgroupcheck')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Radgroupcheck entity.
     *
     * @Route("/", name="group_create")
     * @Method("POST")
     * @Template("KnoxGuruFreeRadiusSqlBundle:Radgroupcheck:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Radgroupcheck();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('group_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Radgroupcheck entity.
    *
    * @param Radgroupcheck $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Radgroupcheck $entity)
    {
        $form = $this->createForm(new RadgroupcheckType(), $entity, array(
            'action' => $this->generateUrl('group_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Radgroupcheck entity.
     *
     * @Route("/new", name="group_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Radgroupcheck();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Radgroupcheck entity.
     *
     * @Route("/{id}", name="group_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radgroupcheck')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Radgroupcheck entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Radgroupcheck entity.
     *
     * @Route("/{id}/edit", name="group_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radgroupcheck')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Radgroupcheck entity.');
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
    * Creates a form to edit a Radgroupcheck entity.
    *
    * @param Radgroupcheck $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Radgroupcheck $entity)
    {
        $form = $this->createForm(new RadgroupcheckType(), $entity, array(
            'action' => $this->generateUrl('group_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Radgroupcheck entity.
     *
     * @Route("/{id}", name="group_update")
     * @Method("PUT")
     * @Template("KnoxGuruFreeRadiusSqlBundle:Radgroupcheck:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radgroupcheck')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Radgroupcheck entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('group_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Radgroupcheck entity.
     *
     * @Route("/{id}", name="group_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radgroupcheck')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Radgroupcheck entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('group'));
    }

    /**
     * Creates a form to delete a Radgroupcheck entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('group_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
