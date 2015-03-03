<?php

namespace IMIE\CraftingBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase {
	
	/**
	 * Test a complete scenario in the Contact controller.
	 * 
	 */
	public function testCompleteScenario() {
		
		// Create a new client to browse the application
		$client = static::createClient ();
		
		// Create a new entry in the database
		$crawler = $client->request ( 'GET', '/contact/' );
		$this->assertEquals ( 200, $client->getResponse ()->getStatusCode (), "Unexpected HTTP status code for GET /contact/" );
		$crawler = $client->click ( $crawler->selectLink ( 'Create a new entry' )->link () );
		
		// Fill in the form and submit it
		$persoRef = $crawler->filter ( '#imie_craftingbundle_contact_persoRef option:contains("Test1")' )->attr ( 'value' );
		$perso = $crawler->filter ( '#imie_craftingbundle_contact_perso option:contains("Test2")' )->attr ( 'value' );
		
		$form = $crawler->selectButton ( 'Create' )->form ();
		$form ['imie_craftingbundle_contact[persoRef]']->select ( $persoRef );
		$form ['imie_craftingbundle_contact[perso]']->select ( $perso );
		
		$client->submit ( $form );
		$crawler = $client->followRedirect ();
		
		// Check data in the show view
		$this->assertGreaterThan ( 0, $crawler->filter ( 'td:contains("Test1")' )->count (), 'Missing element td:contains("Test1")' );
		$this->assertGreaterThan ( 0, $crawler->filter ( 'td:contains("Test2")' )->count (), 'Missing element td:contains("Test2")' );
		$idContact = $crawler->filter ( ' #idContact' )->text();
		
		// Edit the entity
		$crawler = $client->click ( $crawler->selectLink ( 'Edit' )->link () );
		$persoRef = $crawler->filter ( '#imie_craftingbundle_contact_persoRef option:contains("Test2")' )->attr ( 'value' );
		$perso = $crawler->filter ( '#imie_craftingbundle_contact_perso option:contains("Test1")' )->attr ( 'value' );
		
		$form = $crawler->selectButton ( 'Update' )->form ( array (
				'imie_craftingbundle_contact[perso]' => $persoRef,
				'imie_craftingbundle_contact[persoRef]' => $perso,
		) );
		
		$client->submit ( $form );
		$crawler = $client->followRedirect ();
		
		// Check the element contains an attribute with value equals "Foo"
		$this->assertGreaterThan ( 0, $crawler->filter ( 'option[selected="selected"]:contains("Test1")' )->count (), 'Missing element td:contains("Test1")' );
		$this->assertGreaterThan ( 0, $crawler->filter ( 'option[selected="selected"]:contains("Test2")' )->count (), 'Missing element td:contains("Test2")' );
		
		// Delete the entity
		$client->submit ( $crawler->selectButton ( 'Delete' )->form () );
		$crawler = $client->followRedirect ();
		
		// Check the entity has been delete on the list
		$this->assertNotRegExp ( '/'.$idContact.'/', $client->getResponse ()->getContent () );
	}
}
