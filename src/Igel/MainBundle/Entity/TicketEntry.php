<?php

namespace Igel\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticketentry
 *
 * @ORM\Table(name="TicketEntry", indexes={@ORM\Index(name="IDX_382588023EDC87", columns={"subject_id"}), @ORM\Index(name="IDX_3825880C69D3FB", columns={"user_id"})})
 * @ORM\Entity
 */
class Ticketentry
{
    /**
     * @var string
     *
     * @ORM\Column(name="memo", type="text", nullable=false)
     */
    private $memo;

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
     * @var \Igel\MainBundle\Entity\Ticketsubject
     *
     * @ORM\ManyToOne(targetEntity="Igel\MainBundle\Entity\Ticketsubject")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="subject_id", referencedColumnName="id")
     * })
     */
    private $subject;

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
     * Set memo
     *
     * @param string $memo
     *
     * @return Ticketentry
     */
    public function setMemo($memo)
    {
        $this->memo = $memo;
    
        return $this;
    }

    /**
     * Get memo
     *
     * @return string 
     */
    public function getMemo()
    {
        return $this->memo;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Ticketentry
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
     * Set subject
     *
     * @param \Igel\MainBundle\Entity\Ticketsubject $subject
     *
     * @return Ticketentry
     */
    public function setSubject(\Igel\MainBundle\Entity\Ticketsubject $subject = null)
    {
        $this->subject = $subject;
    
        return $this;
    }

    /**
     * Get subject
     *
     * @return \Igel\MainBundle\Entity\Ticketsubject 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set user
     *
     * @param \Igel\MainBundle\Entity\User $user
     *
     * @return Ticketentry
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
