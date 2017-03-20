<?php

namespace Hub\HubBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user", uniqueConstraints={@ORM\UniqueConstraint(name="email", columns={"email"})})
 * @ORM\Entity
 */
class User implements UserInterface {

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=50, nullable=false)    
     *    
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=50, nullable=false)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=50, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=50, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=50, nullable=true)
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=50, nullable=false)
     */
    private $language;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registrationDate", type="date", nullable=true)
     */
    private $registrationdate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=255, nullable=false)
     */
    private $salt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastAccess", type="date", nullable=true)
     */
    private $lastaccess;

    /**
     * @var string
     *
     * @ORM\Column(name="perfilPhoto", type="string", length=255, nullable=false)
     */
    private $perfilphoto;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Notification", mappedBy="useremitter")
     * 
     */
    private $idnotificationemitter;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Notification", mappedBy="userreceiver")
     * 
     */
    private $idnotificationreceiver;

    /**
     * Constructor
     */
    public function __construct() {
        $this->idnotificationemitter = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idnotificationreceiver = new \Doctrine\Common\Collections\ArrayCollection();
        $this->salt = md5(uniqid(null, true));
        $this->registrationdate = new \DateTime(null, null);
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function getRole() {
        return $this->role;
    }

    /**
     * Set user
     *
     * @param string $user
     *
     * @return User
     */
    public function setUser($user) {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return User
     */
    public function setCountry($country) {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry() {
        return $this->country;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return User
     */
    public function setCity($city) {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity() {
        return $this->city;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email) {
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
     * Set website
     *
     * @param string $website
     *
     * @return User
     */
    public function setWebsite($website) {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite() {
        return $this->website;
    }

    /**
     * Set language
     *
     * @param string $language
     *
     * @return User
     */
    public function setLanguage($language) {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string
     */
    public function getLanguage() {
        return $this->language;
    }

    /**
     * Set registrationdate
     *
     * @param \DateTime $registrationdate
     *
     * @return User
     */
    public function setRegistrationdate($registrationdate) {
        $this->registrationdate = $registrationdate;

        return $this;
    }

    /**
     * Get registrationdate
     *
     * @return \DateTime
     */
    public function getRegistrationdate() {
        return $this->registrationdate;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return User
     */
    public function setActive($active) {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive() {
        return $this->active;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return User
     */
    public function setSalt($salt) {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Set lastaccess
     *
     * @param \DateTime $lastaccess
     *
     * @return User
     */
    public function setLastaccess($lastaccess) {
        $this->lastaccess = $lastaccess;

        return $this;
    }

    /**
     * Get lastaccess
     *
     * @return \DateTime
     */
    public function getLastaccess() {
        return $this->lastaccess;
    }

    /**
     * Set perfilphoto
     *
     * @param string $perfilphoto
     *
     * @return User
     */
    public function setPerfilphoto($perfilphoto) {
        $this->perfilphoto = $perfilphoto;

        return $this;
    }

    /**
     * Get perfilphoto
     *
     * @return string
     */
    public function getPerfilphoto() {
        return $this->perfilphoto;
    }

    /**
     * Add idnotificationemitter
     *
     * @param \Hub\HubBundle\Entity\Notification $idnotification
     *
     * @return Notification
     */
    public function addIdnotificationemitter(\Hub\HubBundle\Entity\Notification $idnotification) {
        $this->idnotificationemitter[] = $idnotification;
        return $this;
    }

    /**
     * Remove idnotificationemitter
     *
     * @param \Hub\HubBundle\Entity\Notification $idnotification
     */
    public function removeIdnotificationemitter(\Hub\HubBundle\Entity\Notification $idnotification) {
        $this->idnotificationemitter->removeElement($idnotification);
    }

    /**
     * Get $idnotificationemitter
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdnotificationemitter() {
        return $this->idnotificationemitter;
    }

    /**
     * Add idnotificationreceiver
     *
     * @param \Hub\HubBundle\Entity\Notification $idnotification
     *
     * @return Notification
     */
    public function addIdnotificationreceiver(\Hub\HubBundle\Entity\Notification $idnotification) {
        $this->idnotificationreceiver[] = $idnotification;
        return $this;
    }

    /**
     * Remove idnotificationreceiver
     *
     * @param \Hub\HubBundle\Entity\Notification $idnotification
     */
    public function removeIdnotificationreceiver(\Hub\HubBundle\Entity\Notification $idnotification) {
        $this->idnotificationreceiver->removeElement($idnotification);
    }

    /**
     * Get $idnotificationreceiver
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdnotificationreceiver() {
        return $this->idnotificationreceiver;
    }

    /**
     * @inheritDoc
     */
    public function getSalt() {
        return $this->salt;
    }

    /**
     * @inheritDoc
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * @inheritDoc
     */
    public function getUsername() {
        return $this->user;
    }

    /**
     * @inheritDoc
     */
    public function getRoles() {
        return array($this->role);
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials() {
        
    }

    /**
     * @inheritDoc
     */
    public function equals(UserInterface $user) {
        return $this->user === $user->getUsername();
    }

}
