<?php
/**
 * Created by PhpStorm.
 * User: GG
 * Date: 19.02.2016
 * Time: 20:07
 */

namespace AdminBundle\Repository;

use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Doctrine\ORM\EntityRepository;
use AdminBundle\Entity\User;
use AdminBundle\Entity\Role;
use AdminBundle\Entity\UsersRoles;

class UserRepository extends EntityRepository implements UserLoaderInterface
{
    public function loadUserByUsername($username)
    {

        $user = $this->createQueryBuilder('u')
            ->where('u.username = :username OR u.email = :email')
            ->setParameter('username', $username)
            ->setParameter('email', $username)
            ->getQuery()
            ->getOneOrNullResult();

        if (null === $user) {
            $message = sprintf(
                'Unable to find an active admin AppBundle:User object identified by "%s".',
                $username
            );
            throw new UsernameNotFoundException($message);
        }

        return $user;
    }

    public function loadUserRolesByUser($user)
    {
        $userRoles = $this->getEntityManager()->createQuery("
            SELECT r.name
            FROM AdminBundle:UsersRoles ur, AdminBundle:Role r
            WHERE ur.roleId = r.id AND ur.userId = :user_id
        ")
        ->setParameter('user_id',$user->getId())
        ->getResult();
        $roles = array();
        foreach($userRoles as $userRole)
        {
            $roles[] = $userRole['name'];
        }
        $user->setRoles($roles);
        return $user;
    }

}