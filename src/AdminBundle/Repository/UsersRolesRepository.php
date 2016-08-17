<?php

namespace AdminBundle\Repository;
use AdminBundle\Entity\User;

class UsersRolesRepository extends \Doctrine\ORM\EntityRepository
{


    public function index()
    {
        $em = $this->getEntityManager();
        //$usersRoles = $em->getRepository('AdminBundle:UsersRoles')->findAll();
        $usersRoles = $em->createQuery("
            SELECT u.id userId, ur.id,u.username, r.name roleName
            FROM AdminBundle:UsersRoles ur, AdminBundle:Role r, AdminBundle:User u
            WHERE  ur.roleId = r.id AND ur.userId = u.id ")
          ->getResult();
        return $usersRoles;
    }

    public function showAction(User $user)
    {
        $em = $this->getEntityManager();
        $usersRoles = $em->createQuery("
            SELECT r.id
            FROM AdminBundle:UsersRoles ur, AdminBundle:Role r
            WHERE ur.roleId = r.id AND ur.userId = :userId")
            ->setParameter('userId',$user->getId())
            ->getResult();
        $usersRolesIdsArray = array();
        foreach ($usersRoles as $usersRole)
        {
            $usersRolesIdsArray[] = $usersRole['id'] ;
        }
        return $usersRolesIdsArray;
    }

    public function deleteAll(User $user)
    {
        $em = $this->getEntityManager();

        return $em->createQuery("
            DELETE
            FROM AdminBundle:UsersRoles ur
            WHERE ur.userId = :userId
        "
        )
        ->setParameter('userId',$user->getId())
            ->getResult();
        ;

    }
}
