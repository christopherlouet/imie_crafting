<?php

/**
 * Register controller.
 */
namespace IMIE\CraftingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IMIE\CraftingBundle\Entity\Register;
use IMIE\CraftingBundle\Form\RegisterType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use FOS\RestBundle\Controller\FOSRestController;

/**
 * RegisterController class.
 *
 * @Route("/register")
 */
class RegisterController extends FOSRestController {
	
	/**
	 * Lists all Register entities.
	 *
	 * @Route("/", name="register")
	 * @Method("GET")
	 * @Template()
	 */
	public function indexAction() {
		$em = $this->getDoctrine ()->getManager ();
		
		$entities = $em->getRepository ( 'IMIECraftingBundle:Register' )->findAll ();
		
		return array (
				'entities' => $entities 
		);
	}
	/**
	 * Creates a new Register entity.
	 *
	 * @Route("/", name="register_create")
	 * @Method("POST")
	 * @Template("IMIECraftingBundle:Register:new.html.twig")
	 *
	 * @param Request $request        	
	 */
	public function createAction(Request $request) {
		$entity = new Register ();
		$form = $this->createCreateForm ( $entity );
		$form->handleRequest ( $request );
		
		if ($form->isValid ()) {
			$em = $this->getDoctrine ()->getManager ();
			$em->persist ( $entity );
			$em->flush ();
			
			return $this->redirect ( $this->generateUrl ( 'register_show', array (
					'id' => $entity->getId () 
			) ) );
		}
		
		return array (
				'entity' => $entity,
				'form' => $form->createView () 
		);
	}
	
	/**
	 * Creates a form to create a Register entity.
	 *
	 * @param Register $entity
	 *        	The entity
	 *        	
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createCreateForm(Register $entity) {
		$form = $this->createForm ( new RegisterType (), $entity, array (
				'action' => $this->generateUrl ( 'register_create' ),
				'method' => 'POST' 
		) );
		
		$form->add ( 'submit', 'submit', array (
				'label' => 'Create' 
		) );
		
		return $form;
	}
	
	/**
	 * Displays a form to create a new Register entity.
	 *
	 * @Route("/new", name="register_new")
	 * @Method("GET")
	 * @Template()
	 */
	public function newAction() {
		$entity = new Register ();
		$form = $this->createCreateForm ( $entity );
		
		return array (
				'entity' => $entity,
				'form' => $form->createView () 
		);
	}
	
	/**
	 * Finds and displays a Register entity.
	 *
	 * @Route("/{id}", name="register_show")
	 * @Method("GET")
	 * @Template()
	 *
	 * @param integer $id        	
	 */
	public function showAction($id) {
		$em = $this->getDoctrine ()->getManager ();
		
		$entity = $em->getRepository ( 'IMIECraftingBundle:Register' )->find ( $id );
		
		if (! $entity) {
			throw $this->createNotFoundException ( 'Unable to find Register entity.' );
		}
		
		$deleteForm = $this->createDeleteForm ( $id );
		
		return array (
				'entity' => $entity,
				'delete_form' => $deleteForm->createView () 
		);
	}
	
	/**
	 * Displays a form to edit an existing Register entity.
	 *
	 * @Route("/{id}/edit", name="register_edit")
	 * @Method("GET")
	 * @Template()
	 *
	 * @param integer $id        	
	 */
	public function editAction($id) {
		$em = $this->getDoctrine ()->getManager ();
		
		$entity = $em->getRepository ( 'IMIECraftingBundle:Register' )->find ( $id );
		
		if (! $entity) {
			throw $this->createNotFoundException ( 'Unable to find Register entity.' );
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
	 * Creates a form to edit a Register entity.
	 *
	 * @param Register $entity
	 *        	The entity
	 *        	
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createEditForm(Register $entity) {
		$form = $this->createForm ( new RegisterType (), $entity, array (
				'action' => $this->generateUrl ( 'register_update', array (
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
	 * Edits an existing Register entity.
	 *
	 * @Route("/{id}", name="register_update")
	 * @Method("PUT")
	 * @Template("IMIECraftingBundle:Register:edit.html.twig")
	 *
	 * @param Request $request        	
	 * @param integer $id        	
	 */
	public function updateAction(Request $request, $id) {
		$em = $this->getDoctrine ()->getManager ();
		
		$entity = $em->getRepository ( 'IMIECraftingBundle:Register' )->find ( $id );
		
		if (! $entity) {
			throw $this->createNotFoundException ( 'Unable to find Register entity.' );
		}
		
		$deleteForm = $this->createDeleteForm ( $id );
		$editForm = $this->createEditForm ( $entity );
		$editForm->handleRequest ( $request );
		
		if ($editForm->isValid ()) {
			$em->flush ();
			
			return $this->redirect ( $this->generateUrl ( 'register_edit', array (
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
	 * Deletes a Register entity.
	 *
	 * @Route("/{id}", name="register_delete")
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
			$entity = $em->getRepository ( 'IMIECraftingBundle:Register' )->find ( $id );
			
			if (! $entity) {
				throw $this->createNotFoundException ( 'Unable to find Register entity.' );
			}
			
			$em->remove ( $entity );
			$em->flush ();
		}
		
		return $this->redirect ( $this->generateUrl ( 'register' ) );
	}
	
	/**
	 * Creates a form to delete a Register entity by id.
	 *
	 * @param mixed $id
	 *        	The entity id
	 *        	
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm($id) {
		return $this->createFormBuilder ()->setAction ( $this->generateUrl ( 'register_delete', array (
				'id' => $id 
		) ) )->setMethod ( 'DELETE' )->add ( 'submit', 'submit', array (
				'label' => 'Delete' 
		) )->getForm ();
	}
	
	/**
	 * Insert Register.
	 *
	 * @Rest\Post("register")
	 * @ApiDoc (
	 * section = "Register Entity",
	 * description = "insert register in database",
	 * requirements = {
	 * {
	 * "name" = "perso",
	 * "dataType" = "int",
	 * "description" = "The perso id of the register."
	 * },
	 * {
	 * "name" = "guild",
	 * "dataType" = "int",
	 * "description" = "The guild id of the register."
	 * },
	 * {
	 * "name" = "level",
	 * "dataType" = "int",
	 * "description" = "The level of the register."
	 * },
	 * {
	 * "name" = "rang",
	 * "dataType" = "int",
	 * "description" = "The rang of the register."
	 * }
	 * },
	 * statusCodes = {
	 * 200 = "Return One successful.",
	 * 406 = "Empty Data."
	 * }
	 * )
	 */
	public function postRegisterAction() {
		$em = $this->getDoctrine ()->getManager ();
		
		$json = json_decode ( $this->getRequest ()->getContent (), true );
		
		$register = new Register ();
		$register->setName ( $json ['perso'] );
		$register->setRarity ( $json ['guild'] );
		$register->setLevel ( $json ['level'] );
		$register->setWeight ( $json ['rang'] );
		
		$em->persist ( $register );
		$em->flush ();
		
		if ($register) {
			$view = $this->view ( array (
					"register" => $register 
			), 200 );
		} else {
			$view = $this->view ( array (
					"message" => "Insert error" 
			), 406 );
		}
		
		return $this->handleView ( $view );
	}
}
