<?php

namespace Igel\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userextension
 *
 * @ORM\Table(name="UserExtension", indexes={@ORM\Index(name="IDX_60755541C69D3FB", columns={"user_id"}), @ORM\Index(name="IDX_60755541C54C8C93", columns={"type_id"})})
 * @ORM\Entity
 */
class Userextension
{
    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=45, nullable=false)
     */
    private $value;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expire", type="datetime", nullable=false)
     */
    private $expire;

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
     * @var \Igel\MainBundle\Entity\Userextensiontype
     *
     * @ORM\ManyToOne(targetEntity="Igel\MainBundle\Entity\Userextensiontype")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     * })
     */
    private $type;

    /**
     * @var \Igel\MainBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Igel\MainBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;



    /**
     * Set value
     *
     * @param string $value
     *
     * @return Userextension
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set expire
     *
     * @param \DateTime $expire
     *
     * @return Userextension
     */
    public function setExpire($expire)
    {
        $this->expire = $expire;
    
        return $this;
    }

    /**
     * Get expire
     *
     * @return \DateTime 
     */
    public function getExpire()
    {
        return $this->expire;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Userextension
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param \Igel\MainBundle\Entity\Userextensiontype $type
     *
     * @return Userextension
     */
    public function setType(\Igel\MainBundle\Entity\Userextensiontype $type = null)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return \Igel\MainBundle\Entity\Userextensiontype 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set user
     *
     * @param \Igel\MainBundle\Entity\User $user
     *
     * @return Userextension
     */
    public function setUser(\Igel\MainBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Igel\MainBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
