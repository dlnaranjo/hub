<?php

namespace Hub\HubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profession
 *
 * @ORM\Table(name="profession")
 * @ORM\Entity
 */
class Profession
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idProfession", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idprofession;

    /**
     * @var string
     *
     * @ORM\Column(name="professionName", type="string", length=100, nullable=false)
     */
    private $professionname;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Professional", mappedBy="idprofession")
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get idprofession
     *
     * @return integer
     */
    public function getIdprofession()
    {
        return $this->idprofession;
    }

    /**
     * Set professionname
     *
     * @param string $professionname
     *
     * @return Profession
     */
    public function setProfessionname($professionname)
    {
        $this->professionname = $professionname;

        return $this;
    }

    /**
     * Get professionname
     *
     * @return string
     */
    public function getProfessionname()
    {
        return $this->professionname;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Profession
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add user
     *
     * @param \Hub\HubBundle\Entity\Professional $user
     *
     * @return Profession
     */
    public function addUser(\Hub\HubBundle\Entity\Professional $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Hub\HubBundle\Entity\Professional $user
     */
    public function removeUser(\Hub\HubBundle\Entity\Professional $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }
}
