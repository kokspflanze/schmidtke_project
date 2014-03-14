<?php

namespace Igel\PanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TicketSystemController extends Controller {
	/**
	 * @Route("/ticketsystem", name="panel_ticketsystem_index")
	 * @Template()
	 */
	public function indexAction() {
		return array();
	}
}
