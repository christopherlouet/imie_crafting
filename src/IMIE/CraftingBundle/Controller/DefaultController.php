<?php

namespace IMIE\CraftingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('IMIECraftingBundle:Default:index.html.twig');
    }
}