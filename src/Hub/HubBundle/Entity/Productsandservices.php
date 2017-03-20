<?php

namespace Hub\HubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Productsandservices
 *
 * @ORM\Table(name="productsandservices", indexes={@ORM\Index(name="FKProductsAn148047", columns={"user"})})
 * @ORM\Entity
 */
class Productsandservices
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idPproductsandservices", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idpproductsandservices;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=false)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;
    
    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @var \Business
     *
     * @ORM\ManyToOne(targetEntity="Business")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="user")
     * })
     */
    private $user;



    /**
     * Get idpproductsandservices
     *
     * @return integer
     */
    public function getIdpproductsandservices()
    {
        return $this->idpproductsandservices;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Productsandservices
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
     * Set price
     *
     * @param float $price
     *
     * @return Productsandservices
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Productsandservices
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
     * Set photo
     *
     * @param string $photo
     *
     * @return User
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set user
     *
     * @param \Hub\HubBundle\Entity\Business $user
     *
     * @return Productsandservices
     */
    public function setUser(\Hub\HubBundle\Entity\Business $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Hub\HubBundle\Entity\Business
     */
    public function getUser()
    {
        return $this->user;
    }
}
