<?php

namespace AdminBundle\Controller;

use Doctrine\DBAL\Driver\PDOException;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AdminBundle\Entity\UsersRoles;
use AdminBundle\Form\UsersRolesType;

/**
 * UsersRoles controller.
 *
 */
class UsersRolesController extends Controller
{
    /**
     * Lists all UsersRoles entities.
     *
     */
    protected $bigTitle = "Users Roles";
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usersRoles = $em->getRepository('AdminBundle:UsersRoles')->index();
        return $this->render('AdminBundle:usersroles/index.html.twig', array(
            'usersRoles' => $usersRoles,
        ));
    }

    /**
     * Creates a new UsersRoles entity.
     *
     */
    public function newAction(Request $request)
    {
        $usersRoles = new UsersRoles();
        $form = $this->createForm('AdminBundle\Form\UsersRolesType',$usersRoles);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();

            if ($form->isSubmitted()) {

                foreach ($request->get('roleId') as $roleId) {
                    $usersRoles = new UsersRoles();
                    $usersRoles->setUserId($request->get('userId'));
                    $usersRoles->setRoleId($roleId);

                try
                {
                    $em->merge($usersRoles);
                    $em->flush();

                }
                catch(\Doctrine\DBAL\DBALException $e)
                {



               }

                }
                return $this->redirectToRoute('usersroles_index');

            }

        $users = $em->getRepository('AdminBundle:User')->findAll();
        $roles = $em->getRepository('AdminBundle:Role')->findAll();
        $smallTitle = "";
        return $this->render('AdminBundle:usersroles/new.html.twig', array(
            'users'=> $users,
            'roles' => $roles,
            'form' => $form->createView(),
            'bigTitle' => $this->bigTitle,
            'smallTitle' => $smallTitle,
        ));
    }

    /**
     * Finds and displays a UsersRoles entity.
     *
     */
    public function showAction(UsersRoles $usersRoles)
    {

    }

    /**
     * Displays a form to edit an existing UsersRoles entity.
     *
     */
    public function editAction(Request $request, UsersRoles $usersRoles)
    {
        $smallTitle= "";

        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm('AdminBundle\Form\UsersRolesType',$usersRoles);
        $form->handleRequest($request);

        $deleteForm = $this->createDeleteForm($usersRoles);
        $user = $em->getRepository('AdminBundle:User')->find($usersRoles->getUserId());
        $usersRolesIdsArray = $em->getRepository('AdminBundle:UsersRoles')->showAction($user);
        $allRoles = $em->getRepository('AdminBundle:Role')->findAll();

        if ($form->isSubmitted()) {
            $usersRoles = $em->getRepository('AdminBundle:UsersRoles')->deleteAll($user);
            foreach ($request->get('roleId') as $roleId) {
                $usersRoles = new UsersRoles();
                $usersRoles->setUserId($user->getId());
                $usersRoles->setRoleId($roleId);
                if($em->getRepository('AdminBundle:UsersRoles')->findBy(array('userId'=>$usersRoles->getUserId(),'roleId'=>$usersRoles->getRoleId())) == null)
                {
                        $em->persist($usersRoles);
                }
            }
            $em->flush();

            return $this->redirectToRoute('usersroles_index');

        }
        return $this->render('AdminBundle:usersroles/edit.html.twig', array(
            'bigTitle' => $this->bigTitle,
            'smallTitle' => $smallTitle,
            'user' => $user,
            'allRoles' => $allRoles,
            'usersRolesIdsArray' => $usersRolesIdsArray,
            'usersRoles' => $usersRoles,
            'form'=> $form->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

}
