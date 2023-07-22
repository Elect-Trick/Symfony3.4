<?php

namespace ServicesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use ServicesBundle\Entity\Sdu_Services;
use ServicesBundle\Entity\Mdu_Services;
use ServicesBundle\Entity\Regrade;
use ServicesBundle\Entity\Ticket;
use ServicesBundle\Entity\Ticket_Comment;


class DefaultController extends Controller
{


    /**
     * @Route("api/services/add-service", name="add-service",defaults={"req_roles":{"ROLE_CREATOR","ROLE_FNO_ADMIN"}})
     */
    public function addServiceAction(Request $request)
    {


        $input = ($request->getContent());
        switch (json_decode($input)->location_type) {
            case 'sdu':
                # code...
                $sdu_repo = $this->getDoctrine()->getRepository("ServicesBundle:Sdu_Services");
                // check duplicates
                $service = new Sdu_Services($input);


                $duplicate_found = $sdu_repo->findDuplicateService($service);
                if ($duplicate_found) {


                    return new JsonResponse('duplicate found', 409);
                } else {

                    try {

                        $entity_manager = $this->getDoctrine()->getManager();
                        $entity_manager->persist($service);
                        $entity_manager->flush();

                        // $order_repo = $this->getDoctrine()->getRepository("ServicesBundle:Sdu_Orders");

                        return new JsonResponse('service added', 200);
                    } catch (\Throwable $th) {
                        return new JsonResponse('Could not insert, something went wrong', 500);
                    }
                }
                break;

            case 'mdu':

                # code...
                $mdu_repo = $this->getDoctrine()->getRepository("ServicesBundle:Mdu_Services");
                // check duplicates
                $location = new Mdu_Services($input);


                $duplicate_found = $mdu_repo->findDuplicateService($location);
                if ($duplicate_found) {
                    echo "duplicate found";
                    return new JsonResponse('duplicate found', 409);
                } else {
                    //

                    try {
                        //code...
                        $entity_manager = $this->getDoctrine()->getManager();
                        $entity_manager->persist($location);
                        $entity_manager->flush();
                        // $is_inserted  = $mdu_repo->findOneBy(['mduUnit' => json_decode($input)->unit_number]);
                        return new JsonResponse('true', 200);
                    } catch (\Throwable $th) {
                        //throw $th;
                        return new JsonResponse('Could not insert, something went wrong', 500);
                    }
                }
                break;
            default:
                break;
        }
    }
    /**
     * @Route("api/services/find-service", name="find-service",defaults={"req_roles":{"ROLE_ISP_USER","ROLE_CREATOR","ROLE_FNO_ADMIN"}})
     */
    public function findServiceAction(Request $request)
    {

        // searchString:
        // string;
        // searchType:
        // number;
        // locationType ?: string;

        $dataJson = $request->query->get('data');
        $input =  json_encode(json_decode($dataJson));
        // Search type is location(1) or FSAN(2)
        $search_Type = Json_decode($input)->searchType;
        $location_type = Json_decode($input)->locationType;
        $searchString = Json_decode($input)->searchString;
        $searchParts = explode(",", $searchString);
        $mdu_name = $searchParts[0];
        if (!empty($surburb)) {
            $surburb = trim($searchParts[1]);
        } else {
            $surburb = "";
        }

        $unit = $mdu_name;
        $index_of_space = strpos($mdu_name, ' ');
        $unit = trim(substr_replace($unit, ' ', $index_of_space));
        $mdu_name = trim(substr_replace($mdu_name, '', 0, $index_of_space + 1));
        switch ($search_Type) {
                // Location based service search
            case '1':

                switch ($location_type) {
                    case 'sdu':
                        # code...
                        # code...
                        $sdu_repo = $this->getDoctrine()->getRepository("ServicesBundle:Sdu_Services");
                        $service = $sdu_repo->findServiceByLocation($unit, $mdu_name, $surburb);
                        return new JsonResponse($service, 200);
                        break;

                    case 'mdu':
                        # code...

                        $mdu_repo = $this->getDoctrine()->getRepository("ServicesBundle:Mdu_Services");
                        $service = $mdu_repo->findServiceByLocation($unit, $mdu_name, $surburb);
                        return new JsonResponse($service, 200);
                        break;
                }


                break;



            case '2':
                // NETWORK_ID based service search 
                # code...
                switch ($location_type) {
                    case 'sdu':
                        # code...
                        # code...
                        $sdu_repo = $this->getDoctrine()->getRepository("ServicesBundle:Sdu_Services");
                        $service = $sdu_repo->findByFSAN($searchString);
                        return new JsonResponse($service, 200);
                        break;

                    case 'mdu':
                        # code...

                        $mdu_repo = $this->getDoctrine()->getRepository("ServicesBundle:Mdu_Services");
                        $service = $mdu_repo->findByFSAN($searchString);
                        return new JsonResponse($service, 200);
                        break;
                }
                break;
        }
    }

