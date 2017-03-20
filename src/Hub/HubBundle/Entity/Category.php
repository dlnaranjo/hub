<?php

namespace Hub\HubBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCategory", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcategory;

    /**
     * @var string
     *
     * @ORM\Column(name="categoryName", type="string", length=255, nullable=false)
     */
    private $categoryname;



    /**
     * Get idcategory
     *
     * @return integer
     */
    public function getIdcategory()
    {
        return $this->idcategory;
    }

    /**
     * Set categoryname
     *
     * @param string $categoryname
     *
     * @return Category
     */
    public function setCategoryname($categoryname)
    {
        $this->categoryname = $categoryname;

        return $this;
    }

    /**
     * Get categoryname
     *
     * @return string
     */
    public function getCategoryname()
    {
        return $this->categoryname;
    }
}
