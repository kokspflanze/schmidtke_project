<?php

namespace Igel\PanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/*
 * @Security("has_role('ROLE_USER')")
 */
class TicketSystemController extends Controller {
	/**
	 * @Route("/ticketsystem", name="panel_ticketsystem_index")
	 * @Template()
	 */
	public function indexAction() {
		$oUser = $this->getUser();

		$aTicketSubject = $this->getDoctrine()
			->getRepository('IgelMainBundle:TicketSubject')
			->findBy(array('usr' => $oUser), array('created' => 'desc'));

		//var_dump($aTicketSystem);die();

		return array('aTicketSubject' => $aTicketSubject);
	}

	/**
	 * @Route("/ticketsystem/deatil/{ticketid}", name="panel_ticketsystem_detail")
	 * @Template()
	 */
	public function detailAction(Request $oRequest){
		$oUser = $this->getUser();

		$oTicketSubject = $this->getDoctrine()
			->getRepository('IgelMainBundle:TicketSubject')
			->findOneBy(array('usr' => $oUser, 'id' => $oRequest->get('ticketid')));

		if(!(bool) $oTicketSubject){
			return $this->redirect($this->generateUrl('panel_ticketsystem_index'));
		}

		if($oRequest->request->get('memo') != null){
			$oTicketSubject->setType(\Igel\MainBundle\Entity\TicketSubject::TypeNew);
			$oTicketEntry = new \Igel\MainBundle\Entity\TicketEntry();
			$oTicketEntry->setUser($this->getUser());
			$oTicketEntry->setSubject($oTicketSubject);
			$oTicketEntry->setMemo($oRequest->get('memo'));

			$oManager = $this->getDoctrine()->getManager();
			$oManager->persist($oTicketEntry);
			$oManager->flush();
		}

		$aTicketData = $this->getDoctrine()
			->getRepository('IgelMainBundle:TicketEntry')
			->findBySubject($oTicketSubject, array('created' => 'desc' ));

		//var_dump($aTicketSystem);die();

		return array('aTicketData' => $aTicketData, 'oTicketSubject' => $oTicketSubject);
	}

	/**
	 * @Route("/ticketsystem/new", name="panel_ticketsystem_new")
	 * @Template()
	 */
	public function newAction(Request $oRequest){
		$aTicketCategory = $this->getDoctrine()
			->getRepository('IgelMainBundle:TicketCategory')
			->findBy(array('active' => 1));

		if($oRequest->request->get('subject') != null){


			$oCategory = $this->getDoctrine()
				->getRepository('IgelMainBundle:TicketCategory')
				->findOneBy(array('id' => $oRequest->get('category')));


			$oTicketSubject = new \Igel\MainBundle\Entity\TicketSubject();
			$oTicketSubject->setType(\Igel\MainBundle\Entity\TicketSubject::TypeNew);
			$oTicketSubject->setCategory($oCategory);
			$oTicketSubject->setUser($this->getUser());
			$oTicketSubject->setName($oRequest->get('subject'));

			$oManager = $this->getDoctrine()->getManager();
			$oManager->persist($oTicketSubject);
			$oManager->flush();

			$oTicketEntry = new \Igel\MainBundle\Entity\TicketEntry();
			$oTicketEntry->setUser($this->getUser());
			$oTicketEntry->setSubject($oTicketSubject);
			$oTicketEntry->setMemo($oRequest->get('memo'));

			$oManager->persist($oTicketEntry);
			$oManager->flush();

			return $this->redirect($this->generateUrl('panel_ticketsystem_index'));
		}

		return array('aTicketCategory' => $aTicketCategory);
	}
}
