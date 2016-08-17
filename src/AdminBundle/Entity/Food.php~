<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Food
 *
 * @ORM\Table(name="foods")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\FoodRepository")
 */
class Food
{
    /**
     * @ORM\Column(name="id",type="integer", nullable=true, options={"unsigned"="true"} )
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="ref_category_id",type="integer", nullable=false, options={"unsigned"="true"} )
     */
    protected $refCategoryId;

    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false, options={"unique","true"})
     */
    protected $name;

    /**
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    protected $description;

    /**
     * @ORM\Column(name="number", type="integer", nullable=true, options={"unsigned","true"})
     */
    protected $number;

    /**
     * @ORM\Column(name="price", type="integer", nullable=false, options={"unsigned","true"})
     */
    protected $price;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set refCategoryId
     *
     * @param integer $refCategoryId
     *
     * @return Food
     */
    public function setRefCategoryId($refCategoryId)
    {
        $this->refCategoryId = $refCategoryId;

        return $this;
    }

    /**
     * Get refCategoryId
     *
     * @return integer
     */
    public function getRefCategoryId()
    {
        return $this->refCategoryId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Food
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
     * Set description
     *
     * @param string $description
     *
     * @return Food
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
     * Set number
     *
     * @param integer $number
     *
     * @return Food
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Food
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }
}
