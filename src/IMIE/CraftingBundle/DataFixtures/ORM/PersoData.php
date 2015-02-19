<?php

namespace IMIE\CraftingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use IMIE\CraftingBundle\Entity\Perso;
use Faker;

class PersoData extends AbstractFixture implements OrderedFixtureInterface {
	public function load(ObjectManager $em) {
		$faker = Faker\Factory::create ();
		$params = array ();
		
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
		
		$this->addpersos ( $em, $params );
	}
	private function addpersos($em, $params) {
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
	public function getOrder() {
		return 10;
	}
}