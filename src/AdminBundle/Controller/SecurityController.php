<?php
/**
 * Created by PhpStorm.
 * User: GG
 * Date: 18.02.2016
 * Time: 16:47
 */

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {

        if($this->getUser() != null)
            return $this->redirectToRoute('index');

        $authenticationUtils = $this->get('security.authentication_utils');
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        $bigTitle="Admin Login Page";
        $smallTitle= "";
        return $this->render(
            'AdminBundle:Security:login.html.twig',
            array(
                'error'         => $error,
                'bigTitle'  => $bigTitle,
                'smallTitle'    => $smallTitle

            )
        );
    }
    public function indexAction()
    {
        return $this->render('AdminBundle:Security:index.html.twig');
    }
}