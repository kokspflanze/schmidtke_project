<?php

namespace Igel\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

class SecurityController extends Controller {
	/**
	 * @Route("/", name="main_security_login")
	 * @Template()
	 */
	public function loginAction( Request $oRequest ) {

		/**
		 * bin ich etwa schon eingeloggt?
		 */
		if($this->getUser() != null){
			return $this->redirect($this->generateUrl('panel_ticketsystem_index'));
		}

		$oSession = $oRequest->getSession();

		// get the login error if there is one
		if( $oRequest->attributes->has( SecurityContext::AUTHENTICATION_ERROR ) ) {
			$error = $oRequest->attributes->get( SecurityContext::AUTHENTICATION_ERROR );
		} else {
			$error = $oSession->get( SecurityContext::AUTHENTICATION_ERROR );
			$oSession->remove( SecurityContext::AUTHENTICATION_ERROR );
		}

		return array( // last username entered by the user
			'last_username' => $oSession->get( SecurityContext::LAST_USERNAME ), 'error' => $error, );
	}

	/**
	 * @Route("/login_check", name="main_security_loginCheck")
	 * @Template()
	 */
	public function loginCheckAction() {
		return array();
	}

	/**
	 * @Route("/logout", name="main_security_logout")
	 * @Template()
	 */
	public function logoutAction() {
		return array();
	}

}
