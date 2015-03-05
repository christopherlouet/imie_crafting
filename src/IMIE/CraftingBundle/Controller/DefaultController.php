<?php

/**
 * Default controller.
 * 
 */
namespace IMIE\CraftingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * DefaultController class.
 *
 * @author Christopher LOUËT <christopher.louet@yahoo.com>
 *        
 */
class DefaultController extends Controller {
	
	/**
	 * Default page.
	 * 
	 */
	public function indexAction() {
		return $this->render ( 'IMIECraftingBundle:Default:index.html.twig' );
	}
}
