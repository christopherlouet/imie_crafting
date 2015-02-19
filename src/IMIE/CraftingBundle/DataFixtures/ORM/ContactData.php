<?php

namespace IMIE\CraftingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use IMIE\CraftingBundle\Entity\Contact;

class ContactData extends AbstractFixture implements OrderedFixtureInterface
{
	public function load(ObjectManager $em)
	{

		$params = array (
			array (
				'tag'		=> 'contact-contact1',
				'persoRef' 	=> 'perso-perso1',
				'perso' 	=> 'perso-perso2',
			),
			array (
				'tag'		=> 'contact-contact2',
				'persoRef' 	=> 'perso-perso1',
				'perso' 	=> 'perso-perso3',
			),
			array (
				'tag'		=> 'contact-contact3',
				'persoRef' 	=> 'perso-perso1',
				'perso' 	=> 'perso-perso4',
			),
			array (
				'tag'		=> 'contact-contact4',
				'persoRef' 	=> 'perso-perso2',
				'perso' 	=> 'perso-perso4',
			),
			array (
				'tag'		=> 'contact-contact5',
				'persoRef' 	=> 'perso-perso3',
				'perso' 	=> 'perso-perso5',
			),
		);

		$this->addContacts($em, $params);
		
	}

	private function addContacts($em, $params){

		foreach ($params as $param)
		{
			$entity = new Contact();

			$entity->setPersoRef($this->getReference($param['persoRef']));
	    	$entity->setPerso($this->getReference($param['perso']));

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