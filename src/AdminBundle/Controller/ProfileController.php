<?php

namespace AdminBundle\Controller;

use Doctrine\ORM\Mapping\Entity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AdminBundle\Entity\User;
use AdminBundle\Entity\UserRepository;
use Doctrine\ORM\EntityManager;

/**
 * User controller.
 *
 */
class ProfileController extends Controller
{
    /**
     * Lists all User entities.
     *
     */

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('AdminBundle:User')->findOneBy(array('id'=>$this->getUser()->getId()));

        return $this->render('AdminBundle:profile/index.html.twig', array(
            'user' => $user,
        ));
    }


    public function editAction(Request $request)
    {
        $user = $this->getUser();
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('AdminBundle\Form\ProfileType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->merge($user);
            $em->flush();

            return $this->redirectToRoute('profile_edit');
        }

        return $this->render('AdminBundle:profile/edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a User entity.
     *
     */
    public function deleteAction(Request $request, User $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('user_index');
    }

    /**
     * Creates a form to delete a User entity.
     *
     * @param User $user The User entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }



}