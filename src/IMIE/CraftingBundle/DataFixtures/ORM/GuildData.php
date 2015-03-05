<?php

/**
 * Guild data fixtures.
 */
namespace IMIE\CraftingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use IMIE\CraftingBundle\Entity\Guild;
use Faker;

/**
 * GuildData class.
 *
 * @author Christopher LOUËT <christopher.louet@yahoo.com>
 *        
 */
class GuildData extends AbstractFixture implements OrderedFixtureInterface {
	
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
				'tag' => 'guild-dfguild1',
				'name' => "DataFixtureGuild1",
				'banner' => $faker->url () 
		);
		
		$params [] = array (
				'tag' => 'guild-dfguild2',
				'name' => "DataFixtureGuild2",
				'banner' => $faker->url () 
		);
		
		for($i = 1; $i <= 50; $i ++) {
			$params [] = array (
					'tag' => 'guild-guild' . $i,
					'name' => $faker->company,
					'banner' => $faker->url () 
			);
		}
		
		$this->addGuilds ( $em, $params );
	}
	
	/**
	 * Add guilds in database.
	 *
	 * @param ObjectManager $em        	
	 * @param array $params        	
	 */
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
	
	/**
	 * Loading order.
	 *
	 * @see \Doctrine\Common\DataFixtures\OrderedFixtureInterface::getOrder()
	 */
	public function getOrder() {
		return 5;
	}
}