<?php

namespace Swtorelite\CraftingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Swtorelite\CraftingBundle\Entity\Leg;

class LegData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $em)
	{

		$params = array (
			array (
				'tag'		=> 'boot-boot1'
				'name' 		=> 'boot1',
				'rarity' 	=> 1,
				'level' 	=> 8,
				'weight' 	=> 2,
			),
			array (
				'tag'		=> 'boot-boot2'
				'name' 		=> 'boot2',
				'rarity' 	=> 3,
				'level' 	=> 12,
				'weight' 	=> 4,
			),
			array (
				'tag'		=> 'boot-boot3'
				'name' 		=> 'boot3',
				'rarity' 	=> 5,
				'level' 	=> 25,
				'weight' 	=> 20,
			),
			array (
				'tag'		=> 'boot-boot4'
				'name' 		=> 'boot4',
				'rarity' 	=> 2,
				'level' 	=> 6,
				'weight' 	=> 10,
			),
			array (
				'tag'		=> 'boot-boot5'
				'name' 		=> 'boot5',
				'rarity' 	=> 3,
				'level' 	=> 12,
				'weight' 	=> 10,
			),
			array (
				'tag'		=> 'boot-boot6'
				'name' 		=> 'boot6',
				'rarity' 	=> 4,
				'level' 	=> 10,
				'weight' 	=> 6,
			),
		);
		
	}

	private function addBoot($em, $params){

		foreach ($params as $param)
		{
			$entity = new Boot();

			$entity->setName($param['name'])
	    	$entity->setRarity($param['rarity'])
	    	$entity->setLevel($param['level'])
	    	$entity->setWeight($param['weight'])

			$em->persist($entity);
			$em->flush();
			$this->addReference($param['tag'] $entity);
		}

	}

	public function getOrder()
	{
		return 1;
	}
}