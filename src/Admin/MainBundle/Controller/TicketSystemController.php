<?php

namespace Admin\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/*
 * @Security("has_role('ROLE_ADMIN')")
 */
class TicketSystemController extends Controller {
	/**
	 * @Route("/admin/ticketsystem", name="admin_ticketsystem")
	 * @Template()
	 */
	public function indexAction() {
		$aTicket = $this->getDoctrine()->getRepository('IgelMainBundle:TicketSubject')->findBy(array('type' => 0));

		return array(
			'aTicket' => $aTicket
		);
	}

	/**
	 * @Route("/admin/ticketsystem/{ticketid}", name="admin_ticketsystem_detail")
	 * @Template()
	 */
	public function detailAction( $ticketid ) {
		return array(// ...
		);
	}

	/**
	 * @Route("/admin/ticketsystem/close/{ticketid}", name="admin_ticketsystem_close")
	 * @Template()
	 */
	public function closeAction( $ticketid ) {
		return array(// ...
		);
	}

}
