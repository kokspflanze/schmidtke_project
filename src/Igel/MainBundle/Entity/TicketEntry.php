<?php

namespace Igel\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TicketEntry
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Igel\MainBundle\Entity\TicketEntryRepository")
 */
class TicketEntry {
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
	 * @ORM\ManyToOne(targetEntity="TicketSubject", inversedBy="id")
	 */
	private $subject;

	/**
	 * @var integer
	 *
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="id")
	 */
	private $usr;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="memo", type="text")
	 */
	private $memo;

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
	 * Set subjectId
	 *
	 * @param integer $subjectId
	 *
	 * @return TicketEntry
	 */
	public function setSubject( $subjectId ) {
		$this->subject = $subjectId;

		return $this;
	}

	/**
	 * Get subjectId
	 *
	 * @return integer
	 */
	public function getSubject() {
		return $this->subject;
	}

	/**
	 * Set usrId
	 *
	 * @param integer $usrId
	 *
	 * @return TicketEntry
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
	 * Set memo
	 *
	 * @param string $memo
	 *
	 * @return TicketEntry
	 */
	public function setMemo( $memo ) {
		$this->memo = $memo;

		return $this;
	}

	/**
	 * Get memo
	 *
	 * @return string
	 */
	public function getMemo() {
		return $this->memo;
	}

	/**
	 * Set created
	 *
	 * @param \DateTime $created
	 *
	 * @return TicketEntry
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
}
