<?php

namespace Igel\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UserController extends Controller {
	/**
	 * @Route("/register", name="main_user_register")
	 * @Template()
	 */
	public function registerAction() {
		$aError = array();

		return array( 'aError' => $aError );
	}

	/**
	 * @Route("/confirm/{sCode}", name="main_user_confirm")
	 * @Template()
	 */
	public function confirmAction( $sCode ) {
		$aError = array();

		return array( 'aError' => $aError );
	}

	/**
	 * @Route("/forget-password", name="main_user_forget-password")
	 * @Template()
	 */
	public function forgetPasswordAction() {
		$aError = array();

		return array( 'aError' => $aError );
	}

}
