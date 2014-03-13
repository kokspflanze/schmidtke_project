<?php

namespace Igel\MainBundle\DateFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Igel\MainBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadUser extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {
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
		return 4;
	}

	public function load( ObjectManager $oManager ) {
		$oUser = new User();
		$oUser->setUsername( 'kokspflanze' );

		$oEncoder = $this->container->get( 'security.encoder_factory' )->getEncoder( $oUser );
		$oUser->setPassword( $oEncoder->encodePassword( 'secret', $oUser->getSalt() ) );
		$oUser->setEmail( 'kokspflanze@gmx.de' );
		$oUser->setCreated( time() );
		$oUser->addUserRole( $this->getReference( 'role1' ) );

		$oUser2 = new User();
		$oUser2->setUsername( 'admin' );

		$oEncoder = $this->container->get( 'security.encoder_factory' )->getEncoder( $oUser2 );
		$oUser2->setPassword( $oEncoder->encodePassword( 'admin', $oUser2->getSalt() ) );
		$oUser2->setEmail( 'kokspflanze@gmx.de' );
		$oUser2->setCreated( time() );
		$oUser2->addUserRole( $this->getReference( 'role2' ) );

		$oManager->persist( $oUser );
		$oManager->persist( $oUser2 );

		$oManager->flush();

	}
}