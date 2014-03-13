<?php

namespace Igel\MainBundle\DateFixtures\ORM;

use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Igel\MainBundle\Entity\Role;

class LoadRoles extends AbstractFixture implements OrderedFixtureInterface {
	/**
	 * Get the order of this fixture
	 *
	 * @return integer
	 */
	function getOrder() {
		return 3;
	}

	public function load( ObjectManager $oManager ) {
		$oRole1 = new Role();
		$oRole1->setName( 'ROLE_USER' );

		$oRole2 = new Role();
		$oRole2->setName( 'ROLE_ADMIN' );

		$oManager->persist( $oRole1 );
		$oManager->persist( $oRole2 );

		$oManager->flush();

		$this->addReference( 'role1', $oRole1 );
		$this->addReference( 'role2', $oRole2 );
	}

}