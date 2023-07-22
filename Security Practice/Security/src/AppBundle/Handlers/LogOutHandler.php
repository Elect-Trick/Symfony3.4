<?php


namespace AppBundle\Handlers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Http\Logout\LogoutHandlerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Logout\LogoutSuccessHandlerInterface;



class LogOutHandler  implements LogoutHandlerInterface
{

    private $tokenStorage;
    private $session;

    public function __construct(TokenStorageInterface $tokenStorage, SessionInterface $session)
    {
        $this->tokenStorage = $tokenStorage;
        $this->session = $session;
    }

    // public function onLogoutSuccess(Request $request)
    // {
    //     $currentToken = $this->tokenStorage->getToken();

    //     if ($currentToken) {
    //         // Invalidate the token by setting it to null
    //         $this->tokenStorage->setToken(null);
    //     }
    // }

    public function logout(Request $request, Response $response, TokenInterface $token)
    {
        $currentToken = $this->tokenStorage->getToken();

        if ($currentToken === $token) {
            // Invalidate the token by setting it to null
            // $tokenStorage->setToken(new AnonymousToken('Bduih8s','anon.',[]));

            $this->tokenStorage->setToken(new AnonymousToken('Bduih8s','anon.',[]));

        }
    }

   


    }

