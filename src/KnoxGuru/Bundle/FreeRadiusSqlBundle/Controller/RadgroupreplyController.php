<?php

namespace KnoxGuru\Bundle\FreeRadiusSqlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use KnoxGuru\Bundle\FreeRadiusSqlBundle\Entity\Radgroupreply;
use KnoxGuru\Bundle\FreeRadiusSqlBundle\Form\RadgroupreplyType;

/**
 * Radgroupreply controller.
 *
 * @Route("/groupreply")
 */
class RadgroupreplyController extends Controller
{

    /**
     * Lists all Radgroupreply entities.
     *
     * @Route("/", name="groupreply")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radgroupreply')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Radgroupreply entity.
     *
     * @Route("/", name="groupreply_create")
     * @Method("POST")
     * @Template("KnoxGuruFreeRadiusSqlBundle:Radgroupreply:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Radgroupreply();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('groupreply_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Radgroupreply entity.
    *
    * @param Radgroupreply $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Radgroupreply $entity)
    {
        $form = $this->createForm(new RadgroupreplyType(), $entity, array(
            'action' => $this->generateUrl('groupreply_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Radgroupreply entity.
     *
     * @Route("/new", name="groupreply_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Radgroupreply();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Radgroupreply entity.
     *
     * @Route("/{id}", name="groupreply_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radgroupreply')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Radgroupreply entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Radgroupreply entity.
     *
     * @Route("/{id}/edit", name="groupreply_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radgroupreply')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Radgroupreply entity.');
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
    * Creates a form to edit a Radgroupreply entity.
    *
    * @param Radgroupreply $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Radgroupreply $entity)
    {
        $form = $this->createForm(new RadgroupreplyType(), $entity, array(
            'action' => $this->generateUrl('groupreply_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Radgroupreply entity.
     *
     * @Route("/{id}", name="groupreply_update")
     * @Method("PUT")
     * @Template("KnoxGuruFreeRadiusSqlBundle:Radgroupreply:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radgroupreply')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Radgroupreply entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('groupreply_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Radgroupreply entity.
     *
     * @Route("/{id}", name="groupreply_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radgroupreply')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Radgroupreply entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('groupreply'));
    }

    /**
     * Creates a form to delete a Radgroupreply entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('groupreply_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
