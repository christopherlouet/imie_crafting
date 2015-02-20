<?php

namespace IMIE\CraftingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IMIE\CraftingBundle\Entity\Leg;
use IMIE\CraftingBundle\Form\LegType;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\RequestParam;

/**
 * Leg controller.
 *
 * @Route("/leg")
 */
class LegController extends Controller
{

    /**
     * Lists all Leg entities.
     *
     * @Route("/", name="leg")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IMIECraftingBundle:Leg')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Leg entity.
     *
     * @Route("/", name="leg_create")
     * @Method("POST")
     * @Template("IMIECraftingBundle:Leg:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Leg();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('leg_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Leg entity.
     *
     * @param Leg $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Leg $entity)
    {
        $form = $this->createForm(new LegType(), $entity, array(
            'action' => $this->generateUrl('leg_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Leg entity.
     *
     * @Route("/new", name="leg_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Leg();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Leg entity.
     *
     * @Route("/{id}", name="leg_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IMIECraftingBundle:Leg')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Leg entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Leg entity.
     *
     * @Route("/{id}/edit", name="leg_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IMIECraftingBundle:Leg')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Leg entity.');
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
    * Creates a form to edit a Leg entity.
    *
    * @param Leg $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Leg $entity)
    {
        $form = $this->createForm(new LegType(), $entity, array(
            'action' => $this->generateUrl('leg_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Leg entity.
     *
     * @Route("/{id}", name="leg_update")
     * @Method("PUT")
     * @Template("IMIECraftingBundle:Leg:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IMIECraftingBundle:Leg')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Leg entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('leg_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Leg entity.
     *
     * @Route("/{id}", name="leg_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IMIECraftingBundle:Leg')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Leg entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('leg'));
    }

    /**
     * Creates a form to delete a Leg entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('leg_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
    * Get availalble Legs.
    *
    * @View()
    * @Get("/legs")
    * @ApiDoc (
    * section = "Leg Entity"
    * 
    * )
    */
    public function getLegsAction() {

        $em = $this->getDoctrine()->getManager();
        $legs = $em->getRepository('IMIECraftingBundle:Leg')->findAll();
        return array ('helmets' => $legs);
    }
}
