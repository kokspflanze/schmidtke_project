<?php

namespace Admin\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/*
 * @Security("has_role('ROLE_ADMIN')")
 */
class TicketSystemController extends Controller {
	/**
	 * @Route("/admin/ticketsystem")
	 * @Template()
	 */
	public function indexAction() {
		return array(// ...
		);
	}

	/**
	 * @Route("/admin/ticketsystem/{ticketid}")
	 * @Template()
	 */
	public function detailAction( $ticketid ) {
		return array(// ...
		);
	}

	/**
	 * @Route("/admin/ticketsystem/close/{ticketid}")
	 * @Template()
	 */
	public function closeAction( $ticketid ) {
		return array(// ...
		);
	}

}
