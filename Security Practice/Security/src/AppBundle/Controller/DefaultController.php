<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Error;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Authentication\Token\JWTUserToken;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\ExpressionLanguage\Token;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Authentication\Token\AnonymousToken;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\Authentication\Token\AbstractToken;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\User\UserInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

use AppBundle\Jwt;
use Lcobucci\JWT\Token as JWTToken;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction(Request $request)
    {

        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
        ]);




    }
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request, TokenStorageInterface $tokenStore, UserInterface $user)
    {

        //  echo json_encode($token_storage->getToken());
        // $my_token = $token_storage->getToken();
        // $tokenStorage = new TokenInterface();
        if (!empty($tokenStore) && $tokenStore->getToken()->isAuthenticated()) {
            $JWT  = new JWT($user);
            $token = $JWT->generateToken($user);
            // $tokenStore->setToken($token);

            // echo "creds are " . json_encode($JWT->generateToken($user));


            return new JsonResponse($token, 200);
        }
        return new JsonResponse('Failed to log in', 401);



        // replace this example code with whatever you need

    }
    /**
     * @Route("/api/admin", name="admin")
     * 
     */
    public function adminAction(Request $request, TokenStorageInterface $tokenStorage)
    {
        // $cookieHeader = $request->('PHPSESSID');
        if ($tokenStorage->getToken() != null && $tokenStorage->getToken()->isAuthenticated()) {
            return $this->render('default/index.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            ]);
        }


        // replace this example code with whatever you need

    }
    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(Request $request,  TokenStorageInterface $tokenStorage, SessionInterface $session)
    {
        // replace this example code with whatever you need

        echo json_encode($session);
        $session->invalidate();

        $tokenStorage->setToken(new AnonymousToken('Bduih8s', 'anon.', []));
        return new JsonResponse('logged out', 200);
    }

    /**
     * @Route("/add-user", name="add-user")
     */
    public function addUserAction(Request $request)
    {
        // replace this example code with whatever you need

        $input = $request->getContent();
        if ($input) {
            $user = new User($input);

            try {
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                return new JsonResponse('User added', 200);
            } catch (Error $error) {
                return new JsonResponse('Could not add user', 500);
            }
        }
    }
}
