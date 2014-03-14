<?php

namespace Igel\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller {
	/**
	 * @Route("/home", name="main_home")
	 * @Template()
	 */
	public function indexAction() {
		return array();
	}
}
