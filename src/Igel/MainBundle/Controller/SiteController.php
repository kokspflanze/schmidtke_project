<?php

namespace Igel\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class SiteController extends Controller {
	/**
	 * @Route("/impressum", name="site_impressum")
	 * @Template()
	 */
	public function impressumAction() {
		return array();
	}
}
