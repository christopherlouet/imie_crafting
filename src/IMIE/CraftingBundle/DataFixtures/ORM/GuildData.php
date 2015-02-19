<?php

namespace IMIE\CraftingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use IMIE\CraftingBundle\Entity\Guild;

class GuildData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $em)
	{

		$params = array (
			array (
				'tag'		=> 'guild-guild1',
				'name' 		=> 'L\'élite de la république',
				'banner' 	=> "http://www.swtorelite.fr/styles/swtor_10_imperial_agent/theme/images/header_class_01.png",
			),
			array (
				'tag'		=> 'guild-guild2',
				'name' 		=> 'Guilde IMIE',
				'banner' 	=> "http://torwars.com/wp-content/uploads/2013/06/SWTOR-logo.jpg",
			),
		);
		$this->addGuilds($em, $params);
		
	}

	private function addGuilds($em, $params){

		foreach ($params as $param)
		{
			$entity = new Guild();

			$entity->setName($param['name']);
	    	$entity->setBanner($param['banner']);

			$em->persist($entity);
			$em->flush();
			$this->addReference($param['tag'],$entity);
		}

	}

	public function getOrder()
	{
		return 5;
	}
}