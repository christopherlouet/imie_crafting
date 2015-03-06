<?php

/**
 * Validates and merges configuration.
 * 
 */
namespace IMIE\CraftingBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 *
 * @author Christopher LOUËT <christopher.louet@yahoo.com>
 */
class Configuration implements ConfigurationInterface {
	

	/**
	 * Get config tree builder.
	 * 
	 * @see \Symfony\Component\Config\Definition\ConfigurationInterface::getConfigTreeBuilder()
	 */
	public function getConfigTreeBuilder() {
		$treeBuilder = new TreeBuilder ();
		$treeBuilder->root ( 'imie_crafting' );
		
		// Here you should define the parameters that are allowed to
		// configure your bundle. See the documentation linked above for
		// more information on that topic.
		
		return $treeBuilder;
	}
}
