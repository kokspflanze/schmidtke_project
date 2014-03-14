<?php

namespace Igel\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TicketSubject
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Igel\MainBundle\Entity\TicketSubjectRepository")
 */
class TicketSubject {
	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var integer
	 *
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="id")
	 */
	private $usr;

	/**
	 * @var integer
	 *
	 * @ORM\ManyToOne(targetEntity="TicketCategory", inversedBy="id")
	 */
	private $category;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="name", type="string", length=45)
	 */
	private $name;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="type", type="string", columnDefinition="ENUM('0', '1', '2') NOT NULL")
	 */
	private $type;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="created", type="datetime")
	 */
	private $created;

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set usrId
	 *
	 * @param integer $usrId
	 *
	 * @return TicketSubject
	 */
	public function setUser( $usrId ) {
		$this->usr = $usrId;

		return $this;
	}

	/**
	 * Get usrId
	 *
	 * @return integer
	 */
	public function getUser() {
		return $this->usr;
	}

	/**
	 * Set categoryId
	 *
	 * @param integer $categoryId
	 *
	 * @return TicketSubject
	 */
	public function setCategory( $categoryId ) {
		$this->category = $categoryId;

		return $this;
	}

	/**
	 * Get categoryId
	 *
	 * @return integer
	 */
	public function getCategory() {
		return $this->category;
	}

	/**
	 * Set name
	 *
	 * @param string $name
	 *
	 * @return TicketSubject
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
	 * Set type
	 *
	 * @param string $type
	 *
	 * @return TicketSubject
	 */
	public function setType( $type ) {
		$this->type = $type;

		return $this;
	}

	/**
	 * Get type
	 *
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Set created
	 *
	 * @param \DateTime $created
	 *
	 * @return TicketSubject
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
	 * Set user
	 *
	 * @param \Igel\MainBundle\Entity\User $user
	 *
	 * @return TicketSubject
	public function setUser( \Igel\MainBundle\Entity\User $user = null ) {
		$this->user = $user;

		return $this;
	}

	/**
	 * Get user
	 *
	 * @return \Igel\MainBundle\Entity\User
	 /
	public function getUser() {
		return $this->user;
	}
	*/
}
