<?php

namespace Igel\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class SiteController extends Controller {

	/**
	 * @Route("/concept", name="site_concept")
	 * @Template()
	 */
	public function conceptAction() {
		return array();
	}

	/**
	 * @Route("/impressum", name="site_impressum")
	 * @Template()
	 */
	public function impressumAction() {
		return array();
	}

	/**
	 * @Route("/privacy", name="site_privacy")
	 * @Template()
	 */
	public function privacyAction() {
		return array();
	}
}
