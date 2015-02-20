<?php

namespace IMIE\CraftingBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IMIE\CraftingBundle\Entity\Boot;
use IMIE\CraftingBundle\Form\BootType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use FOS\RestBundle\Controller\FOSRestController;

/**
 * Boot controller.
 *
 * @Route("/boot")
 */
class BootController extends FOSRestController {
	
	/**
	 * Lists all Boot entities.
	 *
	 * @Route("/", name="boot")
	 * @Method("GET")
	 * @Template()
	 */
	public function indexAction() {
		$em = $this->getDoctrine ()->getManager ();
		
		$entities = $em->getRepository ( 'IMIECraftingBundle:Boot' )->findAll ();
		
		return array (
				'entities' => $entities 
		);
	}
	/**
	 * Creates a new Boot entity.
	 *
	 * @Route("/", name="boot_create")
	 * @Method("POST")
	 * @Template("IMIECraftingBundle:Boot:new.html.twig")
	 */
	public function createAction(Request $request) {
		$entity = new Boot ();
		$form = $this->createCreateForm ( $entity );
		$form->handleRequest ( $request );
		
		if ($form->isValid ()) {
			$em = $this->getDoctrine ()->getManager ();
			$em->persist ( $entity );
			$em->flush ();
			
			return $this->redirect ( $this->generateUrl ( 'boot_show', array (
					'id' => $entity->getId () 
			) ) );
		}
		
		return array (
				'entity' => $entity,
				'form' => $form->createView () 
		);
	}
	
	/**
	 * Creates a form to create a Boot entity.
	 *
	 * @param Boot $entity
	 *        	The entity
	 *        	
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createCreateForm(Boot $entity) {
		$form = $this->createForm ( new BootType (), $entity, array (
				'action' => $this->generateUrl ( 'boot_create' ),
				'method' => 'POST' 
		) );
		
		$form->add ( 'submit', 'submit', array (
				'label' => 'Create' 
		) );
		
		return $form;
	}
	
	/**
	 * Displays a form to create a new Boot entity.
	 *
	 * @Route("/new", name="boot_new")
	 * @Method("GET")
	 * @Template()
	 */
	public function newAction() {
		$entity = new Boot ();
		$form = $this->createCreateForm ( $entity );
		
		return array (
				'entity' => $entity,
				'form' => $form->createView () 
		);
	}
	
	/**
	 * Finds and displays a Boot entity.
	 *
	 * @Route("/{id}", name="boot_show")
	 * @Method("GET")
	 * @Template()
	 */
	public function showAction($id) {
		$em = $this->getDoctrine ()->getManager ();
		
		$entity = $em->getRepository ( 'IMIECraftingBundle:Boot' )->find ( $id );
		
		if (! $entity) {
			throw $this->createNotFoundException ( 'Unable to find Boot entity.' );
		}
		
		$deleteForm = $this->createDeleteForm ( $id );
		
		return array (
				'entity' => $entity,
				'delete_form' => $deleteForm->createView () 
		);
	}
	
