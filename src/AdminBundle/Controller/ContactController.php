<?php

namespace AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AdminBundle\Entity\Menu;
use AdminBundle\Form\MenuType;

/**
 * Menu controller.
 *
 */
class ContactController extends Controller
{
    /**
     * Lists all Menu entities.
     *
     */
    public function indexAction()
    {/*
        $em = $this->getDoctrine()->getManager();

        $menus = $em->getRepository('AdminBundle:Menu')->findAll();
*/
        $text = "Hello, this is contact page.";
        return $this->render('AdminBundle:contact/index.html.twig', array(
            'text' => $text,
        ));
    }


}
