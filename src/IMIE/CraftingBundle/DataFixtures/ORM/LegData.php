<?php

namespace IMIE\CraftingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use IMIE\CraftingBundle\Entity\Leg;
use Faker;

class LegData extends AbstractFixture implements OrderedFixtureInterface {
	public function load(ObjectManager $em) {
		$faker = Faker\Factory::create ();
		
		$params = array ();
		
		// Personnalize DataFixtures for test
		$params [] = array (
				'tag' => 'leg-dfleg1',
				'name' => 'DataFixtureLeg1',
				'rarity' => $faker->numberBetween ( 1, 10 ),
				'level' => $faker->numberBetween ( 1, 50 ),
				'weight' => $faker->numberBetween ( 1, 20 ) 
		);
		
		$params [] = array (
				'tag' => 'leg-dfleg2',
				'name' => 'DataFixtureLeg2',
				'rarity' => $faker->numberBetween ( 1, 10 ),
				'level' => $faker->numberBetween ( 1, 50 ),
				'weight' => $faker->numberBetween ( 1, 20 ) 
		);
		
		for($i = 1; $i <= 50; $i ++) {
			$params [] = array (
					'tag' => 'leg-leg' . $i,
					'name' => $faker->name,
					'rarity' => $faker->numberBetween ( 1, 10 ),
					'level' => $faker->numberBetween ( 1, 50 ),
					'weight' => $faker->numberBetween ( 1, 20 ) 
			);
		}
		$this->addlegs ( $em, $params );
	}
	private function addlegs($em, $params) {
		foreach ( $params as $param ) {
			$entity = new Leg ();
			
			$entity->setName ( $param ['name'] );
			$entity->setRarity ( $param ['rarity'] );
			$entity->setLevel ( $param ['level'] );
			$entity->setWeight ( $param ['weight'] );
			
			$em->persist ( $entity );
			$em->flush ();
			$this->addReference ( $param ['tag'], $entity );
		}
	}
	public function getOrder() {
		return 1;
	}
}