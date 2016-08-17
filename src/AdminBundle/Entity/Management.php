<?php
/**
 * Created by PhpStorm.
 * User: GG
 * Date: 18.02.2016
 * Time: 14:12
 */

/*
php bin/console doctrine:generate:entities AdminBundle/Entity/Management
php bin/console doctrine:schema:update --force
php bin/console generate:doctrine:crud --entity=AdminBundle:Management
*/

namespace AdminBundle\Entity;

use AdminBundle\SuperClasses\MappedSuperclassBase;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="AdminBundle\Repository\ManagementRepository")
 * @ORM\Table(name="managements")

 */
class Management
//class Management extends MappedSuperclassBase

{

    /**
     * @ORM\Column(name="id",type="integer", nullable=false, options={"unsigned"="true"} )
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="brand_name", type="string", length=255, nullable=true)
     */
    protected $brandName;

    /**
     * @ORM\Column(name="company_name", type="string", length=255, nullable=true)
     */
    protected $companyName;

    /**
     * @ORM\Column(name="tax_number", type="integer", nullable=true, options={"unsigned"="true"})
     */
    protected $taxNumber;

    /**
     * @ORM\Column(name="organization_number", type="integer", nullable=true, options={"unsigned"="true"})
     */
    protected $organizationNumber;

    /**
     * @ORM\Column(name="ref_owner_id", type="integer", nullable=false, options={"unsigned"="true"})
     */
    protected $refOwnerId;


    /***** Getters and setters *****/


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
     * Set brandName
     *
     * @param string $brandName
     *
     * @return Management
     */
    public function setBrandName($brandName)
    {
        $this->brandName = $brandName;

        return $this;
    }

    /**
     * Get brandName
     *
     * @return string
     */
    public function getBrandName()
    {
        return $this->brandName;
    }

    /**
     * Set companyName
     *
     * @param string $companyName
     *
     * @return Management
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * Get companyName
     *
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Set taxNumber
     *
     * @param integer $taxNumber
     *
     * @return Management
     */
    public function setTaxNumber($taxNumber)
    {
        $this->taxNumber = $taxNumber;

        return $this;
    }

    /**
     * Get taxNumber
     *
     * @return integer
     */
    public function getTaxNumber()
    {
        return $this->taxNumber;
    }

    /**
     * Set organizationNumber
     *
     * @param integer $organizationNumber
     *
     * @return Management
     */
    public function setOrganizationNumber($organizationNumber)
    {
        $this->organizationNumber = $organizationNumber;

        return $this;
    }

    /**
     * Get organizationNumber
     *
     * @return integer
     */
    public function getOrganizationNumber()
    {
        return $this->organizationNumber;
    }


    /**
     * Set refOwnerId
     *
     * @param integer $refOwnerId
     *
     * @return Management
     */
    public function setRefOwnerId($refOwnerId)
    {
        $this->refOwnerId = $refOwnerId;

        return $this;
    }

    /**
     * Get refOwnerId
     *
     * @return integer
     */
    public function getRefOwnerId()
    {
        return $this->refOwnerId;
    }
}
