<?php

namespace OwnerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('OwnerBundle:Default:index.html.twig');
    }
}
