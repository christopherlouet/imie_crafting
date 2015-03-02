<?php

namespace IMIE\CraftingBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BootControllerTest extends WebTestCase {
	public function testCompleteScenario() {
		// Create a new client to browse the application
		$client = static::createClient ();
		
		// Create a new entry in the database
		$crawler = $client->request ( 'GET', '/boot/' );
		$this->assertEquals ( 200, $client->getResponse ()->getStatusCode (), "Unexpected HTTP status code for GET /boot/" );
		$crawler = $client->click ( $crawler->selectLink ( 'Create a new entry' )->link () );
		
		// Fill in the form and submit it
		$form = $crawler->selectButton ( 'Create' )->form ( array (
				'imie_craftingbundle_boot[name]' => 'Test',
				'imie_craftingbundle_boot[rarity]' => 10,
				'imie_craftingbundle_boot[level]' => 20,
				'imie_craftingbundle_boot[weight]' =>150 
		) );
		
		$client->submit ( $form );
		$crawler = $client->followRedirect ();
		
		// Check data in the show view
		$this->assertGreaterThan ( 0, $crawler->filter ( 'td:contains("Test")' )->count (), 'Missing element td:contains("Test")' );
		
		// Edit the entity
		$crawler = $client->click ( $crawler->selectLink ( 'Edit' )->link () );
		
		$form = $crawler->selectButton ( 'Update' )->form ( array (
				'imie_craftingbundle_boot[name]' => 'Foo',
				'imie_craftingbundle_boot[rarity]' => 12,
				'imie_craftingbundle_boot[level]' => 40,
				'imie_craftingbundle_boot[weight]' => 8,
		)
		 );
		
		$client->submit ( $form );
		$crawler = $client->followRedirect ();
		
		// Check the element contains an attribute with value equals "Foo"
		$this->assertGreaterThan ( 0, $crawler->filter ( '[value="Foo"]' )->count (), 'Missing element [value="Foo"]' );
		
		// Delete the entity
		$client->submit ( $crawler->selectButton ( 'Delete' )->form () );
		$crawler = $client->followRedirect ();
		
		// Check the entity has been delete on the list
		$this->assertNotRegExp ( '/Foo/', $client->getResponse ()->getContent () );
	}
}
