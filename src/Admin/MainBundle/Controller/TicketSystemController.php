<?php

namespace Admin\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Igel\MainBundle\Entity\TicketSubject;

/*
 * @Security("has_role('ROLE_ADMIN')")
 */
class TicketSystemController extends Controller {
	/**
	 * @Route("/ticketsystem/view", name="admin_ticketsystem")
	 * @Template()
	 */
	public function indexAction() {
		$aTicket = $this->getDoctrine()->getRepository('IgelMainBundle:TicketSubject')->findBy(array('type' => TicketSubject::TypeNew));

		return array(
			'aTicket' => $aTicket
		);
	}

	/**
	 * @Route("/ticketsystem/view/open", name="admin_ticketsystem_view_open")
	 * @Template()
	 */
	public function viewOpenAction() {
		$aTicket = $this->getDoctrine()->getRepository('IgelMainBundle:TicketSubject')->findBy(array('type' => TicketSubject::TypeOpen));
		return $this->render(
			'AdminMainBundle:TicketSystem:index.html.twig',
			array(
				'aTicket' => $aTicket
			)
		);
	}

	/**
	 * @Route("/ticketsystem/view/close", name="admin_ticketsystem_view_close")
	 * @Template()
	 */
	public function viewCloseAction() {
		$aTicket = $this->getDoctrine()->getRepository('IgelMainBundle:TicketSubject')->findBy(array('type' => TicketSubject::TypeClose));
		return $this->render(
			'AdminMainBundle:TicketSystem:index.html.twig',
			array(
				'aTicket' => $aTicket
			)
		);
	}

	/**
	 * @Route("/ticketsystem/{ticketid}", name="admin_ticketsystem_detail")
	 * @Template()
	 */
	public function detailAction(Request $oRequest) {
		/**
		 * @var $oTicketSubject \Igel\MainBundle\Entity\TicketSubject
		 */
		$oTicketSubject = $this->getDoctrine()
			->getRepository('IgelMainBundle:TicketSubject')
			->findOneBy(array('id' => $oRequest->get('ticketid')));

		if(!(bool) $oTicketSubject){
			return $this->redirect($this->generateUrl('admin_ticketsystem'));
		}

		if($oRequest->get('memo') != null){
			$oManager = $this->getDoctrine()->getManager();
			// Olli Ticket auf Status Open setzen
			$oTicketSubject->setType(TicketSubject::TypeOpen);
			$oManager->persist($oTicketSubject);

			$oTicketEntry = new \Igel\MainBundle\Entity\TicketEntry();
			$oTicketEntry->setSubject($oTicketSubject);
			$oTicketEntry->setUser($this->getUser());
			$oTicketEntry->setMemo($oRequest->get('memo'));
			$oManager->persist($oTicketEntry);

			$oManager->flush();
		}


		$aTicketEntry = $this->getDoctrine()
			->getRepository('IgelMainBundle:TicketEntry')
			->findBySubject($oTicketSubject, array('created' => 'desc' ));

		return array(
			'oTicketSubject' => $oTicketSubject,
			'aTicketEntry' => $aTicketEntry
		);
	}

	/**
	 * @Route("/ticketsystem/close/{ticketid}", name="admin_ticketsystem_close")
	 * @Template()
	 */
	public function closeAction( $ticketid ) {
		/**
		 * @var $oTicketSubject \Igel\MainBundle\Entity\TicketSubject
		 */
		$oTicketSubject = $this->getDoctrine()
			->getRepository('IgelMainBundle:TicketSubject')
			->findOneBy(array('id' => $ticketid));

		if(!(bool) $oTicketSubject){
			return $this->redirect($this->generateUrl('admin_ticketsystem'));
		}

		$oTicketSubject->setType(TicketSubject::TypeClose);
		$oManager = $this->getDoctrine()->getManager();
		$oManager->persist($oTicketSubject);
		$oManager->flush();

		return $this->redirect($this->generateUrl('admin_ticketsystem_view_close'));
	}

}
