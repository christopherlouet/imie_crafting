<?php

namespace IMIE\CraftingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use IMIE\CraftingBundle\Entity\Helmet;

class HelmetData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $em)
	{

		$params = array (
			array (
				'tag'		=> 'helmet-helmet1',
				'name' 		=> 'helmet1',
				'rarity' 	=> 1,
				'level' 	=> 8,
				'weight' 	=> 2,
			),
			array (
				'tag'		=> 'helmet-helmet2',
				'name' 		=> 'helmet2',
				'rarity' 	=> 3,
				'level' 	=> 12,
				'weight' 	=> 4,
			),
			array (
				'tag'		=> 'helmet-helmet3',
				'name' 		=> 'helmet3',
				'rarity' 	=> 5,
				'level' 	=> 25,
				'weight' 	=> 20,
			),
			array (
				'tag'		=> 'helmet-helmet4',
				'name' 		=> 'helmet4',
				'rarity' 	=> 2,
				'level' 	=> 6,
				'weight' 	=> 10,
			),
			array (
				'tag'		=> 'helmet-helmet5',
				'name' 		=> 'helmet5',
				'rarity' 	=> 3,
				'level' 	=> 12,
				'weight' 	=> 10,
			),
			array (
				'tag'		=> 'helmet-helmet6',
				'name' 		=> 'helmet6',
				'rarity' 	=> 4,
				'level' 	=> 10,
				'weight' 	=> 6,
			),
		);

		$this->addHelmets($em,$params);
		
	}

	private function addHelmets($em, $params){

		foreach ($params as $param)
		{
			$entity = new Helmet();

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