<?php

namespace Igel\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="User", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_2DA17977F85E0677", columns={"username"})})
 * @ORM\Entity(repositoryClass="Igel\MainBundle\Entity\UserRepository")
 */
class User implements UserInterface {
	/**
	 * @var string
	 *
	 * @ORM\Column(name="username", type="string", length=255, nullable=false)
	 */
	private $username;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="email", type="string", length=255, nullable=false)
	 */
	private $email;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="salt", type="string", length=255, nullable=false)
	 */
	private $salt;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="password", type="string", length=255, nullable=false)
	 */
	private $password;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="created", type="datetime", nullable=false)
	 */
	private $created;

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
	 * @ORM\ManyToMany(targetEntity="Igel\MainBundle\Entity\Role", inversedBy="user")
	 * @ORM\JoinTable(name="user_role",
	 *   joinColumns={
	 *     @ORM\JoinColumn(name="user_id", referencedColumnName="id")
	 *   },
	 *   inverseJoinColumns={
	 *     @ORM\JoinColumn(name="role_id", referencedColumnName="id")
	 *   }
	 * )
	 */
	private $role;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->setCreated( new \DateTime( date( 'Y-m-d H:i:s', time() ) ) );
		$this->role = new \Doctrine\Common\Collections\ArrayCollection();
		$this->salt = \Igel\MainBundle\Helper\Format::getCode( 50 );
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
	 * Set email
	 *
	 * @param string $email
	 *
	 * @return User
	 */
	public function setEmail( $email ) {
		$this->email = $email;

		return $this;
	}

	/**
	 * Get email
	 *
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
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
	 * Set created
	 *
	 * @param \DateTime $created
	 *
	 * @return User
	 */
	public function setCreated( $created ) {
		$this->created = $created;

		return $this;
	}

	/**
	 * Get created
	 *
	 * @return \DateTime
	 */
	public function getCreated() {
		return $this->created;
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
	 * Add role
	 *
	 * @param \Igel\MainBundle\Entity\Role $role
	 *
	 * @return User
	 */
	public function addRole( \Igel\MainBundle\Entity\Role $role ) {
		$this->role[] = $role;

		return $this;
	}

	/**
	 * Remove role
	 *
	 * @param \Igel\MainBundle\Entity\Role $role
	 */
	public function removeRole( \Igel\MainBundle\Entity\Role $role ) {
		$this->role->removeElement( $role );
	}

	/**
	 * Get role
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getRole() {
		return $this->role;
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
		$aData   = $this->getRoles();
		$aResult = array();
		foreach( $aData as $iKey => $aCurRole ) {
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
