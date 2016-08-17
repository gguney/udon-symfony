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
 * @ORM\Table(name="users_roles")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\UsersRolesRepository")

 */
class UsersRoles
{

    /**
     * @ORM\Column(name="id",type="integer", nullable=true, options={"unsigned"="true"} )
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="role_id", type="integer", nullable=false)
     */
    protected $roleId;

    /**
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    protected $userId;


    /**
     * Set roleId
     *
     * @param integer $roleId
     *
     * @return UsersRoles
     */
    public function setRoleId($roleId)
    {
        $this->roleId = $roleId;

        return $this;
    }

    /**
     * Get roleId
     *
     * @return integer
     */
    public function getRoleId()
    {
        return $this->roleId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return UsersRoles
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
