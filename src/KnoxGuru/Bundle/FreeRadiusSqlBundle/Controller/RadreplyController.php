<?php

namespace KnoxGuru\Bundle\FreeRadiusSqlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use KnoxGuru\Bundle\FreeRadiusSqlBundle\Entity\Radreply;
use KnoxGuru\Bundle\FreeRadiusSqlBundle\Form\RadreplyType;

/**
 * Radreply controller.
 *
 * @Route("/reply")
 */
class RadreplyController extends Controller
{

    /**
     * Lists all Radreply entities.
     *
     * @Route("/", name="reply")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radreply')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Radreply entity.
     *
     * @Route("/", name="reply_create")
     * @Method("POST")
     * @Template("KnoxGuruFreeRadiusSqlBundle:Radreply:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Radreply();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('reply_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Radreply entity.
    *
    * @param Radreply $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Radreply $entity)
    {
        $form = $this->createForm(new RadreplyType(), $entity, array(
            'action' => $this->generateUrl('reply_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Radreply entity.
     *
     * @Route("/new", name="reply_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Radreply();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Radreply entity.
     *
     * @Route("/{id}", name="reply_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radreply')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Radreply entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Radreply entity.
     *
     * @Route("/{id}/edit", name="reply_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radreply')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Radreply entity.');
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
    * Creates a form to edit a Radreply entity.
    *
    * @param Radreply $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Radreply $entity)
    {
        $form = $this->createForm(new RadreplyType(), $entity, array(
            'action' => $this->generateUrl('reply_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Radreply entity.
     *
     * @Route("/{id}", name="reply_update")
     * @Method("PUT")
     * @Template("KnoxGuruFreeRadiusSqlBundle:Radreply:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radreply')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Radreply entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('reply_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Radreply entity.
     *
     * @Route("/{id}", name="reply_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radreply')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Radreply entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('reply'));
    }

    /**
     * Creates a form to delete a Radreply entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reply_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
