<?php

namespace Admin\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\SecurityContext;

/*
 * @Security("has_role('ROLE_ADMIN')")
 */
class DefaultController extends Controller {
	/**
	 * @Route("/", name="admin_main")
	 * @Template()
	 */
	public function indexAction() {
		return array();
	}
}
