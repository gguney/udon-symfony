<?php
/**
 * Created by PhpStorm.
 * User: GG
 * Date: 23.02.2016
 * Time: 18:28
 */
namespace AdminBundle\EventListener;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;
use AdminBundle\Controller\ManagementController;
use AdminBundle\Controller\UserAuthorizeController;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class UserListener
{
    private $em;
    private $tokenStorage;

    public function __construct($array)
    {
        $this->em = $array[0];
        $this->tokenStorage = $array[1];
    }

    public function onKernelController(FilterControllerEvent $event)
    {

        $controller = $event->getController();
        if($controller[0] instanceof ManagementController)
        {
            if($controller[1] == "deleteAction")
            {
                throw new AccessDeniedHttpException('Bu hareketi yapaman!');
            }
        }
        if (!is_array($controller)) {
            return;
        }

    }
}