<?php
/**
 * Created by PhpStorm.
 * User: †KôKšPfLâÑzè®
 * Date: 14.03.14
 * Time: 20:47
 */

namespace Igel\MainBundle\DateFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Igel\MainBundle\Entity\TicketCategory;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadTicketCategory extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {
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
		return 5;
	}

	public function load( ObjectManager $oManager ) {
		$oTicket = new TicketCategory();
		$oTicket->setName('Programm Fehler');
		$oTicket->setActive(1);


		$oTicket2 = new TicketCategory();
		$oTicket2->setName('Frage');
		$oTicket2->setActive(1);

		$oTicket3 = new TicketCategory();
		$oTicket3->setName('Test');
		$oTicket3->setActive(0);

		$oManager->persist( $oTicket );
		$oManager->persist( $oTicket2 );
		$oManager->persist( $oTicket3 );

		$oManager->flush();

		$this->addReference( 'ticketCategory1', $oTicket );
		$this->addReference( 'ticketCategory2', $oTicket2 );
		$this->addReference( 'ticketCategory3', $oTicket3 );

	}
} 