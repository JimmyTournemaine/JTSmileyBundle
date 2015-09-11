<?php

namespace JT\SmileyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JT\SmileyBundle\Model\SmileyManager;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$sm = new SmileyManager();
    	$data = $sm->load();
    	
    	dump($data);
    	
        return $this->render('JTSmileyBundle:Default:index.html.twig');
    }
}
