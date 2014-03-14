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

		$aTicketSubject = $this->getDoctrine()
			->getRepository('IgelMainBundle:TicketSubject')
			->findBy(array('usr' => $oUser));

		//var_dump($aTicketSystem);die();

		return array('aTicketSubject' => $aTicketSubject);
	}

	/**
	 * @Route("/ticketsystem/deatil/{ticketid}", name="panel_ticketsystem_detail")
	 * @Template()
	 */
	public function detailAction($ticketid){

		$oUser = $this->get('security.context')->getToken()->getUser();

		$oTicketSubject = $this->getDoctrine()
			->getRepository('IgelMainBundle:TicketSubject')
			->findOneBy(array('usr' => $oUser, 'id' => $ticketid));

		if(!(bool) $oTicketSubject){
			$this->redirect($this->generateUrl('panel_ticketsystem_index'));
		}

		$aTicketData = $this->getDoctrine()
			->getRepository('IgelMainBundle:TicketEntry')
			->findBySubject($oTicketSubject);

		//var_dump($aTicketSystem);die();

		return array('aTicketData' => $aTicketData);
	}

	/**
	 * @Route("/ticketsystem/new", name="panel_ticketsystem_new")
	 * @Template()
	 */
	public function newAction(){
		$aTicketCategory = $this->getDoctrine()
			->getRepository('IgelMainBundle:TicketCategory')
			->findBy(array('active' => 1));

		return array('aTicketCategory' => $aTicketCategory);
	}
}
