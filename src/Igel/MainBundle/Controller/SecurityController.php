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
	 * @Route("/login", name="main_security_login")
	 * @Template()
	 */
	public function loginAction( Request $oRequest ) {
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
		$username = 'kokspflanze';
		$em       = $this->getDoctrine();
		$repo     = $em->getRepository( "IgelMainBundle:User" ); //Entity Repository
		$user     = $repo->findOneByUsername( $username );
		if( !$user ) {
			throw new UsernameNotFoundException( "User not found" );
		} else {
			$token = new UsernamePasswordToken( $user, null, "Igel_secured", $user->getRoles() );
			$this->get( "security.context" )->setToken( $token ); //now the user is logged in

			//now dispatch the login event
			$request = $this->get( "request" );
			$event   = new InteractiveLoginEvent( $request, $token );
			$this->get( "event_dispatcher" )->dispatch( "security.interactive_login", $event );
		}


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
