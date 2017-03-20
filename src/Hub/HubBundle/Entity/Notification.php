<?php

namespace Hub\HubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notification
 *
 * @ORM\Table(name="notification", indexes={@ORM\Index(name="FKNotificati360234", columns={"userEmitter"})})
 * @ORM\Table(name="notification", indexes={@ORM\Index(name="FKNotificati851215", columns={"userReceiver"})})
 * @ORM\Entity
 */
class Notification
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idNotification", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idnotification;
    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="notification")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userReceiver", referencedColumnName="user")
     * })
     */
    private $userreceiver;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=255, nullable=false)
     */
    private $message;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isRead", type="boolean", nullable=false)
     */
    private $isread;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="notification")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="userEmitter", referencedColumnName="user")
     * })
     */
    private $useremitter;



    /**
     * Get idnotification
     *
     * @return integer
     */
    public function getIdnotification()
    {
        return $this->idnotification;
    }

     /**
     * Set message
     *
     * @param string $message
     *
     * @return Notification
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set isread
     *
     * @param boolean $isread
     *
     * @return Notification
     */
    public function setIsread($isread)
    {
        $this->isread = $isread;

        return $this;
    }

    /**
     * Get isread
     *
     * @return boolean
     */
    public function getIsread()
    {
        return $this->isread;
    }

    /**
     * Set useremitter
     *
     * @param \Hub\HubBundle\Entity\User $useremitter
     *
     * @return Notification
     */
    public function setUseremitter(\Hub\HubBundle\Entity\User $useremitter = null)
    {
        $this->useremitter = $useremitter;

        return $this;
    }

    /**
     * Get useremitter
     *
     * @return \Hub\HubBundle\Entity\User
     */
    public function getUseremitter()
    {
        return $this->useremitter;
    }
    
    /**
     * Set userreceiver
     *
     * @param \Hub\HubBundle\Entity\User $userreceiver
     *
     * @return Notification
     */
    public function setUserreceiver(\Hub\HubBundle\Entity\User $userreceiver = null)
    {
        $this->userreceiver = $userreceiver;

        return $this;
    }

    /**
     * Get userreceiver
     *
     * @return \Hub\HubBundle\Entity\User
     */
    public function getUserreceiver()
    {
        return $this->userreceiver;
    }
    
    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return User
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    
}
