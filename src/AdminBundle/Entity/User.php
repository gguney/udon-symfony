<?php
/**
 * Created by PhpStorm.
 * User: GG
 * Date: 18.02.2016
 * Time: 14:12
 */

/*
php bin/console doctrine:generate:entities AdminBundle/Entity/User
php bin/console doctrine:schema:update --force
php bin/console generate:doctrine:crud --entity=AdminBundle:User
*/

namespace AdminBundle\Entity;

use AdminBundle\SuperClasses\MappedSuperclassBase;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use AdminBundle\Controller\UserController;
use AdminBundle\Entity\CustomerManager;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\UserRepository")
 */
class User implements UserInterface
//class Management extends MappedSuperclassBase
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id",type="integer", nullable=true, options={"unsigned"="true"} )
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     */
    protected $id;

    /**
     * @ORM\Column(name="username", type="string", length=100, nullable=true)
     */
    protected $username;

    /**
     * @ORM\Column(name="password", type="string", length=200, nullable=true)
     */
    protected $password;

    /**
     * @ORM\Column(name="email_address", type="string", length=200, nullable=true)
     */
    protected $emailAddress;

    /**
     * @ORM\Column(name="first_name", type="string", length=100, nullable=true)
     */
    protected $firstName;

    /**
     * @ORM\Column(name="last_name", type="string", length=100, nullable=true)
     */
    protected $lastName;

    /**
     * @ORM\Column(name="remember_token", type="string",length=100, nullable=true)
     */
    protected $rememberToken;


    protected $roles;

    /***** Getters and setters *****/


    public function getSalt()
    {
        return null;
    }

    public function getRoles()
    {
        return $this->roles;

    }
    public function setRoles($roles)
    {
        $this->roles = $roles;
    }
    public function eraseCredentials()
    {

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

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password,PASSWORD_BCRYPT);

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set emailAddress
     *
     * @param string $emailAddress
     *
     * @return User
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Get emailAddress
     *
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set rememberToken
     *
     * @param string $rememberToken
     *
     * @return User
     */
    public function setRememberToken($rememberToken)
    {
        $this->rememberToken = $rememberToken;

        return $this;
    }

    /**
     * Get rememberToken
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->rememberToken;
    }


}
