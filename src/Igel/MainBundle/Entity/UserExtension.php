<?php

namespace Igel\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserExtension
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Igel\MainBundle\Entity\UserExtensionRepository")
 */
class UserExtension {
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
	 * @ORM\ManyToOne(targetEntity="UserExtensionType", inversedBy="id")
	 */
	private $type;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="value", type="string", length=45)
	 */
	private $value;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="expire", type="datetime")
	 */
	private $expire;

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
	 * @return UserExtension
	 */
	public function setUsr( $usrId ) {
		$this->usr = $usrId;

		return $this;
	}

	/**
	 * Get usrId
	 *
	 * @return integer
	 */
	public function getUsr() {
		return $this->usr;
	}

	/**
	 * Set typeId
	 *
	 * @param integer $typeId
	 *
	 * @return UserExtension
	 */
	public function setType( $typeId ) {
		$this->type = $typeId;

		return $this;
	}

	/**
	 * Get typeId
	 *
	 * @return integer
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Set value
	 *
	 * @param string $value
	 *
	 * @return UserExtension
	 */
	public function setValue( $value ) {
		$this->value = $value;

		return $this;
	}

	/**
	 * Get value
	 *
	 * @return string
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * Set expire
	 *
	 * @param \DateTime $expire
	 *
	 * @return UserExtension
	 */
	public function setExpire( $expire ) {
		$this->expire = $expire;

		return $this;
	}

	/**
	 * Get expire
	 *
	 * @return \DateTime
	 */
	public function getExpire() {
		return $this->expire;
	}

	/**
	 * Set created
	 *
	 * @param \DateTime $created
	 *
	 * @return UserExtension
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