	/**
	 * Displays a form to edit an existing Boot entity.
	 *
	 * @Route("/{id}/edit", name="boot_edit")
	 * @Method("GET")
	 * @Template()
	 */
	public function editAction($id) {
		$em = $this->getDoctrine ()->getManager ();
		
		$entity = $em->getRepository ( 'IMIECraftingBundle:Boot' )->find ( $id );
		
		if (! $entity) {
			throw $this->createNotFoundException ( 'Unable to find Boot entity.' );
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
	 * Creates a form to edit a Boot entity.
	 *
	 * @param Boot $entity
	 *        	The entity
	 *        	
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createEditForm(Boot $entity) {
		$form = $this->createForm ( new BootType (), $entity, array (
				'action' => $this->generateUrl ( 'boot_update', array (
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
	 * Edits an existing Boot entity.
	 *
	 * @Route("/{id}", name="boot_update")
	 * @Method("PUT")
	 * @Template("IMIECraftingBundle:Boot:edit.html.twig")
	 */
	public function updateAction(Request $request, $id) {
		$em = $this->getDoctrine ()->getManager ();
		
		$entity = $em->getRepository ( 'IMIECraftingBundle:Boot' )->find ( $id );
		
		if (! $entity) {
			throw $this->createNotFoundException ( 'Unable to find Boot entity.' );
		}
		
		$deleteForm = $this->createDeleteForm ( $id );
		$editForm = $this->createEditForm ( $entity );
		$editForm->handleRequest ( $request );
		
		if ($editForm->isValid ()) {
			$em->flush ();
			
			return $this->redirect ( $this->generateUrl ( 'boot_edit', array (
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
	 * Deletes a Boot entity.
	 *
	 * @Route("/{id}", name="boot_delete")
	 * @Method("DELETE")
	 */
	public function deleteAction(Request $request, $id) {
		$form = $this->createDeleteForm ( $id );
		$form->handleRequest ( $request );
		
		if ($form->isValid ()) {
			$em = $this->getDoctrine ()->getManager ();
			$entity = $em->getRepository ( 'IMIECraftingBundle:Boot' )->find ( $id );
			
			if (! $entity) {
				throw $this->createNotFoundException ( 'Unable to find Boot entity.' );
			}
			
			$em->remove ( $entity );
			$em->flush ();
		}
		
		return $this->redirect ( $this->generateUrl ( 'boot' ) );
	}
	
	/**
	 * Creates a form to delete a Boot entity by id.
	 *
	 * @param mixed $id
	 *        	The entity id
	 *        	
	 * @return \Symfony\Component\Form\Form The form
	 */
	private function createDeleteForm($id) {
		return $this->createFormBuilder ()->setAction ( $this->generateUrl ( 'boot_delete', array (
				'id' => $id 
		) ) )->setMethod ( 'DELETE' )->add ( 'submit', 'submit', array (
				'label' => 'Delete' 
		) )->getForm ();
	}
	
	/**
	 * Get availalble Boots.
	 *
	 * @Rest\Get("boots")
	 * @ApiDoc (
	 * section = "Boot Entity",
	 * description = "get all boots from database"
	 * )
	 */
	public function getBootsAction() {
		$em = $this->getDoctrine ()->getManager ();
		$boots = $em->getRepository ( 'IMIECraftingBundle:Boot' )->findAll ();
		$view = $this->view ( array (
				"boots" => $boots 
		), 200 );
		return $this->handleView ( $view );
	}
	
	/**
	 * Insert Boot.
	 *
	 * @Rest\Post("boot")
	 * @ApiDoc (
	 * section = "Boot Entity",
	 * description = "insert boot in database",
	 * requirements = {
	 * {
	 * "name" = "name",
	 * "dataType" = "string",
	 * "description" = "The name of the boot."
	 * },
	 * {
	 * "name" = "rarity",
	 * "dataType" = "int",
	 * "description" = "The rarity of the boot."
	 * },
	 * {
	 * "name" = "level",
	 * "dataType" = "int",
	 * "description" = "The level of the boot."
	 * },
	 * {
	 * "name" = "weight",
	 * "dataType" = "int",
	 * "description" = "The weight of the boot."
	 * }
	 * },
	 * statusCodes = {
	 * 200 = "Return One successful.",
	 * 406 = "Empty Data."
	 * }
	 * )
	 */
	public function postBootAction() {
		$em = $this->getDoctrine ()->getManager ();
		
		$json = json_decode ( $this->getRequest ()->getContent (), true );
		
		$boot = new Boot ();
		$boot->setName ( $json ['name'] );
		$boot->setRarity ( $json ['rarity'] );
		$boot->setLevel ( $json ['level'] );
		$boot->setWeight ( $json ['weight'] );
		
		$em->persist ( $boot );
		$em->flush ();
		
		if ($boot) {
			$view = $this->view ( array (
					"boot" => $boot 
			), 200 );
		} else {
			$view = $this->view ( array (
					"message" => "Insert error" 
			), 406 );
		}
		
		return $this->handleView ( $view );
	}
	
	/**
	 * Update Helmet.
	 *
	 * @Rest\Put("boot")
	 * @ApiDoc (
	 * section = "Boot Entity",
	 * description = "update boot in database",
	 * requirements = {
	 * {
	 * "name" = "id",
	 * "dataType" = "int",
	 * "description" = "The id of the boot."
	 * },
	 * {
	 * "name" = "name",
	 * "dataType" = "string",
	 * "description" = "The name of the boot."
	 * },
	 * {
	 * "name" = "rarity",
	 * "dataType" = "int",
	 * "description" = "The rarity of the boot."
	 * },
	 * {
	 * "name" = "level",
	 * "dataType" = "int",
	 * "description" = "The level of the boot."
	 * },
	 * {
	 * "name" = "weight",
	 * "dataType" = "int",
	 * "description" = "The weight of the boot."
	 * }
	 * },
	 * statusCodes = {
	 * 200 = "Return One successful.",
	 * 406 = "Empty Data."
	 * }
	 * )
	 */
	public function putBootAction() {
		$em = $this->getDoctrine ()->getManager ();
	
		$json = json_decode ( $this->getRequest ()->getContent (), true );
	
		$boot = $em->getRepository ( 'IMIECraftingBundle:Boot' )->findOneById ( $json ['id'] );
		$boot->setName ( $json ['name'] );
		$boot->setRarity ( $json ['rarity'] );
		$boot->setLevel ( $json ['level'] );
		$boot->setWeight ( $json ['weight'] );
	
		$em->persist ( $boot );
		$em->flush ();
	
		if ($boot) {
			$view = $this->view ( array (
					"boot" => $boot
			), 200 );
		} else {
			$view = $this->view ( array (
					"message" => "Insert error"
			), 406 );
		}
	
		return $this->handleView ( $view );
	}
}
