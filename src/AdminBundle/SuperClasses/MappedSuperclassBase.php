<?php
/**
 * Created by PhpStorm.
 * User: GG
 * Date: 18.02.2016
 * Time: 14:16
 */

namespace AdminBundle\SuperClasses;
use Doctrine\ORM\Mapping as ORM;


class MappedSuperclassBase
{
    //######################################## COMMON FIELDS START ########################################//
    /**
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="created_user_id", type="integer", nullable=false, options={"unsigned"="true", "default"="0"} )
     */
    protected $createdUserId;

    /**
     * @ORM\Column(name="is_modified", type="boolean", nullable=false, options={"default"="0"} )
     */
    protected $isModified;

    /**
     * @ORM\Column(name="modified_at", type="datetime", nullable=true)
     */
    protected $modifiedAt;

    /**
     * @ORM\Column(name="modified_user_id", type="integer", nullable=true, options={"unsigned"="true"} )
     */
    protected $modifiedUserId;

    /**
     * @ORM\Column(name="is_deleted", type="boolean", nullable=false, options={"default"="0"} )
     */
    protected $isDeleted;

    /**
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    protected $deletedAt;

    /**
     * @ORM\Column(name="deleted_user_id", type="integer", nullable=true, options={"unsigned"="true"} )
     */
    protected $deletedUserId;

    /**
     * @ORM\Column(name="is_versioned", type="boolean", nullable=false, options={"default"="0"} )
     */
    protected $isVersioned;

    /**
     * @ORM\Column(name="version", type="integer", nullable=false, options={"unsigned"="true", "default"="0"} )
     */
    protected $version;

    /**
     * @ORM\Column(name="parent_id", type="integer", nullable=false, options={"unsigned"="true", "default"="0"} )
     */
    protected $parentId;

    /**
     * @ORM\Column(name="is_active", type="boolean", nullable=false, options={"default"="1"} )
     */
    protected $isActive;
    //######################################## COMMON FIELDS END ########################################//

    /***** Getters and setters *****/

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdUserId
     *
     * @param integer $createdUserId
     *
     * @return Management
     */
    public function setCreatedUserId($createdUserId)
    {
        $this->createdUserId = $createdUserId;

        return $this;
    }

    /**
     * Get createdUserId
     *
     * @return integer
     */
    public function getCreatedUserId()
    {
        return $this->createdUserId;
    }

    /**
     * Set isModified
     *
     * @param boolean $isModified
     *
     * @return Management
     */
    public function setIsModified($isModified)
    {
        $this->isModified = $isModified;

        return $this;
    }

    /**
     * Get isModified
     *
     * @return boolean
     */
    public function getIsModified()
    {
        return $this->isModified;
    }

    /**
     * Set modifiedAt
     *
     * @param \DateTime $modifiedAt
     *
     * @return Management
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return \DateTime
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * Set modifiedUserId
     *
     * @param integer $modifiedUserId
     *
     * @return Management
     */
    public function setModifiedUserId($modifiedUserId)
    {
        $this->modifiedUserId = $modifiedUserId;

        return $this;
    }

    /**
     * Get modifiedUserId
     *
     * @return integer
     */
    public function getModifiedUserId()
    {
        return $this->modifiedUserId;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     *
     * @return Management
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;

        return $this;
    }

    /**
     * Get isDeleted
     *
     * @return boolean
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * Set deletedAt
     *
     * @param \DateTime $deletedAt
     *
     * @return Management
     */
    public function setDeletedAt($deletedAt)
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * Get deletedAt
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }

    /**
     * Set deletedUserId
     *
     * @param integer $deletedUserId
     *
     * @return Management
     */
    public function setDeletedUserId($deletedUserId)
    {
        $this->deletedUserId = $deletedUserId;

        return $this;
    }

    /**
     * Get deletedUserId
     *
     * @return integer
     */
    public function getDeletedUserId()
    {
        return $this->deletedUserId;
    }

    /**
     * Set isVersioned
     *
     * @param boolean $isVersioned
     *
     * @return Management
     */
    public function setIsVersioned($isVersioned)
    {
        $this->isVersioned = $isVersioned;

        return $this;
    }

    /**
     * Get isVersioned
     *
     * @return boolean
     */
    public function getIsVersioned()
    {
        return $this->isVersioned;
    }

    /**
     * Set version
     *
     * @param integer $version
     *
     * @return Management
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return integer
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set parentId
     *
     * @param integer $parentId
     *
     * @return Management
     */
    public function setParentId($parentId)
    {
        $this->parentId = $parentId;

        return $this;
    }

    /**
     * Get parentId
     *
     * @return integer
     */
    public function getParentId()
    {
        return $this->parentId;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     *
     * @return Management
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }
}