<?php

namespace IMIE\CraftingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use IMIE\CraftingBundle\Entity\Register;

class RegisterData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $em)
	{

		$params = array (
			array (
				'tag'		=> 'register-register1',
				'perso' 	=> 'perso-perso1',
				'guild' 	=> 'guild-guild1',
				'level' 	=> 12,
				'rang' 		=> 3,
			),
			array (
				'tag'		=> 'register-register2',
				'perso' 	=> 'perso-perso1',
				'guild' 	=> 'guild-guild2',
				'level' 	=> 18,
				'rang' 		=> 4,
			),
			array (
				'tag'		=> 'register-register3',
				'perso' 	=> 'perso-perso2',
				'guild' 	=> 'guild-guild1',
				'level' 	=> 15,
				'rang' 		=> 4,
			),
			array (
				'tag'		=> 'register-register4',
				'perso' 	=> 'perso-perso3',
				'guild' 	=> 'guild-guild2',
				'level' 	=> 20,
				'rang' 		=> 5,
			),
			array (
				'tag'		=> 'register-register5',
				'perso' 	=> 'perso-perso4',
				'guild' 	=> 'guild-guild1',
				'level' 	=> 25,
				'rang' 		=> 7,
			),
		);

		$this->addRegisters($em,$params);
	}

	private function addRegisters($em, $params){

		foreach ($params as $param)
		{
			$entity = new Register();

	    	$entity->setPerso($this->getReference($param['perso']));
	    	$entity->setGuild($this->getReference($param['guild']));
	    	$entity->setLevel($param['level']);
	    	$entity->setRang($param['rang']);

			$em->persist($entity);
			$em->flush();
			$this->addReference($param['tag'],$entity);
		}

	}

	public function getOrder()
	{
		return 15;
	}
}