    /**
     * @Route("api/services/regrade-service", name="regrade-service",defaults={"req_roles":{"ROLE_ISP_USER","ROLE_CREATOR","ROLE_FNO_ADMIN"}})
     */
    public function regradeServiceAction(Request $request)
    {


        $input = ($request->getContent());
        $regrade_repo = $this->getDoctrine()->getRepository("ServicesBundle:Regrade");
        $regrade = new Regrade($input);
        $duplicate_found = $regrade_repo->findDuplicateOrder($regrade);
        switch ($duplicate_found) {
            case true:
                # code...
                // check duplicates
                return new JsonResponse('duplicate found', 409);
                break;
            case false:
                try {
                    $counter = $regrade_repo->countEntries() + 1;
                    $serialzed_order = 'REG-';
                    $final_order = $serialzed_order . str_pad($counter, 5, '0', STR_PAD_LEFT);
                    // echo $final_order;
                    $regrade->setOrderNumber($final_order);

                    $entity_manager = $this->getDoctrine()->getManager();
                    $entity_manager->persist($regrade);
                    $entity_manager->flush();
                    return new JsonResponse($final_order, 200);
                } catch (\Throwable $th) {
                    return new JsonResponse('Could not Regrade, something went wrong', 500);
                }
                break;
        }
    }
    /**
     * @Route("api/services/log-ticket", name="log-ticket", defaults={"req_roles":{"ROLE_ISP_USER","ROLE_CREATOR","ROLE_FNO_ADMIN"}})
     */
    public function logTicketAction(Request $request)
    {


        $input = ($request->getContent());
        $ticket_repo = $this->getDoctrine()->getRepository("ServicesBundle:Ticket");
        $ticket = new Ticket($input);
        // echo "Id is ".$ticket->getId();
        $duplicate_found = $ticket_repo->findDuplicateTicket($ticket);

        switch ($duplicate_found) {
            case true:
                # code...
                // check duplicates
                // echo "tis true";
                return new JsonResponse('duplicate found', 409);
                break;
            case false:
                try {
                    $counter = $ticket_repo->countEntries() + 1;
                    $serialzed_ticket = 'FLT-';
                    $final_ticket = $serialzed_ticket . str_pad($counter, 5, '0', STR_PAD_LEFT);
                    $ticket->setTicketReference($final_ticket);

                    $entity_manager = $this->getDoctrine()->getManager();
                    $entity_manager->persist($ticket);
                    $entity_manager->flush();
                    return new JsonResponse('Ticket added', 200);
                } catch (\Throwable $th) {
                    return new JsonResponse('Could not add Ticket, something went wrong', 500);
                }
                break;
        }
    }

    /**
     * @Route("api/services/fetch-tickets", name="fetch-tickets", defaults={"req_roles":{"ROLE_ISP_USER","ROLE_CREATOR","ROLE_FNO_ADMIN"}})
     */
    public function fetchTicketAction(Request $request)
    {


        try {
            $input = $request->query->get('data');
            $ticket_repo = $this->getDoctrine()->getRepository("ServicesBundle:Ticket");
            // $ticket = new Ticket($input);
            $tickets = $ticket_repo->fetchTickets($input);
            return new JsonResponse($tickets, 200);
        } catch (\Throwable $th) {
            return new JsonResponse("Something is wrong, check with Dev", 500);
        }
    }
    /**
     * @Route("api/services/fetch-comments", name="fetch-comments",defaults={"req_roles":{"ROLE_ISP_USER","ROLE_CREATOR","ROLE_FNO_ADMIN"}})
     */
    public function fetchTicketCommentsAction(Request $request)
    {

        try {
            $input = $request->query->get('data');
            $ticket_repo = $this->getDoctrine()->getRepository("ServicesBundle:Ticket_Comment");
            // $ticket = new Ticket($input);
            $comments = $ticket_repo->fetchTicketComments($input);
            return new JsonResponse($comments, 200);
        } catch (\Throwable $th) {
            return new JsonResponse("Something is wrong, check with Dev", 500);
        }
    }
    /**
     * @Route("api/services/update-ticket", name="update-ticket",defaults={"req_roles":{"ROLE_ISP_USER","ROLE_CREATOR","ROLE_FNO_ADMIN"}})
     */
    public function updateTicketAction(Request $request)
    {

        try {
            $input = $request->getContent();
            $status = json_decode($input)->status_id;
            // $ticket = new Ticket($input);
            // If ticket is being assigned or closed 
            $ticket_repo = $this->getDoctrine()->getRepository("ServicesBundle:Ticket");
            $resolved = $ticket_repo->updateTicket($input);

            switch ($status) {
                case '2':
                    # code...
                    return new JsonResponse($resolved, 200);
                    // If ticket is being assigned or closed 
                    break;

                case '5':
                    # code...
                    // $ticket = new Ticket($input);
                    return new JsonResponse($resolved, 200);
                    break;
                default:
                    switch ($resolved) {
                        case true:
                            # code...
                            $comment = new Ticket_Comment($input);
                            $entity_manager = $this->getDoctrine()->getManagerForClass('ServicesBundle\Entity\Ticket_Comment');
                            $entity_manager->persist($comment);
                            $entity_manager->flush();
                            return new JsonResponse('updated and commented', 200);
                            break;

                        case false:
                            # code...
                            return new JsonResponse('failed to close ticket', 500);
                            break;
                    }
            }

            // If ticket is being disputed or marked as resolved
            // We need to add a comment for this partucilar action
        } catch (\Throwable $th) {
            return new JsonResponse('Something is wrong, check with Dev', 500);
        }
    }

    /**
     * Takes a search string and location type 
     * Returns a list of the results matching the search string.
     * Alternatively, we can search for specific ticket using the reference number
     * 
     * @Route("api/services/location-tickets/", name="location-tickets", defaults={"req_roles":{"ROLE_ISP_USER","ROLE_CREATOR","ROLE_FNO_ADMIN"}})
     */
    public function LocationTicketsAction(Request $request)
    {


        $dataJson = $request->query->get('data');
        $input =  json_encode(json_decode($dataJson));
        try {
            $ticket_repo = $this->getDoctrine()->getRepository("ServicesBundle:Ticket");
            $tickets = $ticket_repo->findTicketsByLocation($input);

            return new JsonResponse($tickets, 200);
        } catch (\Throwable $th) {
            //throw $th;
            return new JsonResponse('Something went wrong', 500);
        }
    }


    /**
     * 
     * 
     */
}
