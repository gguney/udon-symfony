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
class AboutController extends Controller
{
    /**
     * Lists all Menu entities.
     *
     */
    public function indexAction()
    {
        $text = "This is about page.";

        return $this->render('AdminBundle:about/index.html.twig', array(
            'text' => $text,
        ));
    }


}
