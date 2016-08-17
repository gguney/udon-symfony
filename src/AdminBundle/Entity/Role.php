<?php
/**
 * Created by PhpStorm.
 * User: GG
 * Date: 19.02.2016
 * Time: 13:47
 */

namespace AdminBundle\Entity;

use AdminBundle\SuperClasses\MappedSuperclassBase;
use Doctrine\ORM\Mapping as ORM;

/**
 *@ORM\Entity
 * @ORM\Table(name="roles")
 */
class Role
{

    /**
     * @ORM\Column(name="id",type="integer", nullable=true, options={"unsigned"="true"} )
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false, options={"unique","true"})
     */
    protected $name;

    /**
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    protected $description;



    /**
     * Get id
     *
     * @return integer
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
     * @return Role
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
     * @return Role
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
}
