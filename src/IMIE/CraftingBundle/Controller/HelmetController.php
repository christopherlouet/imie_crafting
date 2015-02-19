<?php

namespace IMIE\CraftingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IMIE\CraftingBundle\Entity\Helmet;
use IMIE\CraftingBundle\Form\HelmetType;

use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\RequestParam;

/**
 * Helmet controller.
 *
 * @Route("/helmet")
 */
class HelmetController extends Controller
{

    /**
     * Lists all Helmet entities.
     *
     * @Route("/", name="helmet")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IMIECraftingBundle:Helmet')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Helmet entity.
     *
     * @Route("/", name="helmet_create")
     * @Method("POST")
     * @Template("IMIECraftingBundle:Helmet:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Helmet();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('helmet_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Helmet entity.
     *
     * @param Helmet $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Helmet $entity)
    {
        $form = $this->createForm(new HelmetType(), $entity, array(
            'action' => $this->generateUrl('helmet_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Helmet entity.
     *
     * @Route("/new", name="helmet_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Helmet();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Helmet entity.
     *
     * @Route("/{id}", name="helmet_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IMIECraftingBundle:Helmet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Helmet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Helmet entity.
     *
     * @Route("/{id}/edit", name="helmet_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IMIECraftingBundle:Helmet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Helmet entity.');
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
    * Creates a form to edit a Helmet entity.
    *
    * @param Helmet $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Helmet $entity)
    {
        $form = $this->createForm(new HelmetType(), $entity, array(
            'action' => $this->generateUrl('helmet_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Helmet entity.
     *
     * @Route("/{id}", name="helmet_update")
     * @Method("PUT")
     * @Template("IMIECraftingBundle:Helmet:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IMIECraftingBundle:Helmet')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Helmet entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('helmet_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Helmet entity.
     *
     * @Route("/{id}", name="helmet_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IMIECraftingBundle:Helmet')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Helmet entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('helmet'));
    }

    /**
     * Creates a form to delete a Helmet entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('helmet_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    /**
    * Get availalble Helmets.
    *
    * @View()
    * @Get("/helmets")
    * @ApiDoc
    */
    public function getHelmetsAction() {

        $em = $this->getDoctrine()->getManager();
        $helmets = $em->getRepository('IMIECraftingBundle:Helmet')->findAll();
        return array ('helmets' => $helmets);
    }
}
