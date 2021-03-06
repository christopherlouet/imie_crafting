<?php

/**
 * Helmet data fixtures.
 */
namespace IMIE\CraftingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use IMIE\CraftingBundle\Entity\Helmet;
use Faker;

/**
 * HelmetData class.
 *
 * @author Christopher LOUËT <christopher.louet@yahoo.com>
 *        
 */
class HelmetData extends AbstractFixture implements OrderedFixtureInterface {
	
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
		
		// Personnalize DataFixtures for test
		$params [] = array (
				'tag' => 'helmet-dfhelmet1',
				'name' => 'DataFixtureHelmet1',
				'rarity' => $faker->numberBetween ( 1, 10 ),
				'level' => $faker->numberBetween ( 1, 50 ),
				'weight' => $faker->numberBetween ( 1, 20 ) 
		);
		
		$params [] = array (
				'tag' => 'helmet-dfhelmet2',
				'name' => 'DataFixtureHelmet2',
				'rarity' => $faker->numberBetween ( 1, 10 ),
				'level' => $faker->numberBetween ( 1, 50 ),
				'weight' => $faker->numberBetween ( 1, 20 ) 
		);
		
		for($i = 1; $i <= 50; $i ++) {
			$params [] = array (
					'tag' => 'helmet-helmet' . $i,
					'name' => $faker->name,
					'rarity' => $faker->numberBetween ( 1, 10 ),
					'level' => $faker->numberBetween ( 1, 50 ),
					'weight' => $faker->numberBetween ( 1, 20 ) 
			);
		}
		
		$this->addHelmets ( $em, $params );
	}
	
	/**
	 * Add helmets in database.
	 *
	 * @param ObjectManager $em        	
	 * @param array $params        	
	 */
	private function addHelmets($em, $params) {
		foreach ( $params as $param ) {
			$entity = new Helmet ();
			
			$entity->setName ( $param ['name'] );
			$entity->setRarity ( $param ['rarity'] );
			$entity->setLevel ( $param ['level'] );
			$entity->setWeight ( $param ['weight'] );
			
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
		return 1;
	}
}