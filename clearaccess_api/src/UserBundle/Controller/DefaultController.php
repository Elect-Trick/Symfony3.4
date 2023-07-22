<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use JwtBundle\Jwt;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use UserBundle\Entity\User;



class DefaultController extends Controller
{
    public $params;

    public function DefaultController(ParameterBagInterface $params){
       $this->params = $params; 
       $secret = $this->$params->get('secret');
       echo "Secret is ".$secret;


    }
    /**
     * 
     * @Route("/login/", name="login", defaults={"req_roles":{"ROLE_PUBLIC"}})
     * 
     */
    public function loginAction(Request $request, TokenStorageInterface $tokenStore, UserInterface $user)
    {
        // $secret = $this->$params->get('secret');
        // echo "Secret is ".$secret;


        if (!empty($tokenStore) && $tokenStore->getToken()->isAuthenticated()) {

            $JWT  = new JWT($user);
            $token = $JWT->generateToken($user);


            //            $deets= $tokenStore->getToken()->getAttributes();
            // echo "deets are".json_encode($user->isA);
            return new JsonResponse($token, 200);
        }
        return new JsonResponse('Failed to log in', 401);



        // replace this example code with whatever you need

    }

    /**
     * 
     * @Route("/api/users/fetch-techs", name="fetch-techs",defaults={"req_roles":{"ROLE_ISP_USER","ROLE_FNO_ADMIN","ROLE_CREATOR"}})
     * 
     */
    public function fetchTechsAction()
    {

        $techRepository = $this->getDoctrine()->getRepository('UserBundle:Technicians');

        try {

            $techs = $techRepository->fetchTechnicians();
            return new JsonResponse($techs, 200);
        } catch (\Throwable $th) {
            //throw $th;
            return new JsonResponse("Error Fetching techs", 500);
        }
    }
    /**
     * 
     * @Route("/api/users/fetch-users", name="fetch-users",defaults={"req_roles":{"ROLE_FNO_ADMIN","ROLE_CREATOR"}})
     * 
     */
    public function fetchUsersAction(Request $request)
    {
        $input = $request->query->get('data');
        $page = json_decode($input)->page;

        $userRepository = $this->getDoctrine()->getRepository('UserBundle:User');
        $users = $userRepository->fetchUsers($page);
        return new JsonResponse($users, 200);
    }
    /**
     * 
     * @Route("/api/users/fetch-roles", name="fetch-roles",defaults={"req_roles":{"ROLE_FNO_ADMIN", "ROLE_CREATOR"}})
     * 
     */
    public function fetchRolesAction()
    {

        try {
            //code...

            $roleRepository = $this->getDoctrine()->getRepository('UserBundle:Roles');
            // Find the user using their email, this is a custom repo function
            $techs = $roleRepository->fetchAllRoles();
            return new JsonResponse($techs, 200);
        } catch (\Throwable $th) {

            return new JsonResponse("Something went wrong", 500);
        }
    }

    /**
     * @Route("/api/users/add-user", name="add-user", defaults={"req_roles":{"ROLE_FNO_ADMIN", "ROLE_CREATOR"}} )
     */
    public function addUserAction(Request $request)
    {

        $input = json_decode($request->getContent());
        $user_repo = $this->getDoctrine()->getRepository("UserBundle:User");
        $user = new User($input);
        $duplicate_found = $user_repo->findDuplicateUser($user);
        echo json_encode($duplicate_found);
        switch ($duplicate_found) {
            case true:
                # code...
                // check duplicates
                return new JsonResponse('User Already exists', 409);
                break;
            case false:
                try {
                    //code...
                    $entity_manager = $this->getDoctrine()->getManager();
                    $entity_manager->persist($user);
                    $entity_manager->flush();
                    return new JsonResponse('User added', 200);
                } catch (\Throwable $th) {
                    return new JsonResponse('Failed to add User', 500);
                }



                break;
        }
    }
}
