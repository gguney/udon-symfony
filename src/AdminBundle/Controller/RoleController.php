<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AdminBundle\Entity\Role;
use AdminBundle\Form\RoleType;

/**
 * Role controller.
 *
 */
class RoleController extends Controller
{
    /**
     * Lists all Role entities.
     *
     */
    protected $bigTitle = "Role";
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $roles = $em->getRepository('AdminBundle:Role')->findAll();

        return $this->render('AdminBundle:role/index.html.twig', array(
            'roles' => $roles,
        ));
    }

    /**
     * Creates a new Role entity.
     *
     */
    public function newAction(Request $request)
    {
        $role = new Role();
        $form = $this->createForm('AdminBundle\Form\RoleType', $role);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($role);
            $em->flush();

            return $this->redirectToRoute('role_show', array('id' => $role->getId()));
        }
        $smallTitle = "";
        return $this->render('AdminBundle:role/new.html.twig', array(
            'role' => $role,
            'form' => $form->createView(),
            'bigTitle' => $this->bigTitle,
            'smallTitle' => $smallTitle,
        ));
    }

    /**
     * Finds and displays a Role entity.
     *
     */
    public function showAction(Role $role)
    {
        $deleteForm = $this->createDeleteForm($role);

        return $this->render('AdminBundle:role/show.html.twig', array(
            'role' => $role,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Role entity.
     *
     */
    public function editAction(Request $request, Role $role)
    {
        $deleteForm = $this->createDeleteForm($role);
        $editForm = $this->createForm('AdminBundle\Form\RoleType', $role);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($role);
            $em->flush();

            return $this->redirectToRoute('role_edit', array('id' => $role->getId()));
        }

        return $this->render('AdminBundle:role/edit.html.twig', array(
            'role' => $role,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Role entity.
     *
     */
    public function deleteAction(Request $request, Role $role)
    {
        $form = $this->createDeleteForm($role);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($role);
            $em->flush();
        }

        return $this->redirectToRoute('role_index');
    }

    /**
     * Creates a form to delete a Role entity.
     *
     * @param Role $role The Role entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Role $role)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('role_delete', array('id' => $role->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
