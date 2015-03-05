<?php

/**
 * Register controller tests.
 */
namespace IMIE\CraftingBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * RegisterControllerTest class.
 *
 * @author Christopher LOUËT <christopher.louet@yahoo.com>
 *        
 */
class RegisterControllerTest extends WebTestCase {
	
	/**
	 * Test a complete scenario.
	 */
	public function testCompleteScenario() {
		// Create a new client to browse the application
		$client = static::createClient ();
		
		// Create a new entry in the database
		$crawler = $client->request ( 'GET', '/register/' );
		$this->assertEquals ( 200, $client->getResponse ()->getStatusCode (), "Unexpected HTTP status code for GET /register/" );
		$crawler = $client->click ( $crawler->selectLink ( 'Create a new entry' )->link () );
		
		$dfPerso1 = $crawler->filter ( '#imie_craftingbundle_register_perso option:contains("DataFixturePerso1")' )->attr ( 'value' );
		$dfGuild1 = $crawler->filter ( '#imie_craftingbundle_register_guild option:contains("DataFixtureGuild1")' )->attr ( 'value' );
		
		$dfPerso2 = $crawler->filter ( '#imie_craftingbundle_register_perso option:contains("DataFixturePerso2")' )->attr ( 'value' );
		$dfGuild2 = $crawler->filter ( '#imie_craftingbundle_register_guild option:contains("DataFixtureGuild2")' )->attr ( 'value' );
		
		// Fill in the form and submit it
		$form = $crawler->selectButton ( 'Create' )->form ( array (
				'imie_craftingbundle_register[level]' => 10,
				'imie_craftingbundle_register[rang]' => 20,
				'imie_craftingbundle_register[perso]' => $dfPerso1,
				'imie_craftingbundle_register[guild]' => $dfGuild1 
		) );
		
		$client->submit ( $form );
		$crawler = $client->followRedirect ();
		
		// Check data in the show view
		$this->assertGreaterThan ( 0, $crawler->filter ( 'td:contains("10")' )->count (), 'Missing element level td:contains("10")' );
		$this->assertGreaterThan ( 0, $crawler->filter ( 'td:contains("20")' )->count (), 'Missing element rang td:contains("20")' );
		
		$idRegister = $crawler->filter ( ' #idRegister' )->text ();
		
		// Edit the entity
		$crawler = $client->click ( $crawler->selectLink ( 'Edit' )->link () );
		
		$form = $crawler->selectButton ( 'Update' )->form ( array (
				'imie_craftingbundle_register[level]' => 30,
				'imie_craftingbundle_register[rang]' => 40,
				'imie_craftingbundle_register[perso]' => $dfPerso2,
				'imie_craftingbundle_register[guild]' => $dfGuild2 
		) );
		
		$client->submit ( $form );
		$crawler = $client->followRedirect ();
		
		// Check the element contains an attribute with value equals "Foo"
		$this->assertGreaterThan ( 0, $crawler->filter ( '[value="30"]' )->count (), 'Missing element level [value="30"]' );
		$this->assertGreaterThan ( 0, $crawler->filter ( '[value="40"]' )->count (), 'Missing element rang [value="40"]' );
		
		// Delete the entity
		$client->submit ( $crawler->selectButton ( 'Delete' )->form () );
		$crawler = $client->followRedirect ();
		
		// Check the entity has been delete on the list
		$this->assertNotRegExp ( '/' . $idRegister . '/', $client->getResponse ()->getContent () );
	}
}
