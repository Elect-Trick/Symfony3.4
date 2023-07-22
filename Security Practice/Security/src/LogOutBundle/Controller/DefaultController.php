<?php

namespace LogOutBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class DefaultController extends Controller
{
    /**
     * @Route("/logout" , name="logout")
     */
    public function indexAction(TokenStorageInterface $tokenStorage)
    {
        $tokenStorage->setToken(new AnonymousToken('Bduih8s','anon.',[]));

            $token=    $this->get('security.token_storage')->setToken(null);
            $this->redirect('/');

        return new JsonResponse($token, 200);
    }
}
