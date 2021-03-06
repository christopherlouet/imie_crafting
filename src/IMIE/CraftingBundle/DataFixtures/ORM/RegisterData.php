<?php

/**
 * Register data fixtures.
 */
namespace IMIE\CraftingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use IMIE\CraftingBundle\Entity\Register;
use Faker;

/**
 * RegisterData class.
 *
 * @author Christopher LOUËT <christopher.louet@yahoo.com>
 *        
 */
class RegisterData extends AbstractFixture implements OrderedFixtureInterface {
	
	/**
	 * Load data fixtures.
	 *
	 * @see \Doctrine\Common\DataFixtures\FixtureInterface::load()
	 *
	 * @param ObjectManager $em        	
	 */
	public function load(ObjectManager $em) {
		$faker = Faker\Factory::create ();
		
		$params = array ();
		
		for($i = 1; $i <= 50; $i ++) {
			$params [] = array (
					'tag' => 'register-register' . $i,
					'perso' => 'perso-perso' . $faker->numberBetween ( 1, 50 ),
					'guild' => 'guild-guild' . $faker->numberBetween ( 1, 50 ),
					'level' => $faker->numberBetween ( 1, 50 ),
					'rang' => $faker->numberBetween ( 1, 30 ) 
			);
		}
		
		$this->addRegisters ( $em, $params );
	}
	
	/**
	 * Add registers in database.
	 *
	 * @param ObjectManager $em        	
	 * @param array $params        	
	 */
	private function addRegisters($em, $params) {
		foreach ( $params as $param ) {
			$entity = new Register ();
			
			$entity->setPerso ( $this->getReference ( $param ['perso'] ) );
			$entity->setGuild ( $this->getReference ( $param ['guild'] ) );
			$entity->setLevel ( $param ['level'] );
			$entity->setRang ( $param ['rang'] );
			
			$em->persist ( $entity );
			$em->flush ();
			$this->addReference ( $param ['tag'], $entity );
		}
	}
	/**
	 * Loading order.
	 *
	 * @see \Doctrine\Common\DataFixtures\OrderedFixtureInterface::getOrder()
	 */
	public function getOrder() {
		return 15;
	}
}