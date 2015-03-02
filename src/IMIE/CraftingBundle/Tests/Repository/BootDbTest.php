<?php

namespace IMIE\CraftingBundle\Tests\Repository;

use IMIE\CraftingBundle\Entity\Boot;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BootDbTest extends WebTestCase {
	
	/**
	 *
	 * @var \Doctrine\ORM\EntityManager
	 */
	private $em;
	private $repository;
	
	/**
	 * Boot Kernel, get Entity Manger, get Boot repository.
	 */
	public function setUp() {
		static::$kernel = static::createKernel ();
		static::$kernel->boot ();
		$this->em = static::$kernel->getContainer ()->get ( 'doctrine.orm.entity_manager' );
		$this->repository = $this->em->getRepository ( 'IMIECraftingBundle:Boot' );
	}
	
	/**
	 * Search a boot by id.
	 */
	public function testSearchOneById() {
		
		$boot = new Boot ();
		$boot->setName ( 'test' );
		$boot->setLevel ( 1 );
		$boot->setRarity ( 1 );
		$boot->setWeight ( 1 );
		
		$this->em->persist ( $boot );
		$this->em->flush();
		
		$bootTest = $this->repository->findOneById ( $boot->getId () );
		
		$this->assertEquals( $boot, $bootTest );
	}
}