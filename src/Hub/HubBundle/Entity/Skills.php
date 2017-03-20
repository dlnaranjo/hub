<?php

namespace Hub\HubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Skills
 *
 * @ORM\Table(name="skills", indexes={@ORM\Index(name="FKSkills100419", columns={"user"})})
 * @ORM\Entity
 */
class Skills
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idSkills", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idskills;

    /**
     * @var string
     *
     * @ORM\Column(name="skill", type="string", length=255, nullable=false)
     */
    private $skill;

    /**
     * @var \Professional
     *
     * @ORM\ManyToOne(targetEntity="Professional" , inversedBy="skills")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="user")
     * })
     */
    private $user;



    /**
     * Get idskills
     *
     * @return integer
     */
    public function getIdskills()
    {
        return $this->idskills;
    }

    /**
     * Set skill
     *
     * @param string $skill
     *
     * @return Skills
     */
    public function setSkill($skill)
    {
        $this->skill = $skill;

        return $this;
    }

    /**
     * Get skill
     *
     * @return string
     */
    public function getSkill()
    {
        return $this->skill;
    }

    /**
     * Set user
     *
     * @param \Hub\HubBundle\Entity\Professional $user
     *
     * @return Skills
     */
    public function setUser(\Hub\HubBundle\Entity\Professional $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Hub\HubBundle\Entity\Professional
     */
    public function getUser()
    {
        return $this->user;
    }
}
