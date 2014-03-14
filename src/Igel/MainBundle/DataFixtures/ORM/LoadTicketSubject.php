<?php
/**
 * Created by PhpStorm.
 * User: †KôKšPfLâÑzè®
 * Date: 14.03.14
 * Time: 20:28
 */

namespace Igel\MainBundle\DateFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Igel\MainBundle\Entity\TicketSubject;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadTicketSubject extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {
	/**
	 * @var ContainerInterface
	 */
	private $container;

	/**
	 * Sets the Container.
	 *
	 * @param ContainerInterface|null $container A ContainerInterface instance or null
	 *
	 * @api
	 */
	public function setContainer( ContainerInterface $container = null ) {
		$this->container = $container;
	}

	/**
	 * Get the order of this fixture
	 *
	 * @return integer
	 */
	function getOrder() {
		return 6;
	}

	public function load( ObjectManager $oManager ) {

		$oUser = $this->getReference('user1');
		$oCategory = $this->getReference('ticketCategory1');

		$oTicket = new TicketSubject();
		$oTicket->setUser($oUser);
		$oTicket->setCategory($oCategory);
		$oTicket->setType(0);
		$oTicket->setCreated(new \DateTime(date('Y-m-d H:i:s',time())));
		$oTicket->setName('TestTicketSystem 1');

		$oUser2 = $this->getReference('user2');
		$oCategory2 = $this->getReference('ticketCategory2');

		$oTicket2 = new TicketSubject();
		$oTicket2->setUser($oUser2);
		$oTicket2->setCategory($oCategory2);
		$oTicket2->setType(1);
		$oTicket2->setCreated(new \DateTime(date('Y-m-d H:i:s',time())));
		$oTicket2->setName('TestTicketSystem 2');

		$oUser3 = $this->getReference('user2');
		$oCategory3 = $this->getReference('ticketCategory2');

		$oTicket3 = new TicketSubject();
		$oTicket3->setUser($oUser3);
		$oTicket3->setCategory($oCategory3);
		$oTicket3->setType(2);
		$oTicket3->setCreated(new \DateTime(date('Y-m-d H:i:s',time())));
		$oTicket3->setName('TestTicketSystem 3');

		$oManager->persist( $oTicket );
		$oManager->persist( $oTicket2 );
		$oManager->persist( $oTicket3 );

		$this->setReference('ticketsubject1', $oTicket);
		$this->setReference('ticketsubject2', $oTicket2);
		$this->setReference('ticketsubject3', $oTicket3);

		$oManager->flush();

	}
} 