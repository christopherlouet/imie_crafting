<?php

namespace IMIE\CraftingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use IMIE\CraftingBundle\Entity\Register;
use Faker;

class RegisterData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $em)
	{
		
		$faker = Faker\Factory::create ();
		
		$params = array ();
		
		for($i = 1; $i <= 50; $i ++) {
			$params [] = array (
				'tag'		=> 'register-register'.$i,
				'perso' 	=> 'perso-perso'.$faker->numberBetween ( 1, 50),
				'guild' 	=> 'guild-guild'.$faker->numberBetween ( 1, 50),
				'level' 	=> $faker->numberBetween ( 1, 50),
				'rang' 		=> $faker->numberBetween ( 1, 30),
			);
		}

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