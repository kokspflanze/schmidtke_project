<?php

namespace Igel\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TicketEntry
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Igel\MainBundle\Entity\TicketEntryRepository")
 */
class TicketEntry
{
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
     * @ORM\Column(name="entry_id", type="integer")
     */
    private $entryId;

    /**
     * @var integer
     *
     * @ORM\Column(name="subject_id", type="integer")
     */
    private $subjectId;

    /**
     * @var integer
     *
     * @ORM\Column(name="usr_id", type="integer")
     */
    private $usrId;

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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="usr_id")
     */
    protected $user;

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
     * Set entryId
     *
     * @param integer $entryId
     *
     * @return TicketEntry
     */
    public function setEntryId($entryId)
    {
        $this->entryId = $entryId;

        return $this;
    }

    /**
     * Get entryId
     *
     * @return integer 
     */
    public function getEntryId()
    {
        return $this->entryId;
    }

    /**
     * Set subjectId
     *
     * @param integer $subjectId
     *
     * @return TicketEntry
     */
    public function setSubjectId($subjectId)
    {
        $this->subjectId = $subjectId;

        return $this;
    }

    /**
     * Get subjectId
     *
     * @return integer 
     */
    public function getSubjectId()
    {
        return $this->subjectId;
    }

    /**
     * Set usrId
     *
     * @param integer $usrId
     *
     * @return TicketEntry
     */
    public function setUsrId($usrId)
    {
        $this->usrId = $usrId;

        return $this;
    }

    /**
     * Get usrId
     *
     * @return integer 
     */
    public function getUsrId()
    {
        return $this->usrId;
    }

    /**
     * Set memo
     *
     * @param string $memo
     *
     * @return TicketEntry
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
     * @return TicketEntry
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
     * Set user
     *
     * @param \Igel\MainBundle\Entity\User $user
     *
     * @return TicketEntry
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
