<?php

/**
 * Guild controller tests.
 */
namespace IMIE\CraftingBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * GuildControllerTest class.
 *
 * @author Christopher LOUËT <christopher.louet@yahoo.com>
 *        
 */
class GuildControllerTest extends WebTestCase {
	
	/**
	 * Test a complete scenario.
	 */
	public function testCompleteScenario() {
		// Create a new client to browse the application
		$client = static::createClient ();
		
		// Create a new entry in the database
		$crawler = $client->request ( 'GET', '/guild/' );
		$this->assertEquals ( 200, $client->getResponse ()->getStatusCode (), "Unexpected HTTP status code for GET /guild/" );
		$crawler = $client->click ( $crawler->selectLink ( 'Create a new entry' )->link () );
		
		// Fill in the form and submit it
		$form = $crawler->selectButton ( 'Create' )->form ( array (
				'imie_craftingbundle_guild[name]' => 'TestName',
				'imie_craftingbundle_guild[banner]' => 'http://test.com' 
		) );
		
		$client->submit ( $form );
		$crawler = $client->followRedirect ();
		
		// Check data in the show view
		$this->assertGreaterThan ( 0, $crawler->filter ( 'td:contains("TestName")' )->count (), 'Missing element td:contains("TestName")' );
		$this->assertGreaterThan ( 0, $crawler->filter ( 'td:contains("http://test.com")' )->count (), 'Missing element td:contains("http://test.com")' );
		
		// Edit the entity
		$crawler = $client->click ( $crawler->selectLink ( 'Edit' )->link () );
		
		$form = $crawler->selectButton ( 'Update' )->form ( array (
				'imie_craftingbundle_guild[name]' => 'FooName',
				'imie_craftingbundle_guild[banner]' => 'http://foo.com' 
		) );
		
		$client->submit ( $form );
		$crawler = $client->followRedirect ();
		
		// Check the element contains an attribute with value equals "Foo"
		$this->assertGreaterThan ( 0, $crawler->filter ( '[value="FooName"]' )->count (), 'Missing element [value="FooName"]' );
		$this->assertGreaterThan ( 0, $crawler->filter ( '[value="http://foo.com"]' )->count (), 'Missing element [value="http://foo.com"]' );
		
		// Delete the entity
		$client->submit ( $crawler->selectButton ( 'Delete' )->form () );
		$crawler = $client->followRedirect ();
		
		// Check the entity has been delete on the list
		$this->assertNotRegExp ( '/FooName/', $client->getResponse ()->getContent () );
	}
}
