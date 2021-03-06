<?php

/**
 * Contact data fixtures.
 */
namespace IMIE\CraftingBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use IMIE\CraftingBundle\Entity\Contact;
use Faker;

/**
 * ContactData class.
 *
 * @author Christopher LOUËT <christopher.louet@yahoo.com>
 *        
 */
class ContactData extends AbstractFixture implements OrderedFixtureInterface {
	
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
		
		for($i = 1; $i <= 50; $i ++) {
			$params [] = array (
					'tag' => 'contact-contact' . $i,
					'persoRef' => 'perso-perso' . $faker->numberBetween ( 1, 50 ),
					'perso' => 'perso-perso' . $faker->numberBetween ( 1, 50 ) 
			);
		}
		
		$this->addContacts ( $em, $params );
	}
	
	/**
	 * Add contacts in database.
	 *
	 * @param ObjectManager $em        	
	 * @param array $params        	
	 */
	private function addContacts($em, $params) {
		foreach ( $params as $param ) {
			$entity = new Contact ();
			
			$entity->setPersoRef ( $this->getReference ( $param ['persoRef'] ) );
			$entity->setPerso ( $this->getReference ( $param ['perso'] ) );
			
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
		return 15;
	}
}