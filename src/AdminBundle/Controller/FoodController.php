<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AdminBundle\Entity\Food;
use AdminBundle\Form\FoodType;

/**
 * Food controller.
 *
 */
class FoodController extends Controller
{
    /**
     * Lists all Food entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $foods = $em->getRepository('AdminBundle:Food')->findAll();

        return $this->render('AdminBundle:food/index.html.twig', array(
            'foods' => $foods,
        ));
    }

    /**
     * Creates a new Food entity.
     *
     */
    public function newAction(Request $request)
    {
        $food = new Food();
        $form = $this->createForm('AdminBundle\Form\FoodType', $food);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($food);
            $em->flush();

            return $this->redirectToRoute('food_show', array('id' => $food->getId()));
        }

        return $this->render('AdminBundle:food/new.html.twig', array(
            'food' => $food,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Food entity.
     *
     */
    public function showAction(Food $food)
    {
        $deleteForm = $this->createDeleteForm($food);

        return $this->render('AdminBundle:food/show.html.twig', array(
            'food' => $food,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Food entity.
     *
     */
    public function editAction(Request $request, Food $food)
    {
        $deleteForm = $this->createDeleteForm($food);
        $editForm = $this->createForm('AdminBundle\Form\FoodType', $food);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($food);
            $em->flush();

            return $this->redirectToRoute('food_edit', array('id' => $food->getId()));
        }

        return $this->render('AdminBundle:food/edit.html.twig', array(
            'food' => $food,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Food entity.
     *
     */
    public function deleteAction(Request $request, Food $food)
    {
        $form = $this->createDeleteForm($food);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($food);
            $em->flush();
        }

        return $this->redirectToRoute('food_index');
    }

    /**
     * Creates a form to delete a Food entity.
     *
     * @param Food $food The Food entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Food $food)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('food_delete', array('id' => $food->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
