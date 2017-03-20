<?php

namespace Hub\HubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Professional
 *
 * @ORM\Table(name="professional", indexes={@ORM\Index(name="FKProfession243105", columns={"user"}), @ORM\Index(name="FKProfession908926", columns={"idCategory"})})
 * @ORM\Entity
 */
class Professional
{
    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=50, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=50, nullable=false)
     */
    private $lastname;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer", nullable=false)
     */
    private $age;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sex", type="boolean", nullable=false)
     */
    private $sex;

    /**
     * @var string
     *
     * @ORM\Column(name="personalPhone", type="string", length=15, nullable=false)
     */
    private $personalphone;

    /**
     * @var string
     *
     * @ORM\Column(name="workPhone", type="string", length=15, nullable=true)
     */
    private $workphone;

    /**
     * @var string
     *
     * @ORM\Column(name="otherPhone", type="string", length=15, nullable=true)
     */
    private $otherphone;

    /**
     * @var string
     *
     * @ORM\Column(name="presentation", type="text", nullable=false)
     */
    private $presentation;

    /**
     * @var integer
     *
     * @ORM\Column(name="experience", type="integer", nullable=false)
     */
    private $experience;

    /**
     * @var string
     *
     * @ORM\Column(name="curriculum", type="text", nullable=true)
     */
    private $curriculum;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Profession", inversedBy="user")
     * @ORM\JoinTable(name="professional_profession",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user", referencedColumnName="user")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="idProfession", referencedColumnName="idProfession")
     *   }
     * )
     */
    private $idprofession;
    
      /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Skills", mappedBy="professional")
     * 
     */
    private $idskills;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idprofession = new \Doctrine\Common\Collections\ArrayCollection();
        $this->idskills = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set firstname
     *
     * @param string $firstname
     *
     * @return Professional
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return Professional
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Professional
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set sex
     *
     * @param boolean $sex
     *
     * @return Professional
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return boolean
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set personalphone
     *
     * @param string $personalphone
     *
     * @return Professional
     */
    public function setPersonalphone($personalphone)
    {
        $this->personalphone = $personalphone;

        return $this;
    }

    /**
     * Get personalphone
     *
     * @return string
     */
    public function getPersonalphone()
    {
        return $this->personalphone;
    }

    /**
     * Set workphone
     *
     * @param string $workphone
     *
     * @return Professional
     */
    public function setWorkphone($workphone)
    {
        $this->workphone = $workphone;

        return $this;
    }

    /**
     * Get workphone
     *
     * @return string
     */
    public function getWorkphone()
    {
        return $this->workphone;
    }

    /**
     * Set otherphone
     *
     * @param string $otherphone
     *
     * @return Professional
     */
    public function setOtherphone($otherphone)
    {
        $this->otherphone = $otherphone;

        return $this;
    }

    /**
     * Get otherphone
     *
     * @return string
     */
    public function getOtherphone()
    {
        return $this->otherphone;
    }

    /**
     * Set presentation
     *
     * @param string $presentation
     *
     * @return Professional
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
     * Set experience
     *
     * @param integer $experience
     *
     * @return Professional
     */
    public function setExperience($experience)
    {
        $this->experience = $experience;

        return $this;
    }

    /**
     * Get experience
     *
     * @return integer
     */
    public function getExperience()
    {
        return $this->experience;
    }

    /**
     * Set curriculum
     *
     * @param string $curriculum
     *
     * @return Professional
     */
    public function setCurriculum($curriculum)
    {
        $this->curriculum = $curriculum;

        return $this;
    }

    /**
     * Get curriculum
     *
     * @return string
     */
    public function getCurriculum()
    {
        return $this->curriculum;
    }

    /**
     * Set trial
     *
     * @param boolean $trial
     *
     * @return Professional
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
     * @return Professional
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
     * @return Professional
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

    /**
     * Add idprofession
     *
     * @param \Hub\HubBundle\Entity\Profession $idprofession
     *
     * @return Professional
     */
    public function addIdprofession(\Hub\HubBundle\Entity\Profession $idprofession)
    {
        $this->idprofession[] = $idprofession;

        return $this;
    }

    /**
     * Remove idprofession
     *
     * @param \Hub\HubBundle\Entity\Profession $idprofession
     */
    public function removeIdprofession(\Hub\HubBundle\Entity\Profession $idprofession)
    {
        $this->idprofession->removeElement($idprofession);
    }

    /**
     * Get idprofession
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdprofession()
    {
        return $this->idprofession;
    }
    
     /**
     * Add idskills
     *
     * @param \Hub\HubBundle\Entity\Skills $idskills
     *
     * @return Skills
     */
    public function addIdskills(\Hub\HubBundle\Entity\Skills $idskills)
    {
        $this->idskills[] = $idskills;

        return $this;
    }

    /**
     * Remove idskills
     *
     * @param \Hub\HubBundle\Entity\Skills $idskills
     */
    public function removeIdskills(\Hub\HubBundle\Entity\Skills $idskills)
    {
        $this->idprofession->removeElement($idskills);
    }

    /**
     * Get idskills
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdskills()
    {
        return $this->idskills;
    }
}
