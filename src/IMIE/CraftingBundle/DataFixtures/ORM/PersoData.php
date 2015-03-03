<?php

namespace IMIE\CraftingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use IMIE\CraftingBundle\Entity\Perso;
use Faker;

/**
 * Perso DataFixtures.
 *
 * @author Christopher LOUËT <christopher.louet@yahoo.com>
 *        
 */
class PersoData extends AbstractFixture implements OrderedFixtureInterface {
	
	/**
	 * Load DataFixtures.
	 *
	 * @see \Doctrine\Common\DataFixtures\FixtureInterface::load()
	 */
	public function load(ObjectManager $em) {
		
		// parameters
		$faker = Faker\Factory::create ();
		$params = array ();
		
		// Personnalize DataFixtures for test
		$params [] = array (
				'tag' => 'perso-test1',
				'name' => 'Test1',
				'level' => $faker->numberBetween ( 1, 100 ),
				'class' => $faker->randomElement ( array (
						'avant garde',
						'Commando',
						'Contrebandier',
						'Consulaire',
						'Ombre'
				) ),
				'race' => $faker->randomElement ( array (
						'Humain',
						'Twilek',
						'Sith'
				) ),
				'sexe' => $faker->randomElement ( array (
						'Homme',
						'Femmme'
				) ),
				'helmet' => 'helmet-helmet' . $faker->numberBetween ( 1, 50 ),
				'boot' => 'boot-boot' . $faker->numberBetween ( 1, 50 ),
				'leg' => 'leg-leg' . $faker->numberBetween ( 1, 50 ),
				'guild' => 'guild-guild' . $faker->numberBetween ( 1, 50 )
		);
		
		$params [] = array (
				'tag' => 'perso-test2',
				'name' => 'Test2',
				'level' => $faker->numberBetween ( 1, 100 ),
				'class' => $faker->randomElement ( array (
						'avant garde',
						'Commando',
						'Contrebandier',
						'Consulaire',
						'Ombre'
				) ),
				'race' => $faker->randomElement ( array (
						'Humain',
						'Twilek',
						'Sith'
				) ),
				'sexe' => $faker->randomElement ( array (
						'Homme',
						'Femmme'
				) ),
				'helmet' => 'helmet-helmet' . $faker->numberBetween ( 1, 50 ),
				'boot' => 'boot-boot' . $faker->numberBetween ( 1, 50 ),
				'leg' => 'leg-leg' . $faker->numberBetween ( 1, 50 ),
				'guild' => 'guild-guild' . $faker->numberBetween ( 1, 50 )
		);
		
		for($i = 1; $i <= 50; $i ++) {
			$params [] = array (
					'tag' => 'perso-perso' . $i,
					'name' => $faker->name,
					'level' => $faker->numberBetween ( 1, 100 ),
					'class' => $faker->randomElement ( array (
							'avant garde',
							'Commando',
							'Contrebandier',
							'Consulaire',
							'Ombre' 
					) ),
					'race' => $faker->randomElement ( array (
							'Humain',
							'Twilek',
							'Sith' 
					) ),
					'sexe' => $faker->randomElement ( array (
							'Homme',
							'Femmme' 
					) ),
					'helmet' => 'helmet-helmet' . $faker->numberBetween ( 1, 50 ),
					'boot' => 'boot-boot' . $faker->numberBetween ( 1, 50 ),
					'leg' => 'leg-leg' . $faker->numberBetween ( 1, 50 ),
					'guild' => 'guild-guild' . $faker->numberBetween ( 1, 50 ) 
			);
		}
		;
		
		// add persos with params.
		$this->addpersos ( $em, $params );
	}
	
	/**
	 * Add perso in database.
	 *
	 * @param unknown $em        	
	 * @param unknown $params        	
	 */
	private function addpersos($em, $params) {
		
		// loop param for populate database
		foreach ( $params as $param ) {
			$entity = new Perso ();
			
			$entity->setName ( $param ['name'] );
			$entity->setLevel ( $param ['level'] );
			$entity->setClass ( $param ['class'] );
			$entity->setRace ( $param ['race'] );
			$entity->setSexe ( $param ['sexe'] );
			$entity->setHelmet ( $this->getReference ( $param ['helmet'] ) );
			$entity->setBoot ( $this->getReference ( $param ['boot'] ) );
			$entity->setLeg ( $this->getReference ( $param ['leg'] ) );
			$entity->setGuild ( $this->getReference ( $param ['guild'] ) );
			
			$em->persist ( $entity );
			$em->flush ();
			$this->addReference ( $param ['tag'], $entity );
		}
	}
	
	/**
	 *
	 * Order of the DataFixture.
	 *
	 * @see \Doctrine\Common\DataFixtures\OrderedFixtureInterface::getOrder()
	 */
	public function getOrder() {
		return 10;
	}
}