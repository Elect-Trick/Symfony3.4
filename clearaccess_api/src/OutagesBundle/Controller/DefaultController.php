<?php

namespace OutagesBundle\Controller;

use OutagesBundle\Entity\Outage_Comments;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use OutagesBundle\Entity\Outages;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * @Route("api/log-outage", name="log-outage",defaults={"req_roles":{"ROLE_CREATOR","ROLE_FNO_ADMIN"}})
     */
    public function addOutageAction(Request $request)
    {

        try {
            $content = ($request->getContent());
            // check duplicates
            $outage = new Outages($content);
            if (!empty($outage)) {
                $outage_repo = $this->getDoctrine()->getRepository("OutagesBundle:Outages");

                $counter = $outage_repo->countEntries() + 1;
                $serialzed_outage = 'OTG-';
                $final_outage = $serialzed_outage . str_pad($counter, 5, '0', STR_PAD_LEFT);
                // echo $final_order;
                $outage->setOutageReference($final_outage);
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($outage);
                $entity_manager->flush();

                return new JsonResponse($final_outage, 200);
            }
        } catch (\Throwable $th) {
            return new JsonResponse('failed', 500);
        }
    }
    /**
     * @Route("api/update-outage", name="update-outage",defaults={"req_roles":{"ROLE_CREATOR","ROLE_FNO_ADMIN"}})
     */
    public function updateOutageAction(Request $request)
    {
        $content = ($request->getContent());

        try {
            $comment = new Outage_Comments($content);
            if (!empty($comment)) {
                $entity_manager = $this->getDoctrine()->getManager();
                $entity_manager->persist($comment);
                $entity_manager->flush();

                return new JsonResponse($comment, 200);
            }
        } catch (\Throwable $th) {

            return new JsonResponse('failed', 500);
        }
    }

    /**
     * @Route("api/fetch-outages/", name="fetch-outages",defaults={"req_roles":{"ROLE_ISP_USER","ROLE_CREATOR","ROLE_FNO_ADMIN"}})
     */
    public function fetchOutagesAction(Request $request)
    {
        $input = $request->query->get('data');
        $type = json_decode($input)->type;
        $page = json_decode($input)->page;
        try {
            $sdu_repo = $this->getDoctrine()->getRepository("OutagesBundle:Outages");
            $orders = $sdu_repo->fetchOutages($type, $page);
            return new JsonResponse($orders, 200);
        } catch (\Throwable $th) {
            return new JsonResponse('The order type provided is incorrect', 500);
        }
    }
    /**
     * @Route("api/close-outage", name="close-outage",defaults={"req_roles":{"ROLE_CREATOR","ROLE_FNO_ADMIN"}})
     */
    public function closehOutageAction(Request $request)
    {
        $input = $request->getContent();
        $outage_id = json_decode($input)->outage_id;
        try {
            $outage_repo = $this->getDoctrine()->getRepository("OutagesBundle:Outages");
            $result = $outage_repo->closeOutage($outage_id);
            return new JsonResponse($result, 200);
        } catch (\Throwable $th) {
            return new JsonResponse('Outage could not be closed', 500);
        }
    }

    /**
     * Retrieves a list of all the comments related to the selected outage.
     * Accepts an outage object 
     * @Route("api/incident-comments/", name="incident-comments",defaults={"req_roles":{"ROLE_ISP_USER","ROLE_CREATOR","ROLE_FNO_ADMIN"}})
     */
    public function outageCommentsAction(Request $request)
    {
        $input = $request->query->get('data');
        $outage_id = json_decode($input)->outage_id;
        // $page = json_decode($input)->page;
        $page = 1;
        try {
            $comments_repo = $this->getDoctrine()->getRepository("OutagesBundle:Outage_Comments");
            $result = $comments_repo->fetchComments($outage_id, $page);
            return new JsonResponse($result, 200);
        } catch (\Throwable $th) {
            return new JsonResponse('The order type provided is incorrect', 500);
        }
    }
}
