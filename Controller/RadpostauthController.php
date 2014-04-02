<?php

namespace KnoxGuru\Bundle\FreeRadiusSqlBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use KnoxGuru\Bundle\FreeRadiusSqlBundle\Entity\Radpostauth;
use KnoxGuru\Bundle\FreeRadiusSqlBundle\Form\RadpostauthType;

/**
 * Radpostauth controller.
 *
 * @Route("/postauth")
 */
class RadpostauthController extends Controller
{

    /**
     * Lists all Radpostauth entities.
     *
     * @Route("/", name="postauth")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radpostauth')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Radpostauth entity.
     *
     * @Route("/", name="postauth_create")
     * @Method("POST")
     * @Template("KnoxGuruFreeRadiusSqlBundle:Radpostauth:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Radpostauth();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('postauth_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Radpostauth entity.
    *
    * @param Radpostauth $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Radpostauth $entity)
    {
        $form = $this->createForm(new RadpostauthType(), $entity, array(
            'action' => $this->generateUrl('postauth_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Radpostauth entity.
     *
     * @Route("/new", name="postauth_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Radpostauth();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Radpostauth entity.
     *
     * @Route("/{id}", name="postauth_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radpostauth')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Radpostauth entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Radpostauth entity.
     *
     * @Route("/{id}/edit", name="postauth_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radpostauth')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Radpostauth entity.');
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
    * Creates a form to edit a Radpostauth entity.
    *
    * @param Radpostauth $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Radpostauth $entity)
    {
        $form = $this->createForm(new RadpostauthType(), $entity, array(
            'action' => $this->generateUrl('postauth_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Radpostauth entity.
     *
     * @Route("/{id}", name="postauth_update")
     * @Method("PUT")
     * @Template("KnoxGuruFreeRadiusSqlBundle:Radpostauth:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radpostauth')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Radpostauth entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('postauth_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Radpostauth entity.
     *
     * @Route("/{id}", name="postauth_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('KnoxGuruFreeRadiusSqlBundle:Radpostauth')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Radpostauth entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('postauth'));
    }

    /**
     * Creates a form to delete a Radpostauth entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('postauth_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
