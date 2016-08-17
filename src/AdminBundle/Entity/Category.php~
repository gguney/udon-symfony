<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Column(name="id",type="integer", nullable=true, options={"unsigned"="true"} )
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="ref_menu_id",type="integer", nullable=false, options={"unsigned"="true"} )
     */
    protected $refMenuId;

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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set refMenuId
     *
     * @param integer $refMenuId
     *
     * @return Category
     */
    public function setRefMenuId($refMenuId)
    {
        $this->refMenuId = $refMenuId;

        return $this;
    }

    /**
     * Get refMenuId
     *
     * @return integer
     */
    public function getRefMenuId()
    {
        return $this->refMenuId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Category
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
     * @return Category
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
     * @return Category
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
}
