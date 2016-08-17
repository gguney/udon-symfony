<?php

namespace AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table(name="menus")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\MenuRepository")
 */
class Menu
{
    /**
     * @ORM\Column(name="id",type="integer", nullable=true, options={"unsigned"="true"} )
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="ref_management_id", type="integer", nullable=false, options={"unsigned"="true"} )
     */
    protected $refManagementId;

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
     * Set name
     *
     * @param string $name
     *
     * @return Menu
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
     * @return Menu
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
     * @return Menu
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
     * Set refManagementId
     *
     * @param integer $refManagementId
     *
     * @return Menu
     */
    public function setRefManagementId($refManagementId)
    {
        $this->refManagementId = $refManagementId;

        return $this;
    }

    /**
     * Get refManagementId
     *
     * @return integer
     */
    public function getRefManagementId()
    {
        return $this->refManagementId;
    }
}
