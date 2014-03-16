<?php

namespace Admin\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/*
 * @Security("has_role('ROLE_ADMIN')")
 */
class UserController extends Controller {
	/**
	 * @Route("/user")
	 * @Template()
	 */
	public function indexAction() {
		return array( // ...
		);
	}

	/**
	 * @Route("/user/{userid}")
	 * @Template()
	 */
	public function detailAction( $userid ) {
		return array( // ...
		);
	}

	/**
	 * @Route("/user/new")
	 * @Template()
	 */
	public function newAction() {
		return array( // ...
		);
	}

}
