<?php

namespace Igel\MainBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * Role
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Igel\MainBundle\Entity\RoleRepository")
 */
class Role implements RoleInterface {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=255)
	 */
	private $name;

	/**
	 * @ORM\ManyToMany(targetEntity="User", mappedBy="userRoles")
	 */
	private $users;

	public function __construct() {
		$this->users = new ArrayCollection();
	}

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set name
	 *
	 * @param string $name
	 *
	 * @return Role
	 */
	public function setName( $name ) {
		$this->name = $name;

		return $this;
	}

	/**
	 * Get name
	 *
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Add users
	 *
	 * @param \Igel\MainBundle\Entity\User $users
	 *
	 * @return Role
	 */
	public function addUser( \Igel\MainBundle\Entity\User $users ) {
		$this->users[] = $users;

		return $this;
	}

	/**
	 * Remove users
	 *
	 * @param \Igel\MainBundle\Entity\User $users
	 */
	public function removeUser( \Igel\MainBundle\Entity\User $users ) {
		$this->users->removeElement( $users );
	}

	/**
	 * Get users
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getUsers() {
		return $this->users;
	}

	/**
	 * Returns the role.
	 *
	 * This method returns a string representation whenever possible.
	 *
	 * When the role cannot be represented with sufficient precision by a
	 * string, it should return null.
	 *
	 * @return string|null A string representation of the role, or null
	 */
	public function getRole() {
		return $this->getName();
	}
}
