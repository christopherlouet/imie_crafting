<?php

/**
 * Contact controller.
 * 
 */
namespace IMIE\CraftingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IMIE\CraftingBundle\Entity\Contact;
use IMIE\CraftingBundle\Form\ContactType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use FOS\RestBundle\Controller\FOSRestController;

/**
 * ContactController class.
 *
 * @Route("/contact")
 */
class ContactController extends FOSRestController {
	
	/**
	 * Lists all Contact entities.
	 *
	 * @Route("/", name="contact")
	 * @Method("GET")
	 * @Template()
	 */
	public function indexAction() {
		$em = $this->getDoctrine ()->getManager ();
		
		$entities = $em->getRepository ( 'IMIECraftingBundle:Contact' )->findAll ();
		
		return array (
				'entities' => $entities 
		);
	}
	/**
	 * Creates a new Contact entity.
	 *
	 * @Route("/", name="contact_create")
	 * @Method("POST")
	 * @Template("IMIECraftingBundle:Contact:new.html.twig")
	 *
	 * @param Request $request        	
	 */
	public function createAction(Request $request) {
		$entity = new Contact ();
		$form = $this->createCreateForm ( $entity );
		$form->handleRequest ( $request );
		
		if ($form->isValid ()) {
			$em = $this->getDoctrine ()->getManager ();
			$em->persist ( $entity );
			$em->flush ();
			
			return $this->redirect ( $this->generateUrl ( 'contact_show', array (
					'id' => $entity->getId () 
			) ) );
		}
		
		return array (
				'entity' => $entity,
				'form' => $form->createView () 
		);
	}
	
	/**
	 * Creates a form to create a Contact entity.
	 *
	 * @param Contact $entity
	 *        	The entity
	 *        	
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createCreateForm(Contact $entity) {
		$form = $this->createForm ( new ContactType (), $entity, array (
				'action' => $this->generateUrl ( 'contact_create' ),
				'method' => 'POST' 
		) );
		
		$form->add ( 'submit', 'submit', array (
				'label' => 'Create' 
		) );
		
		return $form;
	}
	
	/**
	 * Displays a form to create a new Contact entity.
	 *
	 * @Route("/new", name="contact_new")
	 * @Method("GET")
	 * @Template()
	 */
	public function newAction() {
		$entity = new Contact ();
		$form = $this->createCreateForm ( $entity );
		
		return array (
				'entity' => $entity,
				'form' => $form->createView () 
		);
	}
	
	/**
	 * Finds and displays a Contact entity.
	 *
	 * @Route("/{id}", name="contact_show")
	 * @Method("GET")
	 * @Template()
	 *
	 * @param integer $id        	
	 */
	public function showAction($id) {
		$em = $this->getDoctrine ()->getManager ();
		
		$entity = $em->getRepository ( 'IMIECraftingBundle:Contact' )->find ( $id );
		
		if (! $entity) {
			throw $this->createNotFoundException ( 'Unable to find Contact entity.' );
		}
		
		$deleteForm = $this->createDeleteForm ( $id );
		
		return array (
				'entity' => $entity,
				'delete_form' => $deleteForm->createView () 
		);
	}
	
	/**
	 * Displays a form to edit an existing Contact entity.
	 *
	 * @Route("/{id}/edit", name="contact_edit")
	 * @Method("GET")
	 * @Template()
	 *
	 * @param integer $id        	
	 */
	public function editAction($id) {
		$em = $this->getDoctrine ()->getManager ();
		
		$entity = $em->getRepository ( 'IMIECraftingBundle:Contact' )->find ( $id );
		
		if (! $entity) {
			throw $this->createNotFoundException ( 'Unable to find Contact entity.' );
		}
		
		$editForm = $this->createEditForm ( $entity );
		$deleteForm = $this->createDeleteForm ( $id );
		
		return array (
				'entity' => $entity,
				'edit_form' => $editForm->createView (),
				'delete_form' => $deleteForm->createView () 
		);
	}
	
	/**
	 * Creates a form to edit a Contact entity.
	 *
	 * @param Contact $entity
	 *        	The entity
	 *        	
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createEditForm(Contact $entity) {
		$form = $this->createForm ( new ContactType (), $entity, array (
				'action' => $this->generateUrl ( 'contact_update', array (
						'id' => $entity->getId () 
				) ),
				'method' => 'PUT' 
		) );
		
		$form->add ( 'submit', 'submit', array (
				'label' => 'Update' 
		) );
		
		return $form;
	}
	/**
	 * Edits an existing Contact entity.
	 *
	 * @Route("/{id}", name="contact_update")
	 * @Method("PUT")
	 * @Template("IMIECraftingBundle:Contact:edit.html.twig")
	 *
	 * @param Request $request        	
	 * @param integer $id        	
	 */
	public function updateAction(Request $request, $id) {
		$em = $this->getDoctrine ()->getManager ();
		
		$entity = $em->getRepository ( 'IMIECraftingBundle:Contact' )->find ( $id );
		
		if (! $entity) {
			throw $this->createNotFoundException ( 'Unable to find Contact entity.' );
		}
		
		$deleteForm = $this->createDeleteForm ( $id );
		$editForm = $this->createEditForm ( $entity );
		$editForm->handleRequest ( $request );
		
		if ($editForm->isValid ()) {
			$em->flush ();
			
			return $this->redirect ( $this->generateUrl ( 'contact_edit', array (
					'id' => $id 
			) ) );
		}
		
		return array (
				'entity' => $entity,
				'edit_form' => $editForm->createView (),
				'delete_form' => $deleteForm->createView () 
		);
	}
	/**
	 * Deletes a Contact entity.
	 *
	 * @Route("/{id}", name="contact_delete")
	 * @Method("DELETE")
	 *
	 * @param Request $request        	
	 * @param integer $id        	
	 */
	public function deleteAction(Request $request, $id) {
		$form = $this->createDeleteForm ( $id );
		$form->handleRequest ( $request );
		
		if ($form->isValid ()) {
			$em = $this->getDoctrine ()->getManager ();
			$entity = $em->getRepository ( 'IMIECraftingBundle:Contact' )->find ( $id );
			
			if (! $entity) {
				throw $this->createNotFoundException ( 'Unable to find Contact entity.' );
			}
			
			$em->remove ( $entity );
			$em->flush ();
		}
		
		return $this->redirect ( $this->generateUrl ( 'contact' ) );
	}
	
	/**
	 * Creates a form to delete a Contact entity by id.
	 *
	 * @param mixed $id
	 *        	The entity id
	 *        	
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm($id) {
		return $this->createFormBuilder ()->setAction ( $this->generateUrl ( 'contact_delete', array (
				'id' => $id 
		) ) )->setMethod ( 'DELETE' )->add ( 'submit', 'submit', array (
				'label' => 'Delete' 
		) )->getForm ();
	}
	
	/**
	 * Get availalble Contacts.
	 *
	 * @Rest\Get("contacts")
	 * @ApiDoc (
	 * section = "Contact Entity",
	 * description = "get all contacts from database"
	 * )
	 */
	public function getContactsAction() {
		$em = $this->getDoctrine ()->getManager ();
		$contacts = $em->getRepository ( 'IMIECraftingBundle:Contact' )->findAll ();
		$view = $this->view ( array (
				"contacts" => $contacts 
		), 200 );
		return $this->handleView ( $view );
	}
}
