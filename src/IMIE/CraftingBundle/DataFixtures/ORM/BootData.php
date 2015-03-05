<?php

/**
 * Boot data fixtures.
 */
namespace IMIE\CraftingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use IMIE\CraftingBundle\Entity\Boot;
use Faker;
use Doctrine\ORM\EntityManager;

/**
 * BootData class.
 *
 * @author Christopher LOUËT <christopher.louet@yahoo.com>
 *        
 */
class BootData extends AbstractFixture implements OrderedFixtureInterface {
	
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
				'tag' => 'boot-dfboot1',
				'name' => 'DataFixtureBoot1',
				'rarity' => $faker->numberBetween ( 1, 10 ),
				'level' => $faker->numberBetween ( 1, 50 ),
				'weight' => $faker->numberBetween ( 1, 20 ) 
		);
		
		$params [] = array (
				'tag' => 'boot-dfboot2',
				'name' => 'DataFixtureBoot2',
				'rarity' => $faker->numberBetween ( 1, 10 ),
				'level' => $faker->numberBetween ( 1, 50 ),
				'weight' => $faker->numberBetween ( 1, 20 ) 
		);
		
		for($i = 1; $i <= 50; $i ++) {
			$params [] = array (
					'tag' => 'boot-boot' . $i,
					'name' => $faker->name,
					'rarity' => $faker->numberBetween ( 1, 10 ),
					'level' => $faker->numberBetween ( 1, 50 ),
					'weight' => $faker->numberBetween ( 1, 20 ) 
			);
		}
		
		$this->addBoots ( $em, $params );
	}
	
	/**
	 * Add boots in database.
	 *
	 * @param ObjectManager $em        	
	 * @param array $params        	
	 */
	private function addBoots($em, $params) {
		foreach ( $params as $param ) {
			$entity = new Boot ();
			
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