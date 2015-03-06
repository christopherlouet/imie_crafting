<?php

/**
 * Boot service for json-rpc API.
 * 
 */
namespace IMIE\CraftingBundle\Service;

use Doctrine\ORM\EntityManager;

/**
 * BootService class.
 *
 * @author Christopher LOUËT <christopher.louet@yahoo.com>
 *        
 */
class BootService {
	
	/**
	 *
	 * @var EntityManager
	 */
	protected $em;
	
	/**
	 * BootService contructor.
	 *
	 * @param EntityManager $entityManager        	
	 */
	public function __construct(EntityManager $entityManager) {
		$this->em = $entityManager;
	}
	
	/**
	 * Get availalble Boots.
	 */
	public function getBootsAction() {
		
		// get boots
		$boots = $this->em->getRepository ( 'IMIECraftingBundle:Boot' )->findAll ();
		
		return $boots;
	}
}