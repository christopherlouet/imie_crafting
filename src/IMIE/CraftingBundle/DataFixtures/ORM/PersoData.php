<?php

namespace IMIE\CraftingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use IMIE\CraftingBundle\Entity\Perso;

class PersoData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $em)
	{

		$params = array (
			array (
				'tag'		=> 'perso-perso1',
				'name' 		=> 'Vôd',
				'level' 	=> 26,
				'class' 	=> 'Avant garde',
				'race' 		=> 'Humain',
				'sexe' 		=> 'Femme',
				'helmet' 	=> 'helmet-helmet3',
				'boot' 		=> 'boot-boot3',
				'leg' 		=> 'leg-leg4',
				'guild' 	=> 'guild-guild1',
			),
			array (
				'tag'		=> 'perso-perso2',
				'name' 		=> 'Sunseta',
				'level' 	=> 40,
				'class' 	=> 'Commando',
				'race' 		=> 'Twilek',
				'sexe' 		=> 'Femme',
				'helmet' 	=> 'helmet-helmet2',
				'boot' 		=> 'boot-boot4',
				'leg' 		=> 'leg-leg1',
				'guild' 	=> 'guild-guild2',
			),
			array (
				'tag'		=> 'perso-perso3',
				'name' 		=> 'Reroll',
				'level' 	=> 35,
				'class' 	=> 'Contrebandier',
				'race' 		=> 'Sith',
				'sexe' 		=> 'Homme',
				'helmet' 	=> 'helmet-helmet1',
				'boot' 		=> 'boot-boot2',
				'leg' 		=> 'leg-leg5',
				'guild' 	=> 'guild-guild1',
			),
			array (
				'tag'		=> 'perso-perso4',
				'name' 		=> 'Kintao',
				'level' 	=> 12,
				'class' 	=> 'Consulaire',
				'race' 		=> 'Humain',
				'sexe' 		=> 'Homme',
				'helmet' 	=> 'helmet-helmet5',
				'boot' 		=> 'boot-boot4',
				'leg' 		=> 'leg-leg1',
				'guild' 	=> 'guild-guild2',
			),
			array (
				'tag'		=> 'perso-perso5',
				'name' 		=> 'Pips',
				'level' 	=> 10,
				'class' 	=> 'Ombre',
				'race' 		=> 'Humain',
				'sexe' 		=> 'Femme',
				'helmet' 	=> 'helmet-helmet1',
				'boot' 		=> 'boot-boot1',
				'leg' 		=> 'leg-leg5',
				'guild' 	=> 'guild-guild1',
			),
		);

		$this->addpersos($em,$params);
	}

	private function addpersos($em, $params){

		foreach ($params as $param)
		{
			$entity = new Perso();

			$entity->setName($param['name']);
	    	$entity->setLevel($param['level']);
	    	$entity->setClass($param['class']);
	    	$entity->setRace($param['race']);
	    	$entity->setSexe($param['sexe']);
	    	$entity->setHelmet($this->getReference($param['helmet']));
	    	$entity->setBoot($this->getReference($param['boot']));
	    	$entity->setLeg($this->getReference($param['leg']));
	    	$entity->setGuild($this->getReference($param['guild']));

			$em->persist($entity);
			$em->flush();
			$this->addReference($param['tag'],$entity);
		}

	}

	public function getOrder()
	{
		return 10;
	}
}