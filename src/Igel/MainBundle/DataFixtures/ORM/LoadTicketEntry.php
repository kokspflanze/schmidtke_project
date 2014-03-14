<?php
/**
 * Created by PhpStorm.
 * User: †KôKšPfLâÑzè®
 * Date: 14.03.14
 * Time: 21:26
 */

namespace Igel\MainBundle\DateFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Igel\MainBundle\Entity\TicketEntry;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadTicketEntry extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {
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
		return 7;
	}

	public function load( ObjectManager $oManager ) {

		/**
		 * @var $oUser1 \Igel\MainBundle\Entity\User
		 * @var $oUser2 \Igel\MainBundle\Entity\User
		 * @var $oUser3 \Igel\MainBundle\Entity\User
		 */
		$oUser1 = $this->getReference('user1');
		$oUser2 = $this->getReference('user2');

		/**
		 * @var $oSubject1 \Igel\MainBundle\Entity\TicketSubject
		 * @var $oSubject2 \Igel\MainBundle\Entity\TicketSubject
		 * @var $oSubject3 \Igel\MainBundle\Entity\TicketSubject
		 */
		$oSubject1 = $this->getReference('ticketsubject1');
		$oSubject2 = $this->getReference('ticketsubject2');
		$oSubject3 = $this->getReference('ticketsubject3');


		$oEntry1 = new TicketEntry();
		$oEntry1->setUser($oUser1);
		$oEntry1->setCreated(new \DateTime(date('Y-m-d H:i:s',time())));
		$oEntry1->setSubject($oSubject1);
		$oEntry1->setMemo('memo 123');

		$oEntry12 = new TicketEntry();
		$oEntry12->setUser($oUser1);
		$oEntry12->setCreated(new \DateTime(date('Y-m-d H:i:s',time())));
		$oEntry12->setSubject($oSubject1);
		$oEntry12->setMemo('memo 123');

		$oEntry13 = new TicketEntry();
		$oEntry13->setUser($oUser1);
		$oEntry13->setCreated(new \DateTime(date('Y-m-d H:i:s',time())));
		$oEntry13->setSubject($oSubject1);
		$oEntry13->setMemo('memo 123');

		$oManager->persist( $oEntry1 );
		$oManager->persist( $oEntry12 );
		$oManager->persist( $oEntry13 );
		$oManager->flush();

		$oEntry2 = new TicketEntry();
		$oEntry2->setUser($oUser2);
		$oEntry2->setCreated(new \DateTime(date('Y-m-d H:i:s',time())));
		$oEntry2->setSubject($oSubject1);
		$oEntry2->setMemo('memo 123');

		$oEntry21 = new TicketEntry();
		$oEntry21->setUser($oUser2);
		$oEntry21->setCreated(new \DateTime(date('Y-m-d H:i:s',time())));
		$oEntry21->setSubject($oSubject1);
		$oEntry21->setMemo('memo 123');


		$oManager->persist( $oEntry2 );
		$oManager->persist( $oEntry21 );


		$oEntry22 = new TicketEntry();
		$oEntry22->setUser($oUser2);
		$oEntry22->setCreated(new \DateTime(date('Y-m-d H:i:s',time())));
		$oEntry22->setSubject($oSubject2);
		$oEntry22->setMemo('memo 123');

		$oManager->persist( $oEntry22 );


		$oEntry3 = new TicketEntry();
		$oEntry3->setUser($oUser2);
		$oEntry3->setCreated(new \DateTime(date('Y-m-d H:i:s',time())));
		$oEntry3->setSubject($oSubject2);
		$oEntry3->setMemo('memo 123');


		$oEntry31 = new TicketEntry();
		$oEntry31->setUser($oUser2);
		$oEntry31->setCreated(new \DateTime(date('Y-m-d H:i:s',time())));
		$oEntry31->setSubject($oSubject2);
		$oEntry31->setMemo('memo 123');

		$oManager->persist( $oEntry3 );
		$oManager->persist( $oEntry31 );

		$oEntry32 = new TicketEntry();
		$oEntry32->setUser($oUser2);
		$oEntry32->setCreated(new \DateTime(date('Y-m-d H:i:s',time())));
		$oEntry32->setMemo('memo 123');

		$oEntry32->setSubject($oSubject3);

		$oManager->persist( $oEntry32 );



		$oManager->flush();

	}
} 