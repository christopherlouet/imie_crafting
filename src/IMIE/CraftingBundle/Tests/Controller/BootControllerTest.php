<?php

namespace IMIE\CraftingBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Boot controller tests.
 *
 * @author Christopher LOUËT <christopher.louet@yahoo.com>
 *        
 */
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
				'imie_craftingbundle_boot[name]' => 'TestName',
				'imie_craftingbundle_boot[rarity]' => 10,
				'imie_craftingbundle_boot[level]' => 20,
				'imie_craftingbundle_boot[weight]' => 30 
		) );
		
		$client->submit ( $form );
		$crawler = $client->followRedirect ();
		
		// Check data in the show view
		$this->assertGreaterThan ( 0, $crawler->filter ( 'td:contains("TestName")' )->count (), 'Missing element td:contains("TestName")' );
		$this->assertGreaterThan ( 0, $crawler->filter ( 'td:contains("10")' )->count (), 'Missing element rarity td:contains("10")' );
		$this->assertGreaterThan ( 0, $crawler->filter ( 'td:contains("20")' )->count (), 'Missing element level td:contains("20")' );
		$this->assertGreaterThan ( 0, $crawler->filter ( 'td:contains("30")' )->count (), 'Missing element weight td:contains("30")' );
		
		// Edit the entity
		$crawler = $client->click ( $crawler->selectLink ( 'Edit' )->link () );
		
		$form = $crawler->selectButton ( 'Update' )->form ( array (
				'imie_craftingbundle_boot[name]' => 'FooName',
				'imie_craftingbundle_boot[rarity]' => 40,
				'imie_craftingbundle_boot[level]' => 50,
				'imie_craftingbundle_boot[weight]' => 60 
		) );
		
		$client->submit ( $form );
		$crawler = $client->followRedirect ();
		
		// Check the element contains an attribute with value equals "Foo"
		$this->assertGreaterThan ( 0, $crawler->filter ( '[value="FooName"]' )->count (), 'Missing element [value="FooName"]' );
		$this->assertGreaterThan ( 0, $crawler->filter ( '[value="40"]' )->count (), 'Missing element rarity [value="40"]' );
		$this->assertGreaterThan ( 0, $crawler->filter ( '[value="50"]' )->count (), 'Missing element level [value="50"]' );
		$this->assertGreaterThan ( 0, $crawler->filter ( '[value="60"]' )->count (), 'Missing element weight [value="60"]' );
		
		// Delete the entity
		$client->submit ( $crawler->selectButton ( 'Delete' )->form () );
		$crawler = $client->followRedirect ();
		
		// Check the entity has been delete on the list
		$this->assertNotRegExp ( '/FooName/', $client->getResponse ()->getContent () );
	}
}
