<?php

namespace Igel\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;

/**
 * Role
 *
 * @ORM\Table(name="Role")
 * @ORM\Entity(repositoryClass="Igel\MainBundle\Entity\RoleRepository")
 */
class Role implements RoleInterface {
	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=45, nullable=false)
	 */
	private $name;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="active", type="string", nullable=false)
	 */
	private $active;

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;

	/**
	 * @var \Doctrine\Common\Collections\Collection
	 *
	 * @ORM\ManyToMany(targetEntity="Igel\MainBundle\Entity\User", mappedBy="role")
	 */
	private $user;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->user = new \Doctrine\Common\Collections\ArrayCollection();
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
	 * Set active
	 *
	 * @param string $active
	 *
	 * @return Role
	 */
	public function setActive( $active ) {
		$this->active = $active;

		return $this;
	}

	/**
	 * Get active
	 *
	 * @return string
	 */
	public function getActive() {
		return $this->active;
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
	 * Add user
	 *
	 * @param \Igel\MainBundle\Entity\User $user
	 *
	 * @return Role
	 */
	public function addUser( \Igel\MainBundle\Entity\User $user ) {
		$this->user[] = $user;

		return $this;
	}

	/**
	 * Remove user
	 *
	 * @param \Igel\MainBundle\Entity\User $user
	 */
	public function removeUser( \Igel\MainBundle\Entity\User $user ) {
		$this->user->removeElement( $user );
	}

	/**
	 * Get user
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getUser() {
		return $this->user;
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
