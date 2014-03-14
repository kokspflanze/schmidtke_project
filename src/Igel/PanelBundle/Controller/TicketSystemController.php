<?php

namespace Igel\PanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
/*
 * @Security("has_role('ROLE_USER')")
 */
class TicketSystemController extends Controller {
	/**
	 * @Route("/ticketsystem", name="panel_ticketsystem_index")
	 * @Template()
	 */
	public function indexAction() {
		$oUser = $this->get('security.context')->getToken()->getUser();

		//var_dump($oUser);die();

		$aTicketSubject = $this->getDoctrine()
			->getRepository('IgelMainBundle:TicketSubject')
			->findByUsr($oUser);

		//var_dump($aTicketSystem);die();

		return array('aTicketSubject' => $aTicketSubject);
	}
}
