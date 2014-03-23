<?php

namespace Igel\MainBundle\Listener;

use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use Symfony\Component\Security\Core\SecurityContext;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;

/**
 * Custom login listener.
 */
class Login {
	/** @var \Symfony\Component\Security\Core\SecurityContext */
	private $securityContext;

	/**
	 * Constructor
	 *
	 * @param SecurityContext $securityContext
	 * @param Doctrine        $doctrine
	 */
	public function __construct( SecurityContext $securityContext ) {
		$this->securityContext = $securityContext;
	}

	/**
	 * Do the magic.
	 *
	 * @param InteractiveLoginEvent $event
	 */
	public function onSecurityInteractiveLogin( InteractiveLoginEvent $event ) {
		if( $this->securityContext->isGranted( 'IS_AUTHENTICATED_FULLY' ) ) {
			// user has just logged in
		}
		if( $this->securityContext->isGranted( 'IS_AUTHENTICATED_REMEMBERED' ) ) {
			// user has logged in using remember_me cookie
		}

		/**
		 * @var $oUser \Igel\MainBundle\Entity\User
		 */
		$oUser = $event->getAuthenticationToken()->getUser();

		// ...
	}
}