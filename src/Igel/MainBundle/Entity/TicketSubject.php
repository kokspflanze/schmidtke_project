<?php

namespace Igel\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticketsubject
 *
 * @ORM\Table(name="TicketSubject", indexes={@ORM\Index(name="IDX_47CC15BC69D3FB", columns={"user_id"}), @ORM\Index(name="IDX_47CC15B12469DE2", columns={"category_id"})})
 * @ORM\Entity
 */
class Ticketsubject
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", nullable=false)
     */
    private $type;

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
     * @var \Igel\MainBundle\Entity\Ticketcategory
     *
     * @ORM\ManyToOne(targetEntity="Igel\MainBundle\Entity\Ticketcategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

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
     * Set name
     *
     * @param string $name
     *
     * @return Ticketsubject
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Ticketsubject
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Ticketsubject
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
     * Set category
     *
     * @param \Igel\MainBundle\Entity\Ticketcategory $category
     *
     * @return Ticketsubject
     */
    public function setCategory(\Igel\MainBundle\Entity\Ticketcategory $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \Igel\MainBundle\Entity\Ticketcategory 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set user
     *
     * @param \Igel\MainBundle\Entity\User $user
     *
     * @return Ticketsubject
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
