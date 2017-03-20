<?php

namespace Hub\HubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Business
 *
 * @ORM\Table(name="business", indexes={@ORM\Index(name="FKBusiness343247", columns={"user"}), @ORM\Index(name="FKBusiness476311", columns={"idCategory"})})
 * @ORM\Entity
 */
class Business
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=50, nullable=false)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="phone1", type="string", length=15, nullable=false)
     */
    private $phone1;

    /**
     * @var string
     *
     * @ORM\Column(name="phone2", type="string", length=15, nullable=true)
     */
    private $phone2;

    /**
     * @var string
     *
     * @ORM\Column(name="phone3", type="string", length=15, nullable=true)
     */
    private $phone3;

    /**
     * @var string
     *
     * @ORM\Column(name="presentation", type="text", nullable=false)
     */
    private $presentation;

    /**
     * @var boolean
     *
     * @ORM\Column(name="trial", type="boolean", nullable=false)
     */
    private $trial;

    /**
     * @var \Category
     *
     * @ORM\ManyToOne(targetEntity="Category")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idCategory", referencedColumnName="idCategory")
     * })
     */
    private $idcategory;

    /**
     * @var \User
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="user")
     * })
     */
    private $user;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Business
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
     * Set address
     *
     * @param string $address
     *
     * @return Business
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set phone1
     *
     * @param string $phone1
     *
     * @return Business
     */
    public function setPhone1($phone1)
    {
        $this->phone1 = $phone1;

        return $this;
    }

    /**
     * Get phone1
     *
     * @return string
     */
    public function getPhone1()
    {
        return $this->phone1;
    }

    /**
     * Set phone2
     *
     * @param string $phone2
     *
     * @return Business
     */
    public function setPhone2($phone2)
    {
        $this->phone2 = $phone2;

        return $this;
    }

    /**
     * Get phone2
     *
     * @return string
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    /**
     * Set phone3
     *
     * @param string $phone3
     *
     * @return Business
     */
    public function setPhone3($phone3)
    {
        $this->phone3 = $phone3;

        return $this;
    }

    /**
     * Get phone3
     *
     * @return string
     */
    public function getPhone3()
    {
        return $this->phone3;
    }

    /**
     * Set presentation
     *
     * @param string $presentation
     *
     * @return Business
     */
    public function setPresentation($presentation)
    {
        $this->presentation = $presentation;

        return $this;
    }

    /**
     * Get presentation
     *
     * @return string
     */
    public function getPresentation()
    {
        return $this->presentation;
    }

    /**
     * Set trial
     *
     * @param boolean $trial
     *
     * @return Business
     */
    public function setTrial($trial)
    {
        $this->trial = $trial;

        return $this;
    }

    /**
     * Get trial
     *
     * @return boolean
     */
    public function getTrial()
    {
        return $this->trial;
    }

    /**
     * Set idcategory
     *
     * @param \Hub\HubBundle\Entity\Category $idcategory
     *
     * @return Business
     */
    public function setIdcategory(\Hub\HubBundle\Entity\Category $idcategory = null)
    {
        $this->idcategory = $idcategory;

        return $this;
    }

    /**
     * Get idcategory
     *
     * @return \Hub\HubBundle\Entity\Category
     */
    public function getIdcategory()
    {
        return $this->idcategory;
    }

    /**
     * Set user
     *
     * @param \Hub\HubBundle\Entity\User $user
     *
     * @return Business
     */
    public function setUser(\Hub\HubBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Hub\HubBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
