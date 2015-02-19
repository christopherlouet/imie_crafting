<?php

namespace IMIE\CraftingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use IMIE\CraftingBundle\Entity\Boot;
use Faker;

class BootData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $em)
	{
		$faker = Faker\Factory::create ();
		
		$params = array ();
		
		for($i = 1; $i <= 50; $i ++) {
			$params [] = array (
					'tag'		=> 'boot-boot'.$i,
					'name' 		=> 'boot'.$i,
					'rarity' 	=> $faker->numberBetween ( 1, 10),
					'level' 	=> $faker->numberBetween ( 1, 50 ),
					'weight' 	=> $faker->numberBetween ( 1, 20 ),
			);
		}

		$this->addBoots($em,$params);
		
	}

	private function addBoots($em, $params){

		foreach ($params as $param)
		{
			$entity = new Boot();

			$entity->setName($param['name']);
	    	$entity->setRarity($param['rarity']);
	    	$entity->setLevel($param['level']);
	    	$entity->setWeight($param['weight']);

			$em->persist($entity);
			$em->flush();
			$this->addReference($param['tag'],$entity);
		}

	}

	public function getOrder()
	{
		return 1;
	}
}