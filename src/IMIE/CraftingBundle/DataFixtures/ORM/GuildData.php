<?php

namespace IMIE\CraftingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use IMIE\CraftingBundle\Entity\Guild;
use Faker;

class GuildData extends AbstractFixture implements OrderedFixtureInterface {
	public function load(ObjectManager $em) {
		
		$faker = Faker\Factory::create ();
		$params = array ();
		
		for($i = 1; $i <= 50; $i ++) {
			$params [] = array (
					'tag' => 'guild-guild'.$i,
					'name' => $faker->name(),
					'banner' => $faker->url() 
			);
		}
		
		$this->addGuilds ( $em, $params );
	}
	private function addGuilds($em, $params) {
		foreach ( $params as $param ) {
			$entity = new Guild ();
			
			$entity->setName ( $param ['name'] );
			$entity->setBanner ( $param ['banner'] );
			
			$em->persist ( $entity );
			$em->flush ();
			$this->addReference ( $param ['tag'], $entity );
		}
	}
	public function getOrder() {
		return 5;
	}
}