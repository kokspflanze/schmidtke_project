<?php

namespace Igel\MainBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Igel\MainBundle\Entity\UserRepository")
 */
class User implements UserInterface {
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
	 * @ORM\Column(name="username", unique=true, type="string", length=255)
	 */
	private $username;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="password", type="string", length=255)
	 */
	private $password;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="salt", type="string", length=255)
	 */
	private $salt;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="email", type="string", length=255)
	 */
	private $email;

	/**
	 * @var int
	 *
	 * @ORM\Column(name="created", type="integer", length=10)
	 */
	private $created;

	/**
	 * @ORM\ManyToMany(targetEntity="Role", inversedBy="users")
	 * @ORM\JoinTable(name="user_roles")
	 */
	private $userRoles;

	public function __construct() {
		$this->userRoles = new ArrayCollection();
		$this->salt      = md5( time().rand(0,9999) );
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
	 * Set username
	 *
	 * @param string $username
	 *
	 * @return User
	 */
	public function setUsername( $username ) {
		$this->username = $username;

		return $this;
	}

	/**
	 * Get username
	 *
	 * @return string
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * Set password
	 *
	 * @param string $password
	 *
	 * @return User
	 */
	public function setPassword( $password ) {
		$this->password = $password;

		return $this;
	}

	/**
	 * Get password
	 *
	 * @return string
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * Set salt
	 *
	 * @param string $salt
	 *
	 * @return User
	 */
	public function setSalt( $salt ) {
		$this->salt = $salt;

		return $this;
	}

	/**
	 * Get salt
	 *
	 * @return string
	 */
	public function getSalt() {
		return $this->salt;
	}

	/**
	 * @param string $email
	 */
	public function setEmail( $email ) {
		$this->email = $email;

		return $this;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param int $created
	 */
	public function setCreated( $created ) {
		$this->created = $created;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getCreated() {
		return $this->created;
	}



	/**
	 * Add userRoles
	 *
	 * @param \Igel\MainBundle\Entity\Role $userRoles
	 *
	 * @return User
	 */
	public function addUserRole( \Igel\MainBundle\Entity\Role $userRoles ) {
		$this->userRoles[] = $userRoles;

		return $this;
	}

	/**
	 * Remove userRoles
	 *
	 * @param \Igel\MainBundle\Entity\Role $userRoles
	 */
	public function removeUserRole( \Igel\MainBundle\Entity\Role $userRoles ) {
		$this->userRoles->removeElement( $userRoles );
	}

	/**
	 * Get userRoles
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getUserRoles() {
		return $this->userRoles;
	}

	/**
	 * Returns the roles granted to the user.
	 *
	 * <code>
	 * public function getRoles()
	 * {
	 *     return array('ROLE_USER');
	 * }
	 * </code>
	 *
	 * Alternatively, the roles might be stored on a ``roles`` property,
	 * and populated in any number of different ways when the user object
	 * is created.
	 *
	 * @return Role[] The user roles
	 */
	public function getRoles() {
		$aData = $this->getUserRoles();
		$aResult = array();
		foreach($aData as $iKey => $aCurRole){
			$aResult[] = $aCurRole->getRole();
		}
		return $aResult;
	}

	/**
	 * Removes sensitive data from the user.
	 *
	 * This is important if, at any given point, sensitive information like
	 * the plain-text password is stored on this object.
	 */
	public function eraseCredentials() {
		// TODO: Implement eraseCredentials() method.
	}
}
