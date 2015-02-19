<?php

namespace IMIE\CraftingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use IMIE\CraftingBundle\Entity\Leg;

class LegData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $em)
	{

		$params = array (
			array (
				'tag'		=> 'leg-leg1',
				'name' 		=> 'leg1',
				'rarity' 	=> 1,
				'level' 	=> 8,
				'weight' 	=> 2,
			),
			array (
				'tag'		=> 'leg-leg2',
				'name' 		=> 'leg2',
				'rarity' 	=> 3,
				'level' 	=> 12,
				'weight' 	=> 4,
			),
			array (
				'tag'		=> 'leg-leg3',
				'name' 		=> 'leg3',
				'rarity' 	=> 5,
				'level' 	=> 25,
				'weight' 	=> 20,
			),
			array (
				'tag'		=> 'leg-leg4',
				'name' 		=> 'leg4',
				'rarity' 	=> 2,
				'level' 	=> 6,
				'weight' 	=> 10,
			),
			array (
				'tag'		=> 'leg-leg5',
				'name' 		=> 'leg5',
				'rarity' 	=> 3,
				'level' 	=> 12,
				'weight' 	=> 10,
			),
			array (
				'tag'		=> 'leg-leg6',
				'name' 		=> 'leg6',
				'rarity' 	=> 4,
				'level' 	=> 10,
				'weight' 	=> 6,
			),
		);

		$this->addlegs($em,$params);
		
	}

	private function addlegs($em, $params){

		foreach ($params as $param)
		{
			$entity = new Leg();

